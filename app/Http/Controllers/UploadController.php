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

        if(!empty($request->text)){
            $document->name = $request->name;
            $document->user_id = $request->user()->id;
            $document->text = $request->text;

            if(isset($request->id)){
                $document->id = $request->id;
            }

            $document->updateOrCreate(['id' => $document->id], $document->toArray());
            return redirect('dashboard');
        }

        //Upload do arquivo
        if($request->hasFile('name') && $request->file('name')->isValid()) {

            $requestArquivo = $request->name;

            $nomeArquivo = $requestArquivo->getClientOriginalName();

            $requestArquivo->move(public_path($request->user()->id), $nomeArquivo);

            $document->name = $nomeArquivo;

        }

        $document->user_id = $request->user()->id;

        $document->text = null;

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
