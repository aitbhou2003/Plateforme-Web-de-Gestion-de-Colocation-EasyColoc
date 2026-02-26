<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollocationRequest;
use App\Models\Collocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CollocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->collocations->isEmpty()) {
            return redirect()->route('collocation.create')
                ->with('message', "tu aucuns de collocation cree une");
        }

        $collocation = $user->collocations()
            ->with(['users' => function ($query) {
                // Eager load user details if needed
                $query->select('users.id', 'firstname', 'lastname', 'email');
            }])
            ->first();
        // dd($collocation);

        return view('collocation.show-collocation', compact('collocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::user()->check_collocation()) {
            return redirect()->route('collocation.index')
                ->with('info', 'Vous avez déjà une collocation.');
        }


        return view('collocation.creat-collocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollocationRequest $request)
    {
        $validate = $request->validated();
        Collocation::create([
            'titre' => $validate['titre'],
            'description' => $validate['description']
        ])->user()->attach(Auth::user(), ['is_owner' => 1]);

        return Redirect::route('collocation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collocation $collocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collocation $collocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collocation $collocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collocation $collocation)
    {
        //
    }
}
