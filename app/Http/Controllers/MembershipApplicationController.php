<?php
namespace App\Http\Controllers;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembershipApplicationController extends Controller
{



    public function index()
    {
        return view('admin.manage-membership');
    }

    public function getData()
    {
        $applications = MembershipApplication::select([
            'id', 'name', 'email', 'phone', 'member_type', 'status', 'created_at'
        ])->latest()->get();

        return response()->json(['data' => $applications]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'nullable|string|max:30',
            'dob'                   => 'nullable|date',
            'gender'                => 'nullable|in:male,female,other,prefer_not_to_say',
            'member_type'           => 'nullable|in:new,returning',
            'status'                => 'required|in:pending,reviewed,approved,rejected',
            // add other fields validation if you want strict rules
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        MembershipApplication::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Application added successfully!'
        ]);
    }

    public function update(Request $request, $id)
    {
        $application = MembershipApplication::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|max:255',
            'phone'                 => 'nullable|string|max:30',
            'dob'                   => 'nullable|date',
            'gender'                => 'nullable|in:male,female,other,prefer_not_to_say',
            'member_type'           => 'nullable|in:new,returning',
            'status'                => 'required|in:pending,reviewed,approved,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $application->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully!'
        ]);
    }

    public function destroy($id)
    {
        $application = MembershipApplication::findOrFail($id);
        $application->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully!'
        ]);
    }
}