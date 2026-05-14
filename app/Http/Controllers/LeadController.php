<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lead::query();

        // if ($request->status) {
        //     $query->where('status', $request->status);
        // }
        // Status Filter
    if ($request->lead_status) {

        if ($request->lead_status == 'converted') {
            $query->where('lead_status', 'Converted');
        }

        elseif ($request->lead_status == 'Follow-up') {
            $query->where('lead_status', 'Follow-up');
        }

        elseif ($request->lead_status == 'lost') {
            $query->where('lead_status', 'Lost');
        }
    }


        $leads = $query->latest()->paginate(5);


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
    // live search
    public function search(Request $request)
    {
        $search = $request->search;

       $leads = Lead::where('full_name', 'LIKE', '%' . $search . '%')
    ->orWhere('email', 'LIKE', '%' . $search . '%')
    ->get();

        return view('leads.search', compact('leads'))->render();
    }
    
    // Filter Leads by Status
    public function filter(Request $request)
    {
        $status = $request->status;

       if($status == '')
    {
        $leads = Lead::latest()->paginate(3);
    }
    else
    {
        $leads = Lead::where('lead_status', $status)->get();
    }

    return view('leads.search', compact('leads'))->render();
    }

// status update
    public function statusUpdate(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->lead_status = $request->status;

        $lead->save();

        return response()->json([
            'success' => true
        ]);
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