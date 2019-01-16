<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
Use App\Users;


class UserController extends Controller
{


    public function index()
    {
        return Users::all();
    }

    public function show(Request $request)
    {
        $user = User::find( $request->input('id'));
        return  response()->json($user,201);
    }

    public function store(Request $request)
    {
//        $request->offsetSet('api_token', (new Users)->generateToken());

        $is_exist = Users::select('id')->where('email',$request->input("email"), 1)->count();
        if ($is_exist > 0){
            return response()->json("User is exist",406);
        } else {
            $requestData = $request->all();
//            $requestData['api_token'] = strval(rand(1111,9999)) . date("dmy");
            $user = Users::create($requestData);
            return response()->json($user, 201);
        }
    }

    public function update_avatar(Request $request){

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/app/Upload/Image');
            $image->move(public_path() . '/upload/image', $name);
            $path = p . '/upload/image/' . $name;
//            $this->save();
            $user = User::find( $request->input('id'));

// Make sure you've got the Page model
            if($user) {
                $user->avatar_url = $path;
                $user->save();
                return response()->json($path,201);

            }

        }

    }

    public function authorization(Request $request){
        $user = User::find( $request->input('id'));
        $token = $request->input('api_token');
        if ($token == $user->api_token)
            return response()->json('success',202);
        else
            return response()->json('failed',401);

    }

    public function update(Request $request, Users $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(Users $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
