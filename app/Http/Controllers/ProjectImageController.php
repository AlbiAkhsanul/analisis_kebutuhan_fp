<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
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
            'file_foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file_foto')) {
            $fotoPath = $request->file('file_foto')->store('public/projectImages');
            $validatedData['file_foto'] = $fotoPath;
        }

        ProjectImage::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Successfully Added A New Project Image!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectImage $projectImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectImage $projectImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectImage $projectImage)
    {
        if ($projectImage->file_foto) {
            Storage::delete($projectImage->file_foto);
        }

        $projectImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully Deleted A Project Image!',
        ]);
    }
}
