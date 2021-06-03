<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
 
class UserController extends Controller
{

    public function index()
    {
        $post = Users::all();
        return response(json_encode($post));
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $post = new Users;
        $post -> role = $request->input('role');
        $post -> pin =  $request->input('pin');
        $post -> name = $request->input('name');
      
        if( $post->save())
        {
            return response(json_encode($post));
        }
    }

 
    public function show($id)
    {
        $post= Users::findOrFail($id);
        return response(json_encode($post));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $post =Users::find($id);
        print_r($request->all());
        $post->role = $request->role;
        $post->pin =  $request->pin;
        $post->name = $request->name;
        print_r($post->save());
      
        if(  $post->save())
        {
            return response(json_encode($post));
        }
    }


    public function destroy($id)
    {
        $post = Users::findOrFail($id);
        if($post->delete())
        {
            return response($post);
        }
         
    }
}
