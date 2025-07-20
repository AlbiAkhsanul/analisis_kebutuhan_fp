<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $user = auth()->user();
        // Cek apakah ada keyword pencarian
        if ($keyword) {
            $partners = Partner::query()
                ->where(function ($query) use ($keyword) {
                    $query->where('nama_partner', 'like', "%{$keyword}%")
                        ->orWhere('email_partner', 'like', "%{$keyword}%")
                        ->orWhere('alamat', 'like', "%{$keyword}%")
                        ->orWhere('deskripsi', 'like', "%{$keyword}%")
                        ->orWhere('no_telfon', 'like', "%{$keyword}%");
                })
                ->paginate(10)
                ->appends(['search' => $keyword]);
        } else {
            $partners = Partner::paginate(10);
        }

        return view('partners.index', compact('partners', 'user', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('partners.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_partner' => 'required|string|max:255',
            'email_partner' => 'required|string|max:255',
            'no_telfon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1024',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($validatedData); 

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partnerLogos', 'public');
            $validatedData['logo'] = $logoPath;
        }

        Partner::create($validatedData);

        return redirect()->route('partners.index')->with('success', 'Succesfully Added A New Partner!');
    }

    // test github

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        $partner->loadMissing(['projects']);
        $user = auth()->user();
        return view('partners.show', compact('partner', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $partner->loadMissing(['projects']);
        $user = auth()->user();
        return view('partners.edit', compact('partner', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validatedData = $request->validate([
            'nama_partner' => 'required|string|max:255',
            'email_partner' => 'required|string|max:255',
            'no_telfon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1024',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Menghapus logo lama jika ada
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }

            // Menyimpan logo baru
            $logoPath = $request->file('logo')->store('partnerLogos', 'public');
            $validatedData['logo'] = $logoPath;
        }

        $partner->update($validatedData);

        return redirect()->route('partners.index')->with('success', 'Successfully Updated A Partner!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Successfully Deleted A Partner!');
    }
}
