<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
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
            'tanggal_surat' => 'required|string|max:255',
            'file_surat' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $letterPath = $request->file('file_surat')->store('public/projectLetters');
            $validatedData['file_surat'] = $letterPath;
        }

        Letter::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Successfully Added A New Letter!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Letter $letter)
    {
        if ($letter->file_surat) {
            Storage::delete($letter->file_surat);
        }

        $letter->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully Deleted A Letter!',
        ]);
    }
}
