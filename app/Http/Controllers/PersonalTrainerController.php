<?php

namespace App\Http\Controllers;

use App\Models\PersonalTrainer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PersonalTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $trainers = PersonalTrainer::all(); 
        return view('trainers.index', ['trainers' => $trainers]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_trainer' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_per_sesi' => 'required|integer|min:0',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        PersonalTrainer::create($validated);

        return redirect(route('trainers.index'))->with('status', 'Data trainer berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalTrainer $personalTrainer)
    {
        // (Kita akan isi ini nanti)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $trainer = PersonalTrainer::findOrFail($id); 
        return view('trainers.edit', [
            'trainer' => $trainer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $personalTrainer = PersonalTrainer::findOrFail($id);
        $validated = $request->validate([
            'nama_trainer' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_per_sesi' => 'required|integer|min:0',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);
        $personalTrainer->update($validated);
        return redirect(route('trainers.index'))->with('status', 'Data trainer berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // v-- [BARU] KITA ISI BAGIAN INI --v
    public function destroy($id): RedirectResponse
    {
        // Cari data trainer berdasarkan ID
        $personalTrainer = PersonalTrainer::findOrFail($id);
        
        // Hapus data dari database
        $personalTrainer->delete();
        
        // Redirect kembali ke halaman index with pesan sukses
        return redirect(route('trainers.index'))->with('status', 'Data trainer berhasil dihapus!');
    }
}