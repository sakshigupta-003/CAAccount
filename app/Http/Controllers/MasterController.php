<?php

namespace App\Http\Controllers;
use App\Models\Interest;
use App\Models\Budget;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\PointOfContact;
use App\Models\MainCategory;
use App\Models\HeroBanner;
use App\Models\Resume;
use App\Models\CtaSection;
use App\Models\City;
use App\Models\ProgressCounter;
use App\Models\AboutSection;
use App\Models\WhyChooseUsSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class MasterController extends Controller
{
    public function index()
    {
        return view('admin.consult'); 
    }

    // Interests CRUD
    public function indexInterests()
    {
        $interests = Interest::orderBy('id', 'desc')->get();
        return response()->json($interests);
    }

    public function storeInterest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:interests,name|max:255'
        ]);
        
        $interest = Interest::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Interest added successfully!',
            'data' => $interest
        ]);
    }

    public function updateInterest(Request $request, Interest $interest)
    {
        $validated = $request->validate([
            'name' => 'required|unique:interests,name,' . $interest->id . '|max:255'
        ]);
        
        $interest->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Interest updated successfully!',
            'data' => $interest
        ]);
    }

    public function destroyInterest(Interest $interest)
    {
        $interest->delete();
        return response()->json([
            'success' => true,
            'message' => 'Interest deleted successfully!'
        ]);
    }

    // Budgets CRUD
    public function indexBudgets()
    {
        $budgets = Budget::orderBy('id', 'desc')->get();
        return response()->json($budgets);
    }

    public function storeBudget(Request $request)
    {
        $validated = $request->validate([
            'budgetname' => 'required|unique:budgets,budgetname|max:255'
        ]);
        
        $budget = Budget::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Budget added successfully!',
            'data' => $budget
        ]);
    }

    public function updateBudget(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'budgetname' => 'required|unique:budgets,budgetname,' . $budget->id . '|max:255'
        ]);
        
        $budget->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Budget updated successfully!',
            'data' => $budget
        ]);
    }

    public function destroyBudget(Budget $budget)
    {
        $budget->delete();
        return response()->json([
            'success' => true,
            'message' => 'Budget deleted successfully!'
        ]);
    }



// Add Projects type CRUD

 public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Generate slug from title
        $validated['slug'] = Str::slug($validated['title']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);
            $validated['image'] = 'uploads/projects/' . $imageName;
        }

        $project = Project::create($validated);

        return response()->json([
            'message' => 'Project created successfully!',
            'project' => $project
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Generate slug from title
        $validated['slug'] = Str::slug($validated['title']);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);
            $validated['image'] = 'uploads/projects/' . $imageName;
        }

        $project->update($validated);

        return response()->json([
            'message' => 'Project updated successfully!',
            'project' => $project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete image if exists
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully!'
        ]);
    }



    public function Showmanagepagecityties()
    {
        return view('admin.manage-city');
    }

    public function getPamenities()
    {
        $amenities = City::select('id', 'name')->get();
        return response()->json([
            'success' => true,
            'data' => $amenities
        ]);
    }

    public function saveamenities(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        City::create($request->only(['name']));

        return response()->json([
            'success' => true,
            'message' => 'City created successfully.'
        ]);
    }

    public function updateamenities(Request $request, $id)
    {
        $amenity = City::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $amenity->update($request->only(['name']));

        return response()->json([
            'success' => true,
            'message' => 'City updated successfully.'
        ]);
    }

    public function deleteamenities($id)
    {
        $amenity = City::findOrFail($id);
        $amenity->delete();

        return response()->json([
            'success' => true,
            'message' => 'City deleted successfully.'
        ]);
    }

    

// CRUD MainCategory Resume

    public function Showmaincategory(){
        return view('admin.manage-main-category');
    }

    public function getMaincategory()
    {
        $managers = MainCategory::select('id', 'name')->get();
        return response()->json([
            'success' => true,
            'data' => $managers
        ]);
    }


    public function saveMaincategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        MainCategory::create($request->only(['name']));
        return response()->json([
            'success' => true,
            'message' => 'Manager created successfully.'
        ]);
    }


    public function updateMaincategory(Request $request, $id)
    {
        $manager = MainCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $manager->update($request->only(['name']));

        return response()->json([
            'success' => true,
            'message' => 'Manager updated successfully.'
        ]);
    }


    public function deleteMaincategory($id)
    {
        $manager = MainCategory::findOrFail($id);
        $manager->delete();

        return response()->json([
            'success' => true,
            'message' => 'Manager deleted successfully.'
        ]);
    }


    public function ShowPointOfContact()
    {
        return view('admin.pointofcontact');
    }

    public function getPointOfContact()
    {
        $pointofcontacts = PointOfContact::select('id', 'name')->get();
        return response()->json([
            'success' => true,
            'data' => $pointofcontacts
        ]);
    }

    public function savePointOfContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        PointOfContact::create($request->only(['name']));

        return response()->json([
            'success' => true,
            'message' => 'Point of Contact created successfully.'
        ]);
    }

    public function updatePointOfContact(Request $request, $id)
    {
        $poc = PointOfContact::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $poc->update($request->only(['name']));

        return response()->json([
            'success' => true,
            'message' => 'Point of Contact updated successfully.'
        ]);
    }

    public function deletePointOfContact($id)
    {
        $poc = PointOfContact::findOrFail($id);
        $poc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Point of Contact deleted successfully.'
        ]);
    }



    public function showManageResume()
    {
        return view('admin.manage-resume');
    }

    public function getResumes()
    {
        $resumes = Resume::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $resumes
        ]);
    }


    public function updateresume(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,reviewed,rejected',
        ]);

        $resume->status = $request->status;
        $resume->save();

        return response()->json([
            'success' => true,
            'message' => 'Resume status updated!'
        ]);
    }

    public function destroyresume($id)
    {
        $resume = Resume::findOrFail($id);

        if ($resume->resume_path && Storage::disk('public')->exists($resume->resume_path)) {
            Storage::disk('public')->delete($resume->resume_path);
        }

        $resume->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resume deleted successfully!'
        ]);
    }



       public function showProgressCounters()
        {
            return view('admin.manage-progress-counter');
        }

        public function getCounters()
        {
            $counters = ProgressCounter::orderBy('sort_order')->get();
            return response()->json([
                'success' => true,
                'data' => $counters
            ]);
        }

        public function storecounter(Request $request)
        {
            $request->validate([
                'number' => 'required|string|max:50',
                'title' => 'required|string|max:255',
                'sort_order' => 'integer',
            ]);

            ProgressCounter::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Counter added successfully!'
            ]);
        }

        public function updatecounter(Request $request, $id)
        {
            $counter = ProgressCounter::findOrFail($id);

            $request->validate([
                'number' => 'required|string|max:50',
                'title' => 'required|string|max:255',
                'sort_order' => 'integer',
                'active' => 'boolean',
            ]);

            $counter->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Counter updated successfully!'
            ]);
        }

        public function destroycounter($id)
        {
            $counter = ProgressCounter::findOrFail($id);
            $counter->delete();

            return response()->json([
                'success' => true,
                'message' => 'Counter deleted successfully!'
            ]);
        }

        


    public function showHeroBanners()
    {
        $banner = HeroBanner::first(); 
        return view('admin.manage-herosection', compact('banner'));
    }


    public function getBanners()
    {
       $banner = HeroBanner::first();
         return response()->json([
            'success' => true,
            'data' => $banner
        ]);
    }


    public function updateherobanner(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'move_text' => 'required|string', // || separated
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:102400'
    ]);

    $banner = HeroBanner::firstOrCreate([]); // Create if not exists

    $data = [
        'title' => $request->title,
        'move_text' => $request->move_text,
    ];

    if ($request->hasFile('image')) {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }
        $data['image'] = $request->file('image')->store('herobanners', 'public');
    }

    $banner->update($data);

    return response()->json([
                'success' => true,
                'message' => 'Hero banner updated successfully!'
            ]);
        }






public function homeaboutsection()
    {
        $about = AboutSection::first();
        return view('admin.manage-homeabout-sections', compact('about'));
    }

    public function getAbout()
    {
        $about = AboutSection::first();
        return response()->json([
            'success' => true,
            'data' => $about
        ]);
    }

   public function updatehomeaboutsection(Request $request)
{
    $request->validate([
        'sub_title' => 'required|string|max:255',
        'title_line1' => 'required|string|max:255',
        'title_line2' => 'required|string|max:255',
        'description' => 'required|string',
        'button_text' => 'required|string|max:100',
        'button_link' => 'required|string|max:255',
        'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'center_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->only([
        'sub_title',
        'title_line1',
        'title_line2',
        'description',
        'button_text',
        'button_link'
    ]);

    $about = AboutSection::first();

    if ($request->hasFile('logo_image')) {
        if ($about && $about->logo_image && Storage::disk('public')->exists($about->logo_image)) {
            Storage::disk('public')->delete($about->logo_image);
        }
        $data['logo_image'] = $request->file('logo_image')->store('about', 'public');
    }

    if ($request->hasFile('center_image')) {
        if ($about && $about->center_image && Storage::disk('public')->exists($about->center_image)) {
            Storage::disk('public')->delete($about->center_image);
        }
        $data['center_image'] = $request->file('center_image')->store('about', 'public');
    }

    if ($about) {
        $about->update($data);
    } else {
        AboutSection::create($data);
    }

    return response()->json([
        'success' => true,
        'message' => 'About section updated successfully!'
    ]);
}




public function showcta()
    {
        $cta = CtaSection::first();
        return view('admin.manage-tagline', compact('cta'));
    }

    public function getCta()
    {
        $cta = CtaSection::first();
        return response()->json([
            'success' => true,
            'data' => $cta
        ]);
    }

  public function updatetagline(Request $request)
{
    $request->validate([
        'heading'          => 'required|string|max:255',
        'description'      => 'required|string',
        'button_text'      => 'required|string|max:100',
        'button_link'      => 'required|string|max:255',
        'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    $data = $request->only([
        'heading',
        'description',
        'button_text',
        'button_link'
    ]);

    $cta = CtaSection::first();

    if ($request->hasFile('background_image')) {
        if ($cta && $cta->background_image && Storage::disk('public')->exists($cta->background_image)) {
            Storage::disk('public')->delete($cta->background_image);
        }

        $data['background_image'] = $request->file('background_image')
            ->store('cta', 'public');
    }

    if ($cta) {
        $cta->update($data);
    } else {
        CtaSection::create($data);
    }

    Cache::forget('cta_section');

    return response()->json([
        'success' => true,
        'message' => 'Call to Action section updated successfully!'
    ]);
}





public function showwhychooseus()
    {
        $section = WhyChooseUsSection::first();
        return view('admin.manage-why-choose-us', compact('section'));
    }

    public function getSection()
    {
        $section = WhyChooseUsSection::first();
        return response()->json([
            'success' => true,
            'data' => $section
        ]);
    }

   public function updateshowwhychooseus(Request $request)
{
    $request->validate([
        'sub_title'                 => 'required|string|max:255',
        'main_title'                => 'required|string|max:255',
        'features.*.title'          => 'required|string|max:255',
        'features.*.description'    => 'required|string',
        'right_image'               => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    $data = [
        'sub_title'  => $request->sub_title,
        'main_title' => $request->main_title,
        'features'   => $request->features, // array (will be JSON)
    ];

    $section = WhyChooseUsSection::first();

    if ($request->hasFile('right_image')) {
        if ($section && $section->right_image && Storage::disk('public')->exists($section->right_image)) {
            Storage::disk('public')->delete($section->right_image);
        }

        $data['right_image'] = $request->file('right_image')
            ->store('why-choose-us', 'public');
    }

    if ($section) {
        $section->update($data);
    } else {
        WhyChooseUsSection::create($data);
    }

    Cache::forget('why_choose_us_section');

    return response()->json([
        'success' => true,
        'message' => 'Why Choose Us section updated successfully!'
    ]);
}

}

    