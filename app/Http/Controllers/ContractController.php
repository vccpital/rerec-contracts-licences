<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'supported_service' => 'required|string',
            'services' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'renewal_reminder_date' => 'required|date|before:end_date',
            'upload_files' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'comment' => 'nullable|string',
        ]);

        try {
            $contract = new Contract();
            $contract->company_name = $request->company_name;
            $contract->supported_service = $request->supported_service;
            $contract->services = $request->services;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->days_remaining = now()->diffInDays($request->end_date);
            $contract->renewal_reminder_date = $request->renewal_reminder_date;
            $contract->upload_files = $request->file('upload_files')->store('contract_files', 'public');
            $contract->status = now()->diffInDays($request->end_date) > 0 ? 'active' : 'expired';
            $contract->comment = $request->comment;
            $contract->save();

            return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating contract: ' . $e->getMessage());
            return redirect()->route('contracts.index')->with('error', 'Failed to create contract.');
        }
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'supported_service' => 'required|string',
            'services' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'renewal_reminder_date' => 'required|date|before:end_date',
            'upload_files' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'comment' => 'nullable|string',
        ]);

        try {
            $contract->company_name = $request->company_name;
            $contract->supported_service = $request->supported_service;
            $contract->services = $request->services;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->days_remaining = now()->diffInDays($request->end_date);
            $contract->renewal_reminder_date = $request->renewal_reminder_date;
            if ($request->hasFile('upload_files')) {
                $contract->upload_files = $request->file('cupload_files')->store('contract_files', 'public');
            }
            $contract->status = now()->diffInDays($request->end_date) > 0 ? 'active' : 'expired';
            $contract->comment = $request->comment;
            $contract->save();

            return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating contract: ' . $e->getMessage());
            return redirect()->route('contracts.index')->with('error', 'Failed to update contract.');
        }
    }

    public function destroy(Contract $contract)
    {
        try {
            $contract->delete();
            return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting contract: ' . $e->getMessage());
            return redirect()->route('contracts.index')->with('error', 'Failed to delete contract.');
        }
    }
    }
