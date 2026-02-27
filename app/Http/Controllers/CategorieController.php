<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = Auth::user();
        if ($user->check_collocation()) {
            return redirect()->route('collocation.create');
        }

        $collocation = $user->collocations()->first();
        $isOwner = $user->isOwnerOf($collocation);
        $categories = $collocation->categories()->get();
        return view('categories.index', compact(
            'collocation',
            'categories',
            'isOwner'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user->check_collocation()){
            return redirect()->route('collocation.create');
        }
        $collocation = $user->collocations()->first();
        if(!$user->isOwnerOf($collocation)){
            abort(403,"seulement l'owner est le droit de cree une categorie");
        }

        return view('categories.create',compact('collocation'));
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
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
