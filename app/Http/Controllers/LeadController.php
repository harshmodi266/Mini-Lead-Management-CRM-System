<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::latest()->get();

        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'full_name' => 'required',

            'email' => 'required|email',

            'mobile_number' => 'required',

            'lead_source' => 'required',

            'lead_status' => 'required',

        ]);

        Lead::create($request->all());

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'full_name' => 'required',

            'email' => 'required|email',

            'mobile_number' => 'required',

            'lead_source' => 'required',

            'lead_status' => 'required',

        ]);

        $lead = Lead::findOrFail($id);

        $lead->update($request->all());

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead Updated Successfully');
    }

    public function search(Request $request)
    {
        $search = $request->search;

       $leads = Lead::where('full_name', 'LIKE', '%' . $search . '%')
    ->orWhere('email', 'LIKE', '%' . $search . '%')
    ->get();

        return view('leads.search', compact('leads'))->render();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);

        $lead->delete();

        return redirect()
            ->route('leads.index')
            ->with('success', 'Lead Deleted Successfully');
    }

    
}