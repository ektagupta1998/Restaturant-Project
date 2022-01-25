<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant as ModelsRestaurant;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
class RestoControllers extends Controller
{
    //
    function index()
    {
        return view('home');
    }
    function list()
    {
        $data=Restaurant::all();
        return view('list',["data"=>$data]);
    }
    // function add()
    // {
    //     return view('add');
    // }

    function home()
    {
        return view('home');
    }

    function add(Request $request)
    {
        $resto=new Restaurant;
        $resto->name=$request->input('name');
        $resto->email=$request->input('email');
        $resto->address=$request->input('address');
        $resto->save();
        $request->Session()->flash('status','Resturant Submited Successfully');
        return redirect('list');
    }

    function delete($id)
    {
        Restaurant::find($id)->delete();
        Session::flash('status','Resturant Deleted Successfully');
        return redirect('list');
    }

    function edit($id)
    {
        $data = Restaurant::find($id);
        return view('edit',['data'=>$data]);
    }

    function update(Request $request)
    {
        // dd($request->all());
        $resto = Restaurant::find($request->id);
        $resto->name=$request->input('name');
        $resto->email=$request->input('email');
        $resto->address=$request->input('address');
        $resto->save();
        $request->Session()->flash('status','Resturant Updated Successfully');
        return redirect('list');    
    }


    function register(Request $request)
    {
        // echo Crypt::encrypt('123@abc');
        // return $request->input();
        $user = new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Crypt::encrypt($request ->input('password'));
        $user->contact_number=$request->input('contact_number');    
        $user->save();
        $request->Session()->put('user',$request->input('name'));
        return redirect('/');

    }
    function login(Request $request)      
    {
        // dd($request->all());
        $user= User::where("email",$request->input('email'))->get();
        if(crypt::decrypt($user[0]->password)==$request->input('password'))
        {
            $request->Session()->put('user', $user[0]->name);
            return redirect('/');
        }
        
        

        // return $user[0]->password;
    }
}


// return $request->input();
// return Restaurant::all(); jab pura data dikhana hota hai toh hum ye key use krte
// return view('list');

