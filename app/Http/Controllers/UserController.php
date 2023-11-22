<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\MailSetting;
use App\Models\PagesModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    // Function to display the user form for creating or updating a user
    function userFormView($id=null){
        $pages = PagesModel::all();
        if($id){
            // If $id is provided, fetch user data for updating
            $user = admin_data($id);
            return view('admin.pages.user.create-user',compact('pages','user'));
        }else{
            // If $id is not provided, show the form for creating a new user
            return view('admin.pages.user.create-user',compact('pages'));
        }

    }
     // Function to handle the creation of a new user
    function createUser(Request $request){
        $warning = '';
        $user = new UserModel();
        $admin = new AdminModel();
        $auth = new AuthController();

    // Validate the incoming request data
      try{

        $request->validate([
            'role'=>'required',
            'uname'=>'required',
            'email'=>'required|email|unique:admin_login,email',
            'password'=>'required',
            'pages'=>'required',
            'opts'=>'required',
        ]);

      } catch (ValidationException $e) {
        // If validation fails, redirect back with error messages
         $e->validator->errors()->all();
        foreach($e->errors() as $key=>$value){
             return redirect()->route('create-user')->with(['error'=>$value[0]])->withInput();;
             break;
        }


      }
      // Populate Admin model with the validated data
        $admin->role = $request->role;
        $admin->name = $request->uname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        if($admin->save()){
            // If Admin model is saved successfully, proceed with other related models
            $mail = new MailSetting();
            $mail->user_id = $admin->id;
            $user->admin_id = $admin->id;
            if(session('admin')){
                $user->created_by = session('admin')->id;
            }
            foreach($request->opts as $opt){
                $options[] = implode('|',$opt);
            }

           // Check if the number of pages matches the number of options
            if (count($request->pages) === count($options)) {
                $user->pages =  json_encode(array_combine($request->pages,$options));
            }else{
                $warning .= "and Re-assign Access Required";
            }
            if($mail->save()){
                if($auth->sendMail($admin)){
                    if(!$user->save()){
                    return redirect()->route('create-user')->with(['error'=>'Error in user Insertion']);
                }
                     return redirect()->route('create-user')->with(['warning'=>'Please Verify Email ID '.$warning]);
                }else{
                    return redirect()->route('create-user')->with('error','Mail Not Send');
                }
            }else{
                 return redirect()->route('create-user')->with('error','Error in Mail Insertion');
            }
        }else{
            return redirect()->route('create-user')->with('error','Error in Owner Insertion');
        }




    }
    // Function to display the list of users
    function userListView(){
        $users = admin_data();
        return view('admin.pages.user.user-list',compact('users'));
    }
     // Function to update an existing user
    function updateUser(Request $request){
        $user =  UserModel::find($request->user_id);
        $admin =  AdminModel::find($user->admin_id);
        // Validate the incoming request data
        $request->validate([
            'pages'=>'required',
            'password'=>'required'
            ]);
            foreach($request->opts as $opt){
                $options[] = implode('|',$opt);
            }
            // Check if the number of pages matches the number of options
            if (count($request->pages) === count($options)) {
                $user->pages =  json_encode(array_combine($request->pages,$options));
            }else{
                return redirect()->route('create-user',['id' => $request->user_id])->with(['warning'=>$request->pages[count($request->pages)-1].' Page\n Must have Atleast One Access']);
            }

     // Save the updated user
            if($user->save()){
                return redirect()->route('create-user',['id' => $request->user_id])->with(['success'=>'User updated']);
            }else{
                 return redirect()->route('create-user',['id' => $request->user_id])->with(['error'=>'Unable to update user']);
            }
    }
}
