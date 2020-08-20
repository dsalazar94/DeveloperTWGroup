<?php

namespace App\Http\Controllers;

use App\comment;
use App\userXcomment;
use Illuminate\Http\Request;
use DB;
use Mail;

class CommentController extends Controller
{
    public function openAddComment($id_publication, $id_user){

        $selectUserComment = DB::table('user_xcomments')->where([
            ["publication_id","=",$id_publication],
            ["user_id","=",$id_user],
        ])
        ->get();

        if($selectUserComment->count()){
            return view('noComment');
        }
        else{
            return view('newComment',compact('id_publication'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_publication)
    {
        $selectComments = DB::table('comments')->where([
            ["publication_id","=",$id_publication],
        ])
        ->orderBy('content', 'desc')
        ->get();

        return view('comments',compact('selectComments', 'id_publication'));
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
            'publication_id' => 'required|digits_between:0,19',
            'content' => 'required|string',
            'status' => 'required|between:0,1',
        ]);

        $arrUserXComment = [
            'user_id' => $request['user_id'],
            'publication_id' => $request['publication_id'],
        ];

        $arrComment = [
            'publication_id' => $request['publication_id'],
            'content' => $request['content'],
            'status' => $request['status'],
        ];

        //$this->sendEmail($request);

        userXcomment::create($arrUserXComment);

        comment::create($arrComment);

        return redirect()->intended('principal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id_comment)
    {
        return comment::find($id_comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_comment)
    {
        $request->validate([
            'publication_id' => 'required|digits_between:0,19',
            'content' => 'required|string',
            'status' => 'required|between:0,1',
        ]);

        $comment = comment::findOrFail($id_comment);
        $comment ->update($request->all());

        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_comment)
    {
        $comment = comment::findOrFail($id_comment);
        $comment->delete();

        return 204;
    }

    public function sendEmail(Request $request){

        $selectMail = DB::table('users')
        ->select('email')
        ->where([
            ["id","=",$request['user_id']],
        ])
        ->get();

        $subject = "Nuevo comentario";

        Mail::send('email',$request->all(), function($msj) use($subject,$selectMail){
            $msj->from("dantesalazar94@gmail.com","DeveloperTWGroup");
            $msj->subject($subject);
            $msj->to($selectMail);
        });
        return redirect()->back();
    }
}
