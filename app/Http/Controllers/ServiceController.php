<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    
    public function index()
    {
        $categories = ServiceCategory::where('status', 'active')->get();
        return view('admin.services', compact('categories'));
    }

    public function getServices()
    {
        $services = Service::with(['category', 'variants'])->orderBy('id', 'desc')->get();
        return response()->json(['success' => true, 'data' => $services]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $services = Service::with(['category', 'variants'])
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('short_description', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')->get();

        return response()->json(['success' => true, 'data' => $services]);
    }

    public function store(Request $request)
    {
       $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required','string','max:255',Rule::unique('services', 'name')],
                'category_id'       => 'nullable|exists:service_categories,id',
                'short_description' => 'nullable|string',
                'description'       => 'nullable|string',
                'status'            => 'required|in:active,inactive',
                'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:9048',
                'variants'          => 'nullable|json'
            ],
            [
                'name.unique' => 'This service name already exists.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $data = $request->only('name', 'category_id', 'short_description', 'description', 'status');

        // Unique Slug
        $slug = Str::slug($request->name);
        $original = $slug;
        $i = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $i++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service = Service::create($data);

        // Variants
        if ($request->filled('variants')) {
            $variants = json_decode($request->variants, true);
            if (is_array($variants)) {
                foreach ($variants as $v) {
                    if (!empty($v['name'])) {
                        $service->variants()->create([
                            'name'        => $v['name'],
                            'description' => $v['description'] ?? null,
                        ]);
                    }
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Service saved successfully']);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

      $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('services', 'name')->ignore($id)
                ],
                'category_id'       => 'nullable|exists:service_categories,id',
                'short_description' => 'nullable|string',
                'description'       => 'nullable|string',
                'status'            => 'required|in:active,inactive',
                'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:9048',
                'variants'          => 'nullable|json'
            ],
            [
                'name.unique' => 'This service name already exists.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $data = $request->only('name', 'category_id', 'short_description', 'description', 'status');

        // Unique Slug
        $slug = Str::slug($request->name);
        $original = $slug;
        $i = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $original . '-' . $i++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            if ($service->image) Storage::disk('public')->delete($service->image);
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        // Variants
        $service->variants()->delete();
        if ($request->filled('variants')) {
            $variants = json_decode($request->variants, true);
            if (is_array($variants)) {
                foreach ($variants as $v) {
                    if (!empty($v['name'])) {
                        $service->variants()->create([
                            'name'        => $v['name'],
                            'description' => $v['description'] ?? null,
                        ]);
                    }
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Service updated successfully']);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image) Storage::disk('public')->delete($service->image);
        $service->delete();

        return response()->json(['success' => true, 'message' => 'Service deleted successfully']);
    }
}