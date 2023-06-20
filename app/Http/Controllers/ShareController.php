<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareRequest;
use App\Models\Document;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('share', ['document_id' => $id]);
    }

    public function get_names(ShareRequest $request) {

        $name = $request->input('name');
        $users = User::select('id', 'name', 'email')
        ->where('name', 'like', '%' . $name . '%')
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
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para deletar
        if(!$docCompartilhado->delete){
            return redirect('dashboard_shared');
        }

        $file = Document::buscaDocumento($docCompartilhado->document_id);

        if(!empty($file->text)){
            return view('rtf')->with('text', $file->text);
        }

        return response()->file(public_path(auth()->user()->id."/".$file->name));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para deletar
        if(!$docCompartilhado->edit){
            return redirect('dashboard_shared');
        }

        $document = Document::buscaDocumento($docCompartilhado->document_id);
        return view('editor')->with('document', $document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $share = new Share();
        $docCompartilhado = $share->find($request->id);

        //se não tiver permissão para deletar
        if(!$docCompartilhado->delete){
            return redirect('dashboars_shared');
        }

        $document = new Document();
        $docCompartilhado = $document->find($docCompartilhado->document_id);

        $dashboardController = new DashboardController();
        $dashboardController->destroy($docCompartilhado->id, $docCompartilhado->name);

        return redirect('dashboars_shared');
    }
}
