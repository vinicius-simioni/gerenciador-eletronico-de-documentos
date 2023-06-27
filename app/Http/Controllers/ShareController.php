<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareRequest;
use App\Models\Document;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('share', ['document_id' => $id]);
    }

    public function get_names(ShareRequest $request)
    {

        $name = $request->input('name');
        $users = User::select('id', 'name', 'email')
            ->where('name', 'like', '%' . $name . '%')
            ->where('id', '!=', auth()->user()->id)
            ->get();

        return view('share', ['dados' => $users, 'document_id' => $request->document_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $share = new Share;

        $share->document_id = $request->document_id;
        $share->shared_user_id = $request->shared_user_id;
        $share->read = $request->read;
        $share->edit = $request->edit;
        $share->delete = $request->delete;

        $share->save();
        return redirect()->route('dashboard')->with('success', 'Compartilhado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para visualizar
        if (!$docCompartilhado->read) {
            $errors = new MessageBag(['erro1' => 'Você não possui permissão para ler!']);
            return redirect('dashboard/shared')->withErrors($errors);
        }

        $file = Document::buscaDocumento($docCompartilhado->document_id);

        if (!empty($file->text)) {
            return view('rtf')->with('text', $file->text);
        }

        return response()->file(public_path($file->user_id . "/" . $file->name));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para editar
        if (!$docCompartilhado->edit) {
            $errors = new MessageBag(['erro1' => 'Você não possui permissão para editar!']);
            return redirect('dashboard/shared')->withErrors($errors);
        }

        $document = Document::buscaDocumento($docCompartilhado->document_id);
        if (!empty($document->text)) {
            return view('editor')->with('document', $document);
        }
        $errors = new MessageBag(['erro1' => 'Você não pode editar esse formato de arquivo!']);
        return redirect('dashboard/shared')->withErrors($errors);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para deletar
        if (!$docCompartilhado->delete) {
            $errors = new MessageBag(['erro1' => 'Você não possui permissão para excluir!']);
            return redirect('dashboard/shared')->withErrors($errors);
        }

        $document = new Document();
        $docCompartilhado = $document->find($docCompartilhado->document_id);

        return redirect()->route('dashboard/destroy', ['id' => $docCompartilhado->id, 'name' => $docCompartilhado->name]);
    }

    public function shareDelete(string $id)
    {
        $share = Share::find($id);

        if ($share) {
            $share->delete();
        }

        return redirect()->route('sharedWith')->with('success', 'Compartilhamento removido com sucesso!');
    }

    public function shareDeleteUser(string $id)
    {
        $share = Share::find($id);

        if ($share) {
            $share->delete();
        }

        return redirect()->route('dashboard/shared')->with('success', 'Compartilhamento removido com sucesso!');
    }
}
