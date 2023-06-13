<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('share');
    }

    public function get_names(Request $request) {

        if($request == null){
            die;
        }

        $users = User::all();

        return view('share', ['dados' => $users]);

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
    public function show(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Share $share)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Share $share)
    {
        //
    }
}
