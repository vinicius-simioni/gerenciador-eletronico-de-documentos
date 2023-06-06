<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new Event;

        $news->titulo = $request->titulo;
        $news->descricao = $request->descricao;
        $news->imagem = $request->imagem;
        $news->autor = $request->autor;

        //Upload da imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $nomeImagem = md5($requestImagem->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImagem->move(public_path('img/news'), $nomeImagem);

            $news->imagem = $nomeImagem;

        }

        $news->save();

        return redirect('/news/create')->with('msg', 'Notícia cadastrada com sucesso');
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
