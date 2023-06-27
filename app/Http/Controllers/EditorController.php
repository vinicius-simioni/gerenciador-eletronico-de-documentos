<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('editor');
    }

    public function edit(string $id)
    {
        $document = Document::buscaDocumento($id);
        if (empty($document->text)) {
            $errors = new MessageBag(['erro1' => 'Você não pode editar esse formato de arquivo!']);
            return redirect('dashboard')->withErrors($errors);
        }
        return view('editor')->with('document', $document);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editor $editor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editor $editor)
    {
        //
    }
}
