<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_invoice' => 'required|string|max:255',
            'file_invoice' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file_invoice')) {
            $invoicePath = $request->file('file_invoice')->store('public/projectInvoices');
            $validatedData['file_invoice'] = $invoicePath;
        }

        Invoice::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Successfully Added A New Invoice!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        if ($invoice->file_invoice) {
            Storage::delete($invoice->file_invoice);
        }

        $invoice->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully Deleted An Invoice!',
        ]);
    }
}
