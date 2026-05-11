<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     public function index()
    {
        return view('front.about');
    }

    public function show($id)
    {
        // Complete about content database
        $aboutContents = [
            1 => [
                'id' => 1,
                'name' => "What's New at Accountech",
                'short_description' => 'Latest updates, features, and announcements',
                'full_description' => '<p>We are excited to announce several new features and improvements at Accountech. Our platform now includes:</p>
                    <ul>
                        <li><strong>AI-Powered Financial Insights</strong> – Get smarter recommendations based on your financial data.</li>
                        <li><strong>Mobile App Launch</strong> – Manage your finances on the go with our new iOS and Android apps.</li>
                        <li><strong>Enhanced Security</strong> – Two-factor authentication and biometric login now available.</li>
                        <li><strong>Tax Filing Integration</strong> – Direct integration with income tax portal for seamless filing.</li>
                        <li><strong>24/7 Chat Support</strong> – Round-the-clock assistance from our expert team.</li>
                    </ul>
                    <p>These updates are designed to make your financial journey smoother and more efficient. Contact us to learn how these new features can benefit your business.</p>',
                'image' => 'Whats-New-img.jpg',
                'icon' => 'fa-newspaper',
                'date' => 'January 15, 2025',
                'author' => 'Accountech Team',
                'category' => 'Announcement'
            ],
            2 => [
                'id' => 2,
                'name' => 'Event Calendar',
                'short_description' => 'Upcoming events, webinars, and training sessions',
                'full_description' => '<p>Join us for our upcoming events designed to enhance your financial knowledge and skills:</p>
                    <ul>
                        <li><strong>GST Compliance Webinar</strong> – March 15, 2025 (10:00 AM) – Learn about latest GST updates and filing procedures.</li>
                        <li><strong>Financial Planning Workshop</strong> – March 22, 2025 (2:00 PM) – Interactive session on retirement and investment planning.</li>
                        <li><strong>Tax Saving Strategies</strong> – April 5, 2025 (11:00 AM) – Expert tips to maximize your tax savings this year.</li>
                        <li><strong>Business Growth Summit</strong> – April 20, 2025 (9:00 AM) – Full-day event with industry leaders.</li>
                        <li><strong>Tally Prime Training</strong> – Every Saturday – Hands-on training for beginners and advanced users.</li>
                    </ul>
                    <p>All events are free for Accountech members. Register now to secure your spot!</p>',
                'image' => 'Event-Calendar-img.jpg',
                'icon' => 'fa-calendar-alt',
                'date' => 'February 01, 2025',
                'author' => 'Events Team',
                'category' => 'Events'
            ],
            3 => [
                'id' => 3,
                'name' => 'Career Opportunities',
                'short_description' => 'Join the Accountech family – Grow with us',
                'full_description' => '<p>Accountech is always looking for talented professionals to join our growing team. Current openings include:</p>
                    <ul>
                        <li><strong>Senior Accountant</strong> – 5+ years experience, CA/CMA preferred – Mumbai</li>
                        <li><strong>Tax Consultant</strong> – 3+ years experience in GST and Income Tax – Delhi</li>
                        <li><strong>Financial Analyst</strong> – MBA Finance with 2+ years experience – Bangalore</li>
                        <li><strong>Software Developer</strong> – Full-stack developer for financial applications – Remote</li>
                        <li><strong>Customer Support Executive</strong> – 1+ years experience in finance domain – Hyderabad</li>
                    </ul>
                    <p>Why join Accountech?</p>
                    <ul>
                        <li>Competitive salary and performance bonuses</li>
                        <li>Flexible work arrangements (hybrid/remote options)</li>
                        <li>Professional development and certification support</li>
                        <li>Health insurance and wellness benefits</li>
                        <li>Great work culture and growth opportunities</li>
                    </ul>
                    <p>Send your resume to careers@accountech.com or apply through our careers portal.</p>',
                'image' => 'Career-img.jpg',
                'icon' => 'fa-briefcase',
                'date' => 'February 10, 2025',
                'author' => 'HR Department',
                'category' => 'Careers'
            ]
        ];

        // Get content by ID or default to first
        $about = (object)($aboutContents[$id] ?? $aboutContents[1]);

        // Get related content (exclude current)
        $relatedContents = array_filter($aboutContents, function($key) use ($id) {
            return $key != $id;
        }, ARRAY_FILTER_USE_KEY);
        
        $relatedContents = array_slice($relatedContents, 0, 2);

        return view('front.aboutdetails', compact('about', 'relatedContents'));
    }
}
