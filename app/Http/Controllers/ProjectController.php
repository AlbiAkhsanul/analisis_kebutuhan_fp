<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Partner;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin')->except(['index', 'show', 'exportPdf']);
    }
    /**
     * Menampilkan daftar semua proyek.
     *
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $user = auth()->user();

        // Cek apakah ada keyword pencarian
        if ($keyword) {
            $projects = Project::with('partner')
                ->where(function ($query) use ($keyword) {
                    $query->where('nama_proyek', 'like', "%{$keyword}%")
                        ->orWhere('lokasi', 'like', "%{$keyword}%")
                        ->orWhereHas('partner', function ($partnerQuery) use ($keyword) {
                            $partnerQuery->where('nama_partner', 'like', "%{$keyword}%");
                        });
                })
                ->paginate(10)
                ->appends(['search' => $keyword]);
        } else {
            $projects = Project::with('partner')->paginate(10);
        }

        return view('home', compact('projects', 'user', 'keyword'));
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

        $this->handleAttachments($request, $project);

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

    private function handleAttachments(Request $request, Project $project)
    {
        // ========== UPDATE FILE LAMA ==========
        foreach (
            [
                'foto_lama' => ['model' => \App\Models\ProjectImage::class, 'date_field' => 'tanggal_dokumen'],
                'invoice_lama' => ['model' => \App\Models\Invoice::class, 'date_field' => 'tanggal_dokumen'],
                'surat_lama' => ['model' => \App\Models\Letter::class, 'date_field' => 'tanggal_dokumen'],
            ] as $key => $config
        ) {
            if ($request->has($key)) {
                foreach ($request->input($key) as $id => $data) {
                    $record = $config['model']::find($id);
                    if ($record && $record->project_id == $project->id) {
                        $record->update([
                            $config['date_field'] => $data['date'],
                        ]);
                    }
                }
            }
        }

        // ========== HAPUS FILE LAMA ==========
        foreach (
            [
                'hapus_foto_lama' => \App\Models\ProjectImage::class,
                'hapus_invoice_lama' => \App\Models\Invoice::class,
                'hapus_surat_lama' => \App\Models\Letter::class,
            ] as $key => $model
        ) {
            if ($request->filled($key)) {
                $ids = $request->input($key);

                if (is_string($ids)) {
                    $ids = explode(',', $ids);
                }

                $ids = array_filter($ids, fn($id) => !is_null($id) && $id !== '');
                // var_dump("Processing $key", $ids);

                if (count($ids) > 0) {
                    $items = $model::whereIn('id', $ids)->get();
                    foreach ($items as $item) {
                        if ($item->file_dokumen && Storage::disk('public')->exists($item->file_dokumen)) {
                            Storage::disk('public')->delete($item->file_dokumen);
                        }
                    }
                    // $deletedCount = $model::whereIn('id', $ids)->delete();
                    // var_dump("Deleted from $key: ", $deletedCount);
                }
            }
        }

        // ========== TAMBAH FILE BARU ==========
        foreach (['foto' => 'projectImages', 'invoice' => 'projectInvoices', 'surat' => 'projectLetters'] as $key => $folder) {
            if ($request->has($key)) {
                foreach ($request->file($key) as $index => $fileData) {
                    $file = $fileData['file'];
                    $date = $request->input("{$key}.{$index}.date");
                    $filename = uniqid() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs($folder, $filename, 'public');

                    $relation = match ($key) {
                        'foto' => 'images',
                        'invoice' => 'invoices',
                        'surat' => 'letters',
                    };

                    $project->{$relation}()->create([
                        'file_dokumen' => $path,
                        'tanggal_dokumen' => $date,
                    ]);
                }
            }
        }
    }

    public function exportPdf()
    {
        $projects = Project::with('partner')->get();

        $pdf = pdf::loadView('projects.report', compact('projects'));

        return $pdf->download('laporan_proyek.pdf');
    }
}
