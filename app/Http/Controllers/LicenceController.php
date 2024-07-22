<?php

namespace App\Http\Controllers;
use App\Models\Licence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class LicenceController extends Controller
{
    public function index()
    {
        $licences = Licence::all();
        return view('licences.index', compact('licences'));
    }

    public function create()
    {
        return view('licences.create');
    }

    public function store(Request $request)
    {
        $request->merge(['currency' => $request->input('currency', 'KSH')]);
        $request->validate([
            'software_name' => 'required|string|max:255',
            'vendor_name' => 'required|string|max:255',
            'licence_type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'supported_service' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'upload_files' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'comment' => 'nullable|string', 
            'currency' => 'nullable|string|in:KSH,USD,EUR,GBP',
    ]);
    
        $licence = new Licence();
        $licence->software_name = $request->software_name;
        $licence->vendor_name = $request->vendor_name;
        $licence->licence_type = $request->licence_type;
        $licence->cost = $request->cost;
        $licence->supported_service = $request->supported_service;
        $licence->start_date = $request->start_date;
        $licence->end_date = $request->end_date;
        $licence->days_remaining = now()->diffInDays($request->end_date);
        $licence->status = now()->diffInDays($request->end_date) > 0 ? 'active' : 'expired';
        $licence->currency = $request->currency ?? 'KSH';
        if ($request->hasFile('upload_files')) {
            $licence->upload_files = $request->file('upload_files')->store('licence_files', 'public');
        }
        $licence->comment = $request->comment;
        $licence->save();
    
        return redirect()->route('licences.index')->with('success', 'Licence created successfully.');
    }

    public function show(Licence $licence)
    {
        return view('licences.show', compact('licence'));
    }

    public function edit(Licence $licence)
    {
        return view('licences.edit', compact('licence'));
    }

    public function update(Request $request, Licence $licence)
    {
        $request->validate([
            'software_name' => 'required|string|max:255',
            'vendor_name' => 'required|string|max:255',
            'licence_type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'supported_service' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'upload_files' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'comment' => 'nullable|string',
            'currency' => 'nullable|string|in:KSH,USD,EUR,GBP', // removed '|default:KSH'
        ]);
    
        // Update the licence using the validated data
        $licence->update($request->all());
    
        return redirect()->route('licences.index')
                         ->with('success', 'Licence updated successfully');
    }

    public function destroy(Licence $licence)
    {
        try {
            $licence->delete();
            return redirect()->route('licences.index')->with('success', 'Licence deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting licence: ' . $e->getMessage());
            return redirect()->route('licences.index')->with('error', 'Failed to delete licence.');
        }
    }
}
