<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
      public function index()
    {
        return view('front.service');
    }

    public function show($id)
    {
        // Complete service database
        $services = [
            1 => [
                'id' => 1,
                'name' => 'Audit Services',
                'short_description' => 'Professional audit services ensuring compliance and financial integrity',
                'full_description' => 'Our comprehensive audit services provide independent verification of your financial records. We identify risks, ensure regulatory compliance, and deliver actionable insights to improve your business operations. Our team of certified auditors follows international standards (ISA) to deliver accurate and transparent audit reports.',
                'image' => 'audit.jpg',
                'price' => 499,
                'duration' => '2-4 weeks',
                'level' => 'All Business Sizes',
                'icon' => 'fa-search',
                'features' => [
                    'Statutory Audit Compliance',
                    'Internal Audit & Risk Assessment',
                    'Tax Audit & Regulatory Filings',
                    'Forensic Audit & Fraud Detection',
                    'Management Audit & Process Improvement',
                    'GST Audit & Compliance Review'
                ]
            ],
            2 => [
                'id' => 2,
                'name' => 'Income Tax Preparation',
                'short_description' => 'Expert tax preparation to maximize your savings',
                'full_description' => 'Our tax preparation experts ensure accurate filing while maximizing your eligible deductions and credits. We stay updated with the latest tax laws to minimize your tax liability and prevent costly errors. Whether individual or corporate, we handle all your tax needs with precision.',
                'image' => 'tax.jpg',
                'price' => 299,
                'duration' => '1-3 weeks',
                'level' => 'Individuals & Businesses',
                'icon' => 'fa-file-invoice-dollar',
                'features' => [
                    'Individual Income Tax Filing (ITR)',
                    'Corporate Tax Returns',
                    'TDS Return Filing',
                    'Tax Planning & Advisory',
                    'Tax Audit Representation',
                    'Previous Year Tax Return Filing'
                ]
            ],
            3 => [
                'id' => 3,
                'name' => 'Financial Planning',
                'short_description' => 'Strategic financial planning for long-term success',
                'full_description' => 'Our financial planning services help you achieve your life goals through strategic wealth management. We analyze your current financial situation, define goals, and create actionable plans covering investments, retirement, insurance, and estate planning.',
                'image' => 'planning.jpg',
                'price' => 599,
                'duration' => '4-6 weeks',
                'level' => 'Individuals & Families',
                'icon' => 'fa-chart-line',
                'features' => [
                    'Retirement Planning',
                    'Investment Portfolio Management',
                    'Estate & Succession Planning',
                    'Risk Management & Insurance',
                    'Education Fund Planning',
                    'Wealth Preservation Strategies'
                ]
            ],
            4 => [
                'id' => 4,
                'name' => 'Business Consulting',
                'short_description' => 'Strategic consulting for business growth',
                'full_description' => 'Our business consulting services provide actionable strategies to improve profitability, optimize operations, and drive sustainable growth. We work closely with you to identify opportunities, overcome challenges, and implement effective solutions.',
                'image' => 'bussiness.jpg',
                'price' => 799,
                'duration' => '6-8 weeks',
                'level' => 'Startups & Enterprises',
                'icon' => 'fa-handshake',
                'features' => [
                    'Business Strategy Development',
                    'Financial Performance Analysis',
                    'Mergers & Acquisitions Advisory',
                    'Business Valuation Services',
                    'Operational Efficiency Improvement',
                    'Market Entry Strategy'
                ]
            ],
            5 => [
                'id' => 5,
                'name' => 'GST Services',
                'short_description' => 'Complete GST compliance and filing solutions',
                'full_description' => 'Our GST services simplify compliance and ensure timely filing of all GST returns. We handle registration, return filing, input tax credit optimization, and represent you during assessments and audits.',
                'image' => 'gst1.jpg',
                'price' => 349,
                'duration' => 'Ongoing / Monthly',
                'level' => 'All Businesses',
                'icon' => 'fa-percentage',
                'features' => [
                    'GST Registration (New & Amendment)',
                    'Monthly/Quarterly GST Return Filing',
                    'Input Tax Credit Reconciliation',
                    'GST Notice & Audit Representation',
                    'E-way Bill Generation',
                    'Annual GST Return (GSTR-9/9C)'
                ]
            ],
            6 => [
                'id' => 6,
                'name' => 'Company Registration',
                'short_description' => 'Hassle-free company registration services',
                'full_description' => 'We simplify the company registration process, guiding you through entity selection, documentation, and compliance requirements. Get your business legally recognized quickly with our expert assistance.',
                'image' => 'company.jpg',
                'price' => 499,
                'duration' => '2-3 weeks',
                'level' => 'Startups & Entrepreneurs',
                'icon' => 'fa-building',
                'features' => [
                    'Private Limited Company Registration',
                    'LLP Registration',
                    'One Person Company (OPC) Registration',
                    'Section 8 Company (NGO) Registration',
                    'GST & MSME Registration',
                    'Trademark & IP Registration'
                ]
            ]
        ];

        // Get service by ID or default to first
        $service = (object)($services[$id] ?? $services[1]);

        // Get related services (exclude current)
        $relatedServices = array_filter($services, function($key) use ($id) {
            return $key != $id;
        }, ARRAY_FILTER_USE_KEY);
        
        $relatedServices = array_slice($relatedServices, 0, 3);

        return view('front.servicedetails', compact('service', 'relatedServices'));
    }

    public function enroll($id)
    {
        return redirect()->route('services')->with('success', 'Service inquiry submitted successfully!');
    }
}
