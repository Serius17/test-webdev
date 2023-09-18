<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required',
            'deskripsi' => 'required',
        ]);

        $project = new Project([
            'id_project' => uniqid(), // Anda dapat menggunakan uniqid atau metode lain untuk menghasilkan ID
            'nama_project' => $request->get('nama_project'),
            'deskripsi' => $request->get('deskripsi'),
        ]);

        $project->save();
        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function show($id_project)
    {
        $project = Project::find($id_project)
            ->with('relasi', function ($query) {
                $query->with('user')->where('id_user', 'id_user');
            })
            ->where('id_project', $id_project);
        return view('project.show', compact('project'));
    }

    public function edit($id_project)
    {
        $project = Project::find($id_project);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id_project)
    {
        $request->validate([
            'nama_project' => 'required',
            'deskripsi' => 'required',
        ]);

        $project = Project::find($id_project);
        $project->nama_project = $request->get('nama_project');
        $project->deskripsi = $request->get('deskripsi');
        $project->save();
        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy($id_project)
    {
        $project = Project::find($id_project);
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Data Project Berhasil Dihapus');
    }
}
