<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DepartementController extends Controller
{
    public function index()
    {
        $departement = Departement::paginate(10);

        return view('departement.index', compact('departement'));
    }

    public function create()
    {
        return view('departement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departement' => 'required',
            'deskripsi' => 'required',
        ]);

        $departement = new Departement([
            'id_departement' => uniqid(), // Anda dapat menggunakan uniqid atau metode lain untuk menghasilkan ID
            'nama_departement' => $request->get('nama_departement'),
            'deskripsi' => $request->get('deskripsi'),
        ]);

        $departement->save();

        return redirect()->route('departement.index')
            ->with('success', 'Departement berhasil ditambahkan.');
    }

    public function edit($id_departement)
    {
        $departement = Departement::find($id_departement);
        return view('departement.edit', compact('departement'));
    }

    public function update(Request $request, $id_departement)
    {
        $request->validate([
            'nama_departement' => 'required',
            'deskripsi' => 'required',
        ]);

        $departement = Departement::find($id_departement);
        $departement->nama_departement = $request->get('nama_departement');
        $departement->deskripsi = $request->get('deskripsi');
        $departement->save();

        return redirect()->route('departement.index')
            ->with('success', 'Departement berhasil diperbarui.');
    }

    public function show($id_departement)
    {
        $departement = Departement::find($id_departement);

        return view('departement.show', compact('departement'));
    }

    public function destroy($id_departement)
    {
        $departement = Departement::find($id_departement);
        dd($departement);
        $departement->delete();
        return redirect()->route('departement.index')->with('success', 'Data Departement Berhasil Dihapus');
    }
}
