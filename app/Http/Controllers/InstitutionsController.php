<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionDeleteRequest;
use App\Http\Requests\InstitutionEditRequest;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('institution.index', [
            'institutions' => Institution::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institution.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstitutionCreateRequest $request)
    {
        $data = $request->validated();

        $institution = Institution::create($data);

        return redirect()->route('institutions.index')->with('success', 'Instituição cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $institution = Institution::findOrFail($id);

        return view('institution.edit', [
            'institution' => $institution
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstitutionEditRequest $request, string $id)
    {
        //
        $data = $request->validated();

        $institution = Institution::findOrFail($id);

        $institution->update($data);

        return redirect()->route('institutions.index')->with('success', 'Instituição atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstitutionDeleteRequest $request, string $id)
    {
        $institution = Institution::findOrFail($id);

        $institution->delete();

        return redirect()->route('institutions.index')->with('success', 'Instituição excluída com sucesso!');
    }
}
