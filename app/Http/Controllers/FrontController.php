<?php
namespace App\Http\Controllers;
use App\Models\Interest;
use App\Models\Consult;
use App\Models\Project;
use App\Models\City;
use App\Models\Blog;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Resume;
use App\Models\Property;
use App\Mail\ConsultSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Models\Budget;
use App\Models\Faq;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\MembershipApplication;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\CtaSection;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function Homepageloaded()
    {
        $categories = Project::select('id', 'title', 'slug','image', 'status')->where('status', 'active')->get();
            return view('front.index', compact('categories'));
        }


        public function packagesload(){
            return view('front.packages');
        }

         public function showcontact(){
            return view('front.contact-us');
        }


    public function intrestsload() {
        return response()->json(Interest::select('id', 'name')->get());
    }

    public function budgetsload() {
        return response()->json(Budget::select('id', 'budgetname as label')->get()); 
    }


    public function storeconsultform(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', 
            'interests' => 'required|array|',
            'interests.*' => 'nullable|', 
            'budget' => 'required',
        ]);

        $consult = Consult::create([
            'name' => strip_tags($request->name), 
            'phone' => strip_tags($request->phone),
            'interests' => $request->interests, 
            'budget' => $request->budget
        ]);

        Mail::to('aksinger70806307@gmail.com') 
            ->send(new ConsultSubmitted($consult));

        return response()->json([
            'success' => true,
            'message' => 'Inquiry submitted successfully!'
        ], 201);


        return response()->json([
            'success' => true,
            'message' => 'Inquiry submitted successfully!',
            'id' => $consult->id
        ], 201);
    }

  
    public function index()
    {
        $consuls = Consult::with('budget')->latest()->paginate(10);
        return view('admin.consuls.index', compact('consuls'));
    }

    public function destroy(Consult $consult)
    {
        $consult->delete();
        return redirect()->route('admin.consuls.index')->with('success', 'Deleted!');
    }


    public function galleryload(){
        $projectsgallerys = Project::where('status', 'active')
            ->select('id', 'title', 'status')
            ->with(['properties' => function($query) {
                $query->select('id', 'project_id', 'title', 'building_name', 'images', 'video_url');
            }])
            ->get();
        return view('front.gallery', compact('projectsgallerys'));
    }

    public function projectsload(){
        $projects = Project::where('status', 'active')->withCount('properties')->get();
        return view('front.projects', compact('projects'));
    }

    public function propertiesByProject($slug){
        $project = Project::where('slug', $slug)->with('properties')->firstOrFail();
        $properties = $project->properties()->select('id','images', 'logo', 'title', 'location_details', 'price', 'slug')->where('status', '!=', 'sold')->get();
        return view('front.properties', compact('project', 'properties'));
    }


    public function propertiesDetails($slug){
        $property = Property::where('slug', $slug)->with('project')->firstOrFail();

        // dd($property);
        $priceDisplay = $property->sale_type === 'For Rent' 
            ? number_format($property->price, 0) . ' /month' 
            : ($property->price < 10000000 
                ? number_format($property->price / 100000, 2) . ' L' 
                : number_format($property->price / 10000000, 2) . ' Cr');

        $AmenitiesIds = json_decode($property->amenities, true);

        $locations = json_decode($property->location_details, true);


        $amenities = City::whereIn('id', $AmenitiesIds)->get();
       
          $recentProperties = Property::where('id', '!=', $property->id)
            ->latest('listed_date')
            ->limit(8)
            ->get();

        foreach ($recentProperties as $recent) {
            $recent->images = is_string($recent->images)
                ? json_decode($recent->images, true)
                : $recent->images;
        }

        $images = $property->images;

        if (is_string($images)) {
            $images = json_decode($images, true);
        }

        if (is_string($images)) {
            $images = json_decode($images, true);
        }


        return view('front.property-details', compact('property','images','locations','priceDisplay','recentProperties', 'amenities'));
    }


    public function frontendIndexblogs()
    {
        $blogs = Blog::select('id', 'title', 'slug','long_description', 'image', 'publish_date', 'status')->where('status', 'active')->orderBy('publish_date', 'desc')->get();
        return view('front.blogs', compact('blogs'));
    }

   public function showDetailsa_of_blogs($slug)
{
    $blog_details = Blog::select('id', 'title', 'slug','long_description','short_description', 'image', 'publish_date', 'status')->where('slug', $slug)->where('status', 'active')->firstOrFail();
    return view('front.blog-details', compact('blog_details'));
}

    



    public function storeresume(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'position' => 'required|string',
            'resume' => 'required|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
        }

        Resume::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'resume_path' => $path ?? null,
        ]);

        return redirect()->back()->with('success', 'Your resume has been submitted successfully!');
    }



       public function showservices(){
        $categories = Project::select('id', 'title', 'slug','image', 'status')->where('status', 'active')->get();

            return view('front.service',compact('categories'));
        }

 function showfaq()
    {
        $faqs = Faq::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('front.faq', compact('faqs'));
    }



     public function getServicesForNav()
    {
        $services = Service::with(['category'])
            ->active()
            ->ordered()
            ->select('id', 'name', 'slug', 'short_description', 'image')
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }
    
    /**
     * Show service detail page by slug
     */
    public function showService($slug)
    {
        
        $service = Service::with(['category', 'variants'])
            ->where('slug', $slug)
            ->firstOrFail();
            
        // Get other services for "Related Services" section
        $relatedServices = Service::with(['category'])
            ->where('id', '!=', $service->id)
            ->where('category_id', $service->category_id)
            ->limit(3)
            ->get();
            
        return view('front.service-details', compact('service', 'relatedServices'));
    }
    
    /**
     * Show all services listing page
     */
    public function allServices()
    {
        $services = Service::with(['category', 'variants'])
            ->active()
            ->ordered()
            ->paginate(9);
            
        $categories = ServiceCategory::whereHas('services', function($query) {
            $query->active();
        })->get();
            
        return view('front.services', compact('services', 'categories'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'required|string|max:12',
            'dob'                   => 'nullable|date',
            'gender'                => 'nullable|in:male,female,other,prefer_not_to_say',
            'member_type'           => 'nullable|in:new,returning',
            'interests'             => 'nullable|array',
            'interests.*'           => 'in:Networking,Access to resources,Volunteering,Skill Development',
            'interested_programs'   => 'nullable|string',
            'accommodations_needed' => 'nullable|string',
            'street'                => 'nullable|string',
            'city'                  => 'nullable|string',
            'state_province'        => 'nullable|string',
            'postal_code'           => 'nullable|string',
            'country'               => 'nullable|string',
            'message'               => 'nullable|string',
        ]);

        MembershipApplication::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your membership application has been submitted successfully.');
    }


       public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subscriber::create([
            'email' => $request->email,
            'status' => 'active'
        ]);

        return redirect()->back()
            ->with('success', 'Successfully subscribed to our newsletter!');
    }

}
