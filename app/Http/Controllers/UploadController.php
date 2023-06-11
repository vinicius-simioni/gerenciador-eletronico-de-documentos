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

            $nomeArquivo = $requestArquivo->getClientOriginalName();

            $requestArquivo->move(public_path($request->user()->id), $nomeArquivo);

            $document->arquivo = $nomeArquivo;

        }

        $document->user_id = $request->user()->id;

        $document->save();

        return redirect('dashboard');

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
