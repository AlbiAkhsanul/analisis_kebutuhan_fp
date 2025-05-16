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
        // dd($request);
        $validatedData = $request->validated();

        // Simpan data proyek
        $project = Project::create($validatedData);

        // Simpan relasi jenis proyek
        $project->types()->sync($validatedData['jenis_proyek']);

        // ============================
        // Simpan dokumen tambahan
        // ============================

        // // Invoice
        // if ($request->has('invoice')) {
        //     foreach ($request->file('invoice') as $index => $fileData) {
        //         $file = $fileData['file'];
        //         $date = $request->input("invoice.{$index}.date");

        //         $path = $file->store('projectInvoices');

        //         $project->invoices()->create([
        //             'file_path' => $path,
        //             'date' => $date
        //         ]);
        //     }
        // }

        // // Surat
        // if ($request->has('surat')) {
        //     foreach ($request->file('surat') as $index => $fileData) {
        //         $file = $fileData['file'];
        //         $date = $request->input("surat.{$index}.date");

        //         $path = $file->store('projectLetters');

        //         $project->letters()->create([
        //             'file_path' => $path,
        //             'date' => $date
        //         ]);
        //     }
        // }

        // // Foto
        // if ($request->has('foto')) {
        //     foreach ($request->file('foto') as $index => $fileData) {
        //         $file = $fileData['file'];
        //         $date = $request->input("foto.{$index}.date");

        //         $path = $file->store('projectImages');

        //         $project-images()->create([
        //             'file_path' => $path,
        //             'date' => $date
        //         ]);
        //     }
        // }

        foreach (['invoice' => 'projectInvoices', 'surat' => 'projectLetters', 'foto' => 'projectImages'] as $key => $folder) {
            if ($request->has($key)) {
                foreach ($request->file($key) as $index => $fileData) {
                    $file = $fileData['file'];
                    $date = $request->input("{$key}.{$index}.date");
                    $path = $file->store($folder);

                    $relation = match ($key) {
                        'invoice' => 'invoices',
                        'surat' => 'letters',
                        'foto' => 'images',
                    };

                    $project->{$relation}()->create([
                        'file_path' => $path,
                        'date' => $date,
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'redirect' => route('projects.index')
        ]);
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
        // Hapus proyek
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Successfully Deleted A Project!');
    }
}
