<?php
namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.manage-faqs');
    }

    public function getAll()
    {
        $faqs = Faq::latest()->get();
        return response()->json([
            'success' => true,
            'data'    => $faqs
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'required|in:active,inactive',
        ]);

        $data = $request->only(['question', 'answer', 'status']);


        $faq = Faq::create($data);

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully',
            'data'    => $faq
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'status'   => 'required|in:active,inactive',
        ]);

        $data = $request->only(['question', 'answer', 'status']);

        $faq->update($data);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

      
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully'
        ]);
    }

 
}