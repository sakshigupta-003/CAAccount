<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function show($id)
    {
        // Complete course database
        $courses = [
            1 => [
                'id' => 1,
                'name' => 'Tally Prime',
                'short_description' => 'Master Tally Prime accounting software from basics to advanced',
                'full_description' => 'TallyPrime is a comprehensive business management software designed for small to medium enterprises (SMEs) to simplify daily tasks like accounting, inventory, banking, and compliance. Released in 2020 as an evolution of Tally.ERP 9, it is known for its user-friendly interface, fast navigation, and robust reporting, enabling efficient management of finances and operations without requiring advanced accounting skills.This comprehensive Tally Prime course covers everything from basic accounting entries to advanced financial reporting. You will learn how to manage company data, create invoices, handle inventory, generate GST reports, and much more. Perfect for aspiring accountants and business owners.Your business is continuously evolving. With every passing day, there are developments with the people you deal with, the people that work for you, the norms that you need to comply with and generally the way of doing business. In such an ever-changing business environment, it is important that your trusted business partner also evolves to simplify your life further while allowing you to focus on your constant goal – growing your business through simple to use and delightful technology products that are aimed at increasing efficiency in business management.In 7.0 releases, TallyPrime has brought in connected capabilities that make it easier to stay on top of compliance, manage business banking more intuitively, and free up valuable time through smarter automation. With TallyPrime 7.0, these capabilities come together to keep your business truly connected, protected, and in control.​

With TallyPrime 7.0, you move faster with SmartFind (advanced search), stay safer with Auto Backup 2.0, and work smarter with an enhanced Connected Banking experience. Backup has long been a part of TallyPrime, giving businesses confidence that their data is safe, and in this release it becomes even more seamless and flexible. Your backups now run quietly in the background without disturbing your everyday work, so protection is always on and effortless.​​

In simple terms, TallyPrime 7.0 gives you:​

Auto Backup 2.0 (Backup 2.0): Schedule automatic backups to TallyDrive (cloud) or local drives, with incremental and full backup options so your data stays safe even if something goes wrong with your system.
Background and scheduled backups: Backups run quietly in the background at hourly, daily, or weekly intervals, so there is no need to remember manual backups or stop work while data is being protected.
SmartFind: A powerful, new‑age search that helps you instantly find vouchers, ledgers, GST entries, masters, or banking records across companies by simply typing what you are looking for, instead of hunting through menus.
Enhanced Connected Banking / PrimeBanking Payments: View live bank balances, fetch bank statements in seconds, make payments directly from TallyPrime, and auto‑reconcile entries, all from a single, secure login.
GST and compliance improvements: Better handling of e‑invoice and e‑way bill JSONs, ITC reduction in Input Tax Credit reports, and smarter mismatch alerts to keep your returns clean and compliant.
Performance and live migration: Faster reporting, smoother data exchange (including JSON), and live migration support so you can upgrade to Release 7.0 and continue working without downtime or complicated steps.
TallyPrime 6.0 – Easier banking and reconciliation
TallyPrime Release 6.0 focuses on making banking and reconciliation smoother, so your books stay in sync with your bank with very little manual work. By connecting your bank and automating matching, it reduces one of the most time‑consuming tasks for finance teams.​​

In simple bullet points, Release 6.0 offers:​​

Connected Banking 2.0 to fetch bank balances and statements right inside TallyPrime for supported banks.
Automated bank reconciliation that matches entries and suggests links, helping you reconcile faster with fewer errors.
Options to create and post vouchers from bank statement lines, cutting down repeated data entry.
Better visibility of uncleared cheques, charges, and differences so you can fix issues quickly and keep cash flow under control.
TallyPrime 5.0 – Connected GST and smart compliance
TallyPrime Release 5.0 builds on this by focusing on connected GST, automated compliance, and better payment management. It makes keeping track of tax and due dates easier, so you can spend more time on customers and growth.​

In simple, business‑friendly terms, Release 5.0 gives you:​

Connected GST: Upload and download GST returns directly from TallyPrime, so you do not need to jump between multiple portals and files.
Automated TDS under section 194Q: Let the software calculate TDS automatically based on rules, reducing manual calculation errors.
Smarter payment management: Sort and pay pending bills by due date, amount, or other options so you never miss an important payment.
Instant task notifications: A new bell icon and Notification report to remind you about GST uploads, return filing, TSS renewal, and license‑related alerts.
Clearer view with Stripe View: Better visual separation in reports and vouchers so long lists are easier to read and review.
Better language support: Use TallyPrime in local languages like those used in the Middle East and Bangladesh, even with different language preferences across networked systems.
Smooth upgrade experience: Move from Release 3.0 or later to Release 5.0 simply by taking a backup and loading your data—no complex migration steps.
 TallyPrime 4.0 – Dashboards and WhatsApp sharing
Since Release 4.0, TallyPrime has added several capabilities to make business management faster, more connected, and more automated. These releases focus on giving business owners better insights, smoother communication, and less manual work across accounting and banking.​

From Release 4.0 onwards, TallyPrime has steadily improved in three big areas: business insights and reporting, connected communication with customers, and automated banking and compliance. Together, these updates make TallyPrime simplified software that keeps reducing clicks, errors, and effort as your business grows.​

Key highlights of Release 4.0 in simple terms:​

Ready‑made business dashboards with charts and tiles so you can see sales, receipts, dues, and stock at a glance.
Customisable dashboard views to track exactly what matters to you, like top customers or slow‑moving items.
WhatsApp for Business integration to share invoices, ledgers, and reminders directly from TallyPrime.
Simplified Excel import to bring in masters and transactions from spreadsheets with fewer steps and less technical effort.
Usability improvements across reports and navigation to keep work fast and clutter‑free.

In our constant endeavour of doing so, we have revisited every area of our product, analysed how we can deliver the simplest experience possible and made it come alive with…

Simplicity at a whole new level with an amazing and easy user experience so that your work gets done faster
Ultra-flexible and intuitive design so you can get more out of the software and take full advantage of it
A refreshing look and feel that will surely delight you
Easy to learn and use
Enhanced user and feature-based security for restricted and trusted business data access
TallyPrime has been designed in a way that you will rarely need any support or help in running the product as per your needs. Experience TallyPrime to truly feel its power and transform your business with improved efficiency.',
                'image' => 'tally.png',
                'price' => 199,
                'duration' => '6 weeks',
                'level' => 'Beginner',
                'modules' => [
                    'Introduction to Tally Prime',
                    'Company Creation and Configuration',
                    'Accounting Vouchers and Entries',
                    'Inventory Management',
                    'GST Implementation and Returns',
                    'Financial Statements and Reporting',
                    'Final Assessment Project'
                ]
            ],
            2 => [
                'id' => 2,
                'name' => 'GST Training',
                'short_description' => 'Complete GST compliance and filing training',
                'full_description' => 'The introduction of Goods and Services Tax (GST) would be a very significant step in the
field of indirect tax reforms in India. By amalgamating a large number of Central and State taxes
into a single tax, it would mitigate cascading or double taxation in a major way and pave the way
for a common national market. From the consumer point of view, the biggest advantage would be in
terms of a reduction in the overall tax burden on goods, which is currently estimated to be around
25%-30%. Introduction of GST would also make Indian products competitive in the domestic and
international markets. Studies show that this would have a boosting impact on economic growth.
Last but not the least, this tax, because of its transparent and self-policing character, would be easier
to administerMaster the Goods and Services Tax (GST) system with this comprehensive course. Learn about GST registration, return filing, input tax credit, reverse charge mechanism, and latest compliance updates. This course is essential for tax professionals and business owners.There is number of taxes being levied on very same transaction by Central Government, State
Government or local authority. The taxable event in each case is different. However, the major
sources of income of Government from taxation are from excise duty levied on manufacture of
goods, customs duty levied on importation of goods, service tax levied on rendering of service and
VAT levied on sale of goods. The entries in List I, List II and List III of Schedule VII of
Constitution of India provide power to Central or State Government to levy tax.
The Central Government did not have power to levy tax on sale of goods and the State
Governments did not have power to levy duty/tax on manufactures of goods or rendering of service.
Therefore, Constitution of India has been amended to provide powers to both Central Government
and State Governments to levy tax on goods and services on activities specified in the Constitution. The Constitution has also been amended to provide for a GST Council to be constituted by the President of India to make recommendations on important issues related to GST. The GST Council has been constituted and it has been recommending various issues related to GST. The GST Council has recommended that the GST would be levied on all goods and services except alcoholic liquor for human consumption and five petroleum products. The GST Council has also recommended that the GST would be levied at four different rates of 5%, 12%, 18% and 28% on different goods and services. The GST Council has also recommended that the GST would be levied on all goods and services except those specified in the negative list. The GST Council has also recommended that the GST would be levied on all goods and services except those specified in the exempted list. The GST Council has also recommended that the GST would be levied on all goods and services except those specified in the nil rated list. The GST Council has also recommended that the GST would be levied on all goods and services except those specified in the non-GST list.',
                'image' => 'gst.jpg',
                'price' => 249,
                'duration' => '8 weeks',
                'level' => 'Intermediate',
                'modules' => [
                    'GST Overview and Concepts',
                    'Registration and Amendment',
                    'Tax Invoice and Credit Notes',
                    'GST Returns (GSTR-1, 3B, 9)',
                    'Input Tax Credit (ITC)',
                    'Reverse Charge Mechanism (RCM)',
                    'GST Audit and Assessment',
                    'Final Certification Exam'
                ]
            ],
            3 => [
                'id' => 3,
                'name' => 'Advanced Excel',
                'short_description' => 'Master Excel for business and data analysis',
                'full_description' => 'Take your Excel skills to the next level with this advanced course. Learn pivot tables, complex formulas, macros, VBA programming, and data visualization techniques. Perfect for finance professionals and data analysts.The next aspect of exploring advanced Excel is knowing more about the skills. Rapid and effective data collection and analysis are required. Advanced MS Excel spreadsheets often exhibit financial data and other information necessary for corporate operations. It might be information for sales, marketing, human resources, or the customer relationship management division. Even though so many corporate duties are now focused on IT and the cloud, Excel continues to be a crucial tool for administration and efficient business management. Excel is a powerful tool for data analysis, financial modeling, and business intelligence. This course covers advanced features like pivot tables, complex formulas, macros, VBA programming, and data visualization techniques. Perfect for finance professionals and data analysts looking to master Excel for business applications. In this course, you will learn how to use Excel to analyze data, create financial models, automate tasks with macros and VBA, and visualize insights with charts and dashboards. By the end of the course, you will have the skills to leverage Excel for advanced business analysis and decision-making. Whether you are a finance professional, data analyst, or business manager, mastering advanced Excel will enhance your ability to work with data and make informed decisions. This course is designed to take your Excel skills to the next level and help you become proficient in using Excel for complex data analysis and business applications. Advanced Formulas: Mastery of XLOOKUP, INDEX+MATCH, nested IF statements, AND/OR logic, and text manipulation tools like TEXTJOIN.Data Analysis & Visualization: Using Pivot Tables and Pivot Charts for summarizing data, and creating interactive Dashboards.Data Modeling & Power Query: Using Power Query for ETL (Extract, Transform, Load) to clean and prepare data, and creating data models.What-If Analysis: Using tools like Goal Seek, Data Tables, and Scenario Manager to model different business outcomes.Automation: Recording Macros and writing VBA (Visual Basic for Applications) code to automate repetitive tasks.',
                'image' => 'advanced.jpg',
                'price' => 149,
                'duration' => '5 weeks',
                'level' => 'Beginner to Advanced',
                'modules' => [
                    'Advanced Formulas and Functions',
                    'Pivot Tables and Charts',
                    'Data Validation and Conditional Formatting',
                    'Macros and VBA Basics',
                    'Dashboard Creation',
                    'Power Query and Power Pivot',
                    'Final Project'
                ]
            ],
            4 => [
                'id' => 4,
                'name' => 'Accounting Training',
                'short_description' => 'Complete accounting course for professionals',
                'full_description' => 'Master the fundamentals and advanced concepts of accounting. Learn financial statements, journal entries, ledgers, trial balance, and real-world bookkeeping practices. This course prepares you for a successful career in accounting. Accounting is the system of recording financial transactions with both numbers and text in the form of financial statements. It provides an essential tool for billing customers, keeping track of assets and liabilities (debts), determining profitability, and tracking the flow of cash. The system is largely self-regulated and designed for the users of financial information, who are referred to as stakeholders: business owners, lenders, employees, managers, customers, and others. Stakeholders utilize financial statements to help make business, lending, and investment decisions.Accounting has several specialized fields and roles. Private (internal) accounting generally refers to accountants who work within a single business entity. Small business accountants may assume general roles which require preparing the records (bookkeeping) and performing bank reconciliations. Accounting professionals are generally divided into three fields: tax, audit, and advisory. The tax field focuses on federal, state, and local tax filings. Audit roles test the validity of financial statements and internal controls. Advisory services perform general financial consulting.  Public accounting firms have several different clients, whereas private accounting refers to working for one specific business entity. This course covers both the theoretical concepts and practical applications of accounting, including financial statements, journal entries, ledgers, trial balance, and real-world bookkeeping practices. Whether you are new to accounting or looking to refresh your skills, this course will prepare you for a successful career in accounting. Topics include accounting principles, financial reporting, bookkeeping, and hands-on projects to apply your knowledge in real-world scenarios. The course is designed for aspiring accountants, business owners, and anyone interested in understanding the fundamentals of accounting and financial management.',
                'image' => 'acocunt.jpg',
                'price' => 299,
                'duration' => '10 weeks',
                'level' => 'All Levels',
                'modules' => [
                    'Accounting Principles and Concepts',
                    'Journal Entries and Ledgers',
                    'Trial Balance and Adjustments',
                    'Financial Statements Preparation',
                    'Bank Reconciliation',
                    'Depreciation and Inventory Valuation',
                    'Final Accounts and Closing Entries',
                    'Practical Bookkeeping Project'
                ]
            ],
            5 => [
                'id' => 5,
                'name' => 'Taxation Course',
                'short_description' => 'Complete income tax and corporate tax training',
                'full_description' => 'A taxation course introduction provides a foundational overview of how governments levy taxes on individuals and businesses to fund public services. Courses generally cover the distinction between direct (e.g., income) and indirect (e.g., VAT/GST) taxes, tax compliance, filing procedures, and principles like fairness and economic efficiencyLearn the intricacies of income tax, corporate tax, TDS, and tax planning strategies. This course covers both direct and indirect taxation for individuals and businesses.he first chapter in PAK outlines the basic purposes and
principles of taxation. This is an overview chapter. Read it
with the goal of gaining a broad understanding of tax
purposes and principles. Although the history is interesting, for
1 Unit 01. Introduction to Taxation
with the goal of gaining a broad understanding of tax
purposes and principles. Although the history is interesting, for
our purposes, the sections on tax structure, types of tax, tax
administration, and understating the tax law will be relatively
more important.
For efficiency and space reasons textbook examples are not
copied to the slides. Instead, you are asked to study specific
examples in the textbook when you read through the slides at
various points. These example-study notes are highlighted in
RED. The examples are important. They will help you understand the concepts and they will be the basis for some of the questions on
the exams. So, please make sure to study the examples in the textbook as you read through the slides.
The second chapter in PAK covers the basic concepts of income tax. It is a very important chapter. It covers the basic concepts of income tax, including the definition of income, the concept of taxable income, and the different types of income that are subject to tax. It also covers the concept of tax deductions and tax credits, which are important for reducing your tax liability. The chapter also covers the concept of tax rates and how they apply to different types of income. Finally, the chapter covers the concept of tax filing and the different types of tax returns that individuals and businesses are required to file. Overall, this chapter provides a comprehensive overview of the basic concepts of income tax and is essential for anyone looking to understand how income tax works in Pakistan. Marginal tax rate – most useful rate in tax planning
 Tax rate applied to incremental amount of taxable income that is
added to tax base.
 Study Example 1-4 on Page 1-5
 Average tax rate
 Total tax liability divided by amount of taxable income
 Study Example 1
-5 on Page 1
-
6
Effective tax rate
13
 Study Example 1
-5 on Page 1
-
6
 Effective tax rate
 Total tax liability divided by total economic incom
e
 Study Example 1-5 on Page 1-6
 The marginal, average, and effective tax rates may
vary significantly from the nominal schedule rates.
 For example, even though the nominal maximum individual
rate is 35%, the marginal rate will be increased by any
phase-out of exemptions or itemized deductions.',
                'image' => 'tax.jpg',
                'price' => 279,
                'duration' => '9 weeks',
                'level' => 'Intermediate',
                'modules' => [
                    'Income Tax Basics',
                    'Heads of Income',
                    'Deductions and Exemptions',
                    'Tax Planning Strategies',
                    'Corporate Tax Framework',
                    'TDS and TCS Compliance',
                    'Tax Returns and Filing',
                    'GST Integration',
                    'Final Case Studies'
                ]
            ],
            6 => [
                'id' => 6,
                'name' => 'Cost Accounting',
                'short_description' => 'Master cost management and analysis',
                'full_description' => 'Cost accounting is an internal management process that records, analyzes, and reports detailed expenses to determine the cost of products, services, or activities. It helps management improve operational efficiency, set prices, and make informed decisions, focusing on both fixed and variable costs. Unlike financial accounting, it is used for internal, forward-looking planning. Understand cost allocation, variance analysis, and management accounting principles. Learn how to calculate product costs, analyze variances, and make informed financial decisions. This course is essential for accountants and business managers looking to optimize cost management and profitability. Cost accounting is a crucial aspect of financial management that focuses on capturing, analyzing, and reporting the costs associated with producing goods or providing services. It helps businesses understand their cost structure, identify areas for cost reduction, and make informed decisions to improve profitability. This course covers key concepts such as cost classification, cost behavior, cost allocation methods, variance analysis, and budgeting. By mastering cost accounting principles and techniques, you will be equipped to manage costs effectively, optimize resource allocation, and contribute to the financial success of your organization. Whether you are an accountant, financial analyst, or business manager, this course will provide you with the skills and knowledge to excel in cost management and drive business performance. Topics include cost accounting fundamentals, cost classification and behavior, material and labor costing, overhead allocation, job and process costing, standard costing and variance analysis, budgeting and marginal costing, and decision-making techniques. The terms ‘costing’ and ‘cost accounting’ are many times used
interchangeably. However, the scope of cost accounting is broader than that
of costing. Following functional activities are included in the scope of cost
accounting:
1. Cost book-keeping: It involves maintaining complete record of all costs
incurred from their incurrence to their charge to departments, products
and services. Such recording is preferably done on the basis of double
entry system.
2. Cost system: Systems and procedures are devised for proper accounting
for costs.
3. Cost ascertainment: Ascertaining cost of products, processes, jobs,
services, etc., is the important function of cost accounting. Cost
ascertainment becomes the basis of managerial decision making such
as pricing, planning and control.
4. Cost Analysis: It involves the process of finding out the causal factors
of actual costs varying from the budgeted costs and fixation of
responsibility for cost increases.Objectives of cost accounting
There is a relationship among information needs of management, cost
accounting objectives, and techniques and tools used for analysis in cost
accounting. Cost accounting has the following main objectives to serve:
1. Determining selling price,
2. Controlling cost
3. Providing information for decision-making
4. Ascertaining costing profit
5. Facilitating preparation of financial and other statements.  LIMITATIONS OF COST ACCOUNTING
Like other branches of accounting, cost accounting is not an exact science
but is an art which has developed through theories and accounting practices
based on reasoning and common sense. These practices are not static but
changing with time. Cost accounting lacks a uniform procedure. There is
no stereotyped system of cost accounting applicable to all industries. There
are widely recognised cost concepts but understood and applied differently
by different industries. Cost accounting can be used only by big enterprises.
The limitations of cost accounting are as follows:
 It is expensive because analysis, allocation and absorption of overheads
require considerable amount of additional work.
 The results shown by cost accounts differ from those shown by financial
accounts. Preparation of reconciliation statements frequently is necessary
to verify their accuracy. This leads to unnecessary increase in workload.',
                'image' => 'cost.jpg',
                'price' => 249,
                'duration' => '8 weeks',
                'level' => 'Intermediate',
                'modules' => [
                    'Cost Accounting Fundamentals',
                    'Cost Classification and Behavior',
                    'Material and Labor Costing',
                    'Overhead Allocation',
                    'Job and Process Costing',
                    'Standard Costing and Variance Analysis',
                    'Budgeting and Marginal Costing',
                    'Decision Making Techniques'
                ]
            ]
        ];

        // Get course by ID or default to first course
        $course = (object)($courses[$id] ?? $courses[1]);

        // Get related courses (exclude current)
        $relatedCourses = array_filter($courses, function($key) use ($id) {
            return $key != $id;
        }, ARRAY_FILTER_USE_KEY);
        
        $relatedCourses = array_slice($relatedCourses, 0, 3);

        return view('front.coursedetails', compact('course', 'relatedCourses'));
    }
    
}
