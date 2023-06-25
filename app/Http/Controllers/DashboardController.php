<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dados = Document::where('user_id', auth()->user()->id)
            ->get(); //seleciona dados banco

        return view('dashboard', ['dados' => $dados]);
    }

    public function shared_index()
    {

        $dados = DB::table('document_shares')
            ->join('documents', 'document_id', '=', 'documents.id')
            ->select('document_shares.id as id_share', '*')
            ->get();

        return view('dashboard_shared', ['dados' => $dados]);
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
    public function destroy(string $id, string $name)
    {

        $document = Document::findOrFail($id);

        $document->delete();

        $caminho = public_path(auth()->user()->id . "/" . $name);

        if (File::exists($caminho)) {
            File::delete($caminho);
        }

        return redirect('dashboard');
    }

    public function return_file(string $id, string $arquivo)
    {

        $file = Document::buscaDocumento($id);

        if (!empty($file->text)) {
            return view('rtf')->with('text', $file->text);
        }

        return response()->file(public_path(auth()->user()->id . "/" . $arquivo));
    }

    public function sharedWith()
    {
        $result = DB::table('documents as d')
            ->select('ds.id', 'd.name as doc_name', 'ds.shared_user_id', 'u.name as user_name', 'ds.read', 'ds.edit', 'ds.delete')
            ->join('document_shares as ds', 'd.id', '=', 'ds.document_id')
            ->join('users as u', 'ds.shared_user_id', '=', 'u.id')
            ->where('d.user_id', '=', auth()->user()->id)
            ->orderBy('ds.id')
            ->get();

        return view('compartilhados')->with('dados', $result);
    }

    public function sharedUpdate(Request $request)
    {
        $dados = $request->except('_token');

        foreach ($dados as $documentId => $permissions) {

            foreach ($permissions as $key => $value) {
                $document = Share::find($key);
                if (isset($document)) {
                    $document->read = isset($value['read']);
                    $document->edit = isset($value['edit']);
                    $document->delete = isset($value['delete']);
                    $document->save();
                }
            }
        }

        $result = DB::table('documents as d')
            ->select('ds.id', 'd.name as doc_name', 'ds.shared_user_id', 'u.name as user_name', 'ds.read', 'ds.edit', 'ds.delete')
            ->join('document_shares as ds', 'd.id', '=', 'ds.document_id')
            ->join('users as u', 'ds.shared_user_id', '=', 'u.id')
            ->where('d.user_id', '=', auth()->user()->id)
            ->orderBy('ds.id')
            ->get();


            return redirect()->route('sharedWith')->with([
                'dados' => $result,
                'success' => 'Mensagem de sucesso!',
            ]);
    }
}
