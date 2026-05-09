<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\MainCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ProjectController extends Controller
{
    // Show the management page
    public function Showmanagepage()
    {
        $bristolcategories = MainCategory::select('id', 'name')->get();
        return view('admin.manage-project', compact('bristolcategories'));
    }

    public function getProjects()
    {
        try {
            $projects = Project::with('category')->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'data' => $projects
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching projects'
            ], 500);
        }

    }

    // Save new project - OPTIMIZED VERSION
    public function saveProject(Request $request)
    {
        try {
            $request->validate([
                'maincategory_id'=>'required|exists:main_categories,id',
                'title' => 'required|string|max:255',
                'status' => 'required|in:active,inactive',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
            ]);
            
            $data = [
                'maincategory_id' => $request->maincategory_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'status' => $request->status
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                
                // Generate filename
                $imageName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
                
                $uploadPath = public_path('uploads/projects');
                
                // Create directory if not exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                $fullImagePath = $uploadPath . '/' . $imageName;
                
                // ✅ STEP 1: First save the original file
                $image->move($uploadPath, $imageName);
                $originalSize = filesize($fullImagePath);
                
                // ✅ STEP 2: Initialize Intervention Image V3
                $manager = new ImageManager(new Driver());
                
                // Read the image
                $img = $manager->read($fullImagePath);
                
                // Get dimensions
                $width = $img->width();
                $height = $img->height();
                if ($width > 1200 || $height > 1200) {
                    $img->scale(width: 1200, height: 1200);
                    Log::info("Image resized from {$width}x{$height} to {$img->width()}x{$img->height()}");
                }
                
                $quality = 60; 
                
                if (in_array(strtolower($extension), ['jpg', 'jpeg', 'webp'])) {
                    $img->save($fullImagePath, quality: $quality);
                } elseif (strtolower($extension) == 'png') {
                    $img->save($fullImagePath);
                } else {
                    $img->save($fullImagePath, quality: $quality);
                }
                
                try {
                    ImageOptimizer::optimize($fullImagePath);
                    Log::info('Spatie optimization applied successfully');
                } catch (\Exception $optimizerError) {
                    // Windows pe yeh error aayega, isliye ignore karo
                    Log::info('Spatie optimizer not available on Windows: ' . $optimizerError->getMessage());
                }
                
                // Get final size
                $optimizedSize = filesize($fullImagePath);
                
                if ($optimizedSize > 0) {
                    $savings = round((($originalSize - $optimizedSize) / $originalSize) * 100, 2);
                    Log::info("Image optimized: {$imageName} - Original: " . round($originalSize/1024,2) . "KB, Optimized: " . round($optimizedSize/1024,2) . "KB, Saved: {$savings}%");
                }
                
                $data['image'] = 'uploads/projects/' . $imageName;
                $data['image_size'] = $optimizedSize;
                $data['image_dimensions'] = $img->width() . 'x' . $img->height();
            }

            // Create project
            $project = Project::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Project created successfully!',
                'project' => $project
            ]);

        } catch (\Exception $e) {
            Log::error('ProjectController saveProject Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateProject(Request $request, $id)
    {
        try {
            // Find project
            $project = Project::find($id);
            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found!'
                ], 404);
            }

            // Validate request
            $request->validate([
                'title' => 'required|string|max:255',
                'status' => 'required|in:active,inactive',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
            ]);

            // Prepare data
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'status' => $request->status
            ];

            // Handle image upload if new image provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($project->image && file_exists(public_path($project->image))) {
                    unlink(public_path($project->image));
                }

                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                
                // Generate filename
                $imageName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
                
                $uploadPath = public_path('uploads/projects');
                $fullImagePath = $uploadPath . '/' . $imageName;
                
                // Save original
                $image->move($uploadPath, $imageName);
                $originalSize = filesize($fullImagePath);
                
                // Optimize using Intervention Image V3
                $manager = new ImageManager(new Driver());
                $img = $manager->read($fullImagePath);
                
                // Resize if needed
                if ($img->width() > 1200 || $img->height() > 1200) {
                    $img->scale(width: 1200, height: 1200);
                }
                
                // Save with optimization
                $quality = 60;
                if (in_array(strtolower($extension), ['jpg', 'jpeg', 'webp'])) {
                    $img->save($fullImagePath, quality: $quality);
                } else {
                    $img->save($fullImagePath, quality: $quality);
                }
                
                // Try Spatie optimization
                try {
                    ImageOptimizer::optimize($fullImagePath);
                } catch (\Exception $optimizerError) {
                    Log::info('Spatie optimizer skipped: ' . $optimizerError->getMessage());
                }
                
                $optimizedSize = filesize($fullImagePath);
                
                $data['image'] = 'uploads/projects/' . $imageName;
                $data['image_size'] = $optimizedSize;
                $data['image_dimensions'] = $img->width() . 'x' . $img->height();
            }

            // Update project
            $project->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully!',
                'project' => $project
            ]);

        } catch (\Exception $e) {
            Log::error('ProjectController updateProject Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function deleteProject($id)
    {
        try {
            // Find project
            $project = Project::find($id);
            if (!$project) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found!'
                ], 404);
            }

            // Delete image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            // Delete project
            $project->delete();

            return response()->json([
                'success' => true,
                'message' => 'Project deleted successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('ProjectController deleteProject Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting project: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // ✅ ADD THIS TEST METHOD
    public function testOptimization()
    {
        try {
            $manager = new ImageManager(new Driver());
            
            // Create a test image
            $img = $manager->create(300, 200)->fill('rgb(59, 130, 246)');
            
            $testPath = public_path('uploads/test_image.jpg');
            $img->save($testPath, quality: 85);
            
            return response()->json([
                'success' => true,
                'message' => 'Intervention Image V3 is working perfectly!',
                'file_size' => filesize($testPath) . ' bytes',
                'file_path' => 'uploads/test_image.jpg'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}