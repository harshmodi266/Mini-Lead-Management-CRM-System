<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
class LeadApiController extends Controller
{
 // GET API
    public function index()
    {
        $leads = Lead::latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'Lead list fetched successfully',
            'data' => $leads
        ]);
    }

    // POST API
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'lead_source' => 'required',
            'lead_status' => 'required',
            'notes' => 'nullable'
        ]);

        $lead = Lead::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Lead created successfully',
            'data' => $lead
        ], 201);
    }
}