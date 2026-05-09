<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
       use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function Showadmincontact(){
        return view('admin.contact-manage');
    }

    public function getContacts()
    {
        $contacts = Contact::latest()->get()->map(function ($contact) {
            return [
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'phone' => $contact->phone ?? 'N/A',
                'service' => $contact->service ?? 'N/A',
                'what_do_you_want' => $contact->what_do_you_want ?? 'N/A',
                'message' => Str::limit($contact->message ?? 'N/A', 50),
                'status' => $contact->status ?? 'pending', 
                'created_at' => $contact->created_at?->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }

    // Store (updated: added status default, fixed redirect)
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
            ],

            'phone' => [
                'required',
                'digits:10', 
            ],

            'service' => ['required', 'string', 'max:255'],

            'what_do_you_want' => ['required', 'string', 'max:255'],

            'message' => ['required', 'string', 'max:1000'],
        ]);


        Contact::create(array_merge($request->all(), ['status' => 'pending'])); 

        return redirect()->route('contact-us')
            ->with('success', 'Contact message sent successfully!');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if (request()->ajax()) {
            if (isset($contact->status)) {
                $contact->update(['status' => 'read']);
            }
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'phone' => $contact->phone ?? 'N/A',
                    'service' => $contact->service ?? 'N/A',
                    'what_do_you_want' => $contact->what_do_you_want ?? 'N/A',
                    'message' => $contact->message,
                    'status' => $contact->status ?? 'pending',
                    'created_at' => $contact->created_at?->toISOString(),

                ]
            ]);
        }
        return view('contacts.show', compact('contact'));
    }

    // Edit (unchanged, but can add if needed for status update)
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'what_do_you_want' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
            'status' => 'nullable|in:pending,read,replied', // If status field exists
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index') 
            ->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        if (request()->ajax()) {
            $contact->delete();
            return response()->json([
                'success' => true,
                'message' => 'Contact deleted successfully.'
            ]);
        }
        $contact->delete();
        return redirect()->route('admin.contacts.index') 
            ->with('success', 'Contact deleted successfully!');
    }
}