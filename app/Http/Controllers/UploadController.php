<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $document = new Document;
        $document->arquivo = $request->arquivo;

        //Upload do arquivo
        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {

            $requestArquivo = $request->arquivo;

            $extension = $requestArquivo->extension();

            $nomeArquivo = md5($requestArquivo->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestArquivo->move(public_path('/arquivos'), $nomeArquivo);

            $document->arquivo = $nomeArquivo;

        }

        $document->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
