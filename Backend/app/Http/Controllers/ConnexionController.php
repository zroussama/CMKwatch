<?php

namespace App\Http\Controllers;

use App\Models\Connexion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Connexion::latest()->paginate(5);
    
        return view('connexions.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('connexions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'TYPE_HEBERGEMENT' => 'required',
            'PROMISE_CASE' => 'required',
           
        ]);

        //$request->getLink([
        //    'link' => 'name'+'domain'+":"+'port'
        //])


    
        Connexion::create($request->all());
     
        return redirect()->route('connexions.index')
                        ->with('success','Connexion created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Connexion  $connexion
     * @return \Illuminate\Http\Response
     */
    public function show(Connexion $connexion)
    {
        return view('connexions.show',compact('connexion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Connexion  $connexion
     * @return \Illuminate\Http\Response
     */
    public function edit(Connexion $connexion)
    {
        return view('connexions.edit',compact('connexion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Connexion  $connexion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Connexion $connexion)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $connexion->update($request->all());
    
        return redirect()->route('connexions.index')
                        ->with('success','Connexion updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Connexion  $connexion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connexion $connexion)
    {
        $connexion->delete();
    
        return redirect()->route('connections.index')
                        ->with('success','connexion deleted successfully');

    }
}
