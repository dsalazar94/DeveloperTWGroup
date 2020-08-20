<?php

namespace App\Http\Controllers;

use App\publication;
use Illuminate\Http\Request;
use DB;

class PublicationController extends Controller
{
    public function openAddPublication(){
        return view('newPublication');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectPublication =  DB::table('publications')->get();

        return view('principal',compact('selectPublication'));
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
            'user_id' => 'required|digits_between:0,19',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $retorno = publication::create($request->all());

        return redirect()->intended('principal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show($id_publication)
    {
        return publication::find($id_publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_publication)
    {
        $request->validate([
            'user_id' => 'required|digits_between:0,19',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $publication = publication::findOrFail($id_publication);
        $publication ->update($request->all());

        return $publication;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_publication)
    {
        $publication = publication::findOrFail($id_publication);
        $publication->delete();

        return 204;
    }

    public function getPublications(){
        $selectPublications = DB::table('publications')
        ->join('comments', 'comments.publication_id', '=', 'publications.id')
        ->select('publications.title', 'publications.content')
        ->where([
            ["comments.content", 'LIKE', '%'."Hola".'%'],
            ["comments.status","=",0],
        ])
        ->orderBy('publications.title', 'desc')
        ->get();
        return $selectPublications;
    }
}
