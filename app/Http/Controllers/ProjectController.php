<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Partner;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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

        // dd($validatedData);

        // Simpan data proyek
        $project = Project::create($validatedData);

        // Simpan relasi jenis proyek
        $project->types()->sync($validatedData['jenis_proyek']);

        foreach (['invoice' => 'projectInvoices', 'surat' => 'projectLetters', 'foto' => 'projectImages'] as $key => $folder) {
            if ($request->has($key)) {
                foreach ($request->file($key) as $index => $fileData) {
                    $file = $fileData['file'];
                    $date = $request->input("{$key}.{$index}.date");
                    $filename = uniqid() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs($folder, $filename, 'public');

                    $relation = match ($key) {
                        'invoice' => 'invoices',
                        'surat' => 'letters',
                        'foto' => 'images',
                    };

                    $project->{$relation}()->create([
                        'file_dokumen' => $path,
                        'tanggal_dokumen' => $date,
                    ]);
                }
            }
        }

        return redirect('/projects')->with('success', 'Succesfully Added A Project!');
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

        return redirect('/projects')->with('success', 'Succesfully Added A Project!');
    }

    /**
     * Menghapus proyek berdasarkan ID.
     *
     */
    public function destroy(Project $project)
    {
        // Hapus file dari relasi: invoices, letters, images
        foreach (['invoices', 'letters', 'images'] as $relation) {
            foreach ($project->$relation as $fileEntry) {
                if ($fileEntry->file_dokumen && Storage::disk('public')->exists($fileEntry->file_dokumen)) {
                    Storage::disk('public')->delete($fileEntry->file_dokumen);
                }
                $fileEntry->delete(); // Hapus data dari database juga
            }
        }

        // Hapus proyek
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Successfully Deleted A Project!');
    }
}
