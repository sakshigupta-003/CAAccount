<?php
namespace App\Http\Controllers;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{

 public function show()
    {
        return view('admin.manage-subscriber');
    }


    // Get all subscribers for DataTable
    public function get()
    {
        $subscribers = Subscriber::all();
        return response()->json(['data' => $subscribers]);
    }

    // Store a new subscriber
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $subscriber = Subscriber::create($request->only('email', 'status'));

        return response()->json(['success' => true, 'message' => 'Subscriber added successfully!']);
    }

    // Update an existing subscriber
    public function update(Request $request, $id)
    {
        $subscriber = Subscriber::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $subscriber->update($request->only('email', 'status'));

        return response()->json(['success' => true, 'message' => 'Subscriber updated successfully!']);
    }

    // Delete a subscriber
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return response()->json(['success' => true, 'message' => 'Subscriber deleted successfully!']);
    }
}
