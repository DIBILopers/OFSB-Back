<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Users::all();
        return response(json_encode($post));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Users;
        $post -> id =   $request->input('id');
        $post -> role = $request->input('role');
        $post -> pin =  $request->input('pin');
        $post -> name = $request->input('name');
      
        if(  $post->save())
        {
            return response(json_encode($post));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Users::findOrFail($id);
        return response(json_encode($post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post =Users::findOrFail($request->id);
   
        $post -> id =   $request->input('id');
        $post -> role = $request->input('role');
        $post -> pin =  $request->input('pin');
        $post -> name = $request->input('name');
      
        if(  $post->save())
        {
            return response(json_encode($post));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Users::findOrFail($id);
        if($post->delete())
        {
            return response($post);
        }
         
    }
}
