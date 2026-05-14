<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    public function index()
{
    $totalLeads = Lead::count();

    $convertedLeads = Lead::where('lead_status', 'converted')->count();

    $followUpLeads = Lead::where('lead_status', 'Follow-up')->count();

    $lostLeads = Lead::where('lead_status', 'lost')->count();

    return view('dashboard', compact(
        'totalLeads',
        'convertedLeads',
        'followUpLeads',
        'lostLeads'
    ));
}
}
