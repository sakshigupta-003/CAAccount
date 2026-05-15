<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\MembershipApplication;
use App\Models\Service;
use App\Models\Subscriber;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    $totalUsers      = User::count();
    $totalBlogs      = Blog::count();
    $totalInquiry        = Contact::count();
    $totalMembers      = MembershipApplication::count();
    $totalServices      = Service::count();
    $totalSubscribers      = Subscriber::count();



    return view('admin.index', compact(
        'totalUsers',
        'totalBlogs',
        'totalInquiry',
        'totalMembers',
        'totalServices',
        'totalSubscribers'
    ));
    }

 
}
