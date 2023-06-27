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
        //Upload do arquivo
        if ($request->hasFile('name') && $request->file('name')->isValid()) {

            $request->validate([
                'name' => 'required|mimes:pdf,doc,docx',
            ]);

            $requestArquivo = $request->name;

            $nomeArquivo = $requestArquivo->getClientOriginalName();

            $requestArquivo->move(public_path($request->user()->id), $nomeArquivo);

            $document->name = $nomeArquivo;

            if (empty($document->user_id)) {
                $document->user_id = $request->user()->id;
            }

            $document->text = null;

            $document->save();

            return redirect('dashboard')->with('success', 'Salvo com sucesso!');
        }

        //se chegar aqui, não é um arquivo
        $request->validate([
            'name' => 'required',
        ]);

        if (!empty($request->text)) {

            if (!empty($request->id)) {
                $document = $document::buscaDocumento($request->id);
            }

            $request->validate([
                'name' => 'required',
            ]);

            $document->name = $request->name;

            if (empty($document->user_id)) {
                $document->user_id = $request->user()->id;
            }

            $document->text = $request->text;

            if (isset($request->id)) {
                $document->id = $request->id;
            }

            $existsId = $document->id;

            $document->updateOrCreate(['id' => $document->id], $document->toArray());

            if($document->user_id != auth()->user()->id){
                return redirect('dashboard/shared')->with('success', 'Salvo com sucesso!');
            }

            return redirect('dashboard')->with('success', 'Salvo com sucesso!');
        }
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
