<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Partner;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar semua proyek.
     *
     */
    public function index()
    {
        $projects = Project::with('partner')->get();
        $user = auth()->user();

        // return view('projects.index', compact('projects', 'user'));
        return view('home', compact('projects', 'user')); //Coba memanggil home punya mas farel
    }

    /**
     * Menampilkan form untuk membuat proyek baru.
     *
     */
    public function create()
    {
        $user = auth()->user();
        $partners = Partner::all();
        $types = ProjectType::all();
        return view('projects.create', compact('user', 'partners', 'types'));
    }

    /**
     * Menyimpan proyek baru.
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();

        $project = Project::create($validatedData);

        $project->types()->sync($validatedData['jenis_proyek']);

        return redirect()->route('projects.index')->with('success', 'Succesfully Added A New Project!');
    }

    /**
     * Menampilkan detail proyek berdasarkan ID.
     *
     */
    public function show(Project $project)
    {
        $user = auth()->user();
        $project->loadMissing(['partner', 'types', 'invoices', 'letters', 'images']);
        return view('projects.show', compact('project', 'user'));
    }

    /**
     * Menampilkan form untuk mengedit proyek.
     *
     */
    public function edit(Project $project)
    {
        $user = auth()->user();
        $partners = Partner::all();
        $projectTypes = ProjectType::all();
        $project->loadMissing(['partner', 'types', 'invoices', 'letters', 'images']);
        return view('projects.edit', compact('project', 'user', 'partners', 'projectTypes'));
    }

    /**
     * Memperbarui data proyek.
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $project->update($validatedData);

        $project->types()->sync($validatedData['jenis_proyek']);

        return redirect('projects.index')->with('success', 'Succesfully Updated A Project!');
    }

    /**
     * Menghapus proyek berdasarkan ID.
     *
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('projects.index')->with('success', 'Succesfully Deleted A Project!');
    }
}
