<?php

namespace App\Http\Controllers;

use App\userXcomment;
use Illuminate\Http\Request;

class UserXcommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_publication, $id_user)
    {
        $selectUserComment = DB::table('user_xcomments')->where([
            ["publication_id","=",$id_publication],
            ["user_id","=",$id_user],
        ])
        ->get();

        return $selectUserComment;
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
            'publication_id' => 'required|digits_between:0,19',
            'user_id' => 'required|digits_between:0,19',
        ]);

        $retorno = userXcomment::create($request->all());

        return $retorno;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userXcomment  $userXcomment
     * @return \Illuminate\Http\Response
     */
    public function show($userXcomment)
    {
        return userXcomment::find($userXcomment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userXcomment  $userXcomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userXcomment)
    {
        $request->validate([
            'publication_id' => 'required|digits_between:0,19',
            'user_id' => 'required|digits_between:0,19',
        ]);

        $usXcommt = userXcomment::findOrFail($userXcomment);
        $usXcommt ->update($request->all());

        return $usXcommt;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userXcomment  $userXcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy($userXcomment)
    {
        $usXcommt = userXcomment::findOrFail($userXcomment);
        $usXcommt->delete();

        return 204;
    }
}
