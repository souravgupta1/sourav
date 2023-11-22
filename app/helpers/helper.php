<?php

use App\Models\AdminModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


if(!function_exists('subscription_id')){
    function subscription_id(){
        return  Str::uuid();
    }
}
if(!function_exists('p')){
    function p($p){
        echo "<pre>";
        print_r($p);
        echo "</pre>";
        exit;
    }
}
if(!function_exists('check_access')){
    function check_access($page,$right){
        if(session('admin')->role == "Admin" || session('admin')->role == "User"){
                $access = User::where('admin_id',session('admin')->id)->first();
                $jsonArray = json_decode($access->pages, true);
                $keys = array_keys($jsonArray);
                    if(in_array($page,$keys)){
                        $values = explode('|',$jsonArray[$page]);
                        if(in_array($right,$values)){
                            return true;
                        }else{
                            return false;
                        }
                }else{
                    return false;
                }
        }else{
            // always true of owner
            return true;
        }
    }
}

if(!function_exists('current_route')){
    function current_route($string){
        $route = Route::currentRouteName();
        if($route == $string){
            return "active";
        }
    }
}
if(!function_exists('getAdminNameById')){
    function getAdminNameById($id){
        return AdminModel::find($id)->name;
    }
}
if(!function_exists('admin_data')){
    function admin_data($id=null){
        if($id){
             return UserModel::Join('admin_login', 'users.admin_id', '=', 'admin_login.id')
            ->where('users.id', $id)
            ->select(
                'admin_login.id as admin_table_id',
                'users.id as user_table_id',
                'admin_login.*',
                'users.*'
            )->first();
        }else{
            return UserModel::Join('admin_login', 'users.admin_id', '=', 'admin_login.id')
            ->where('users.created_by', session('admin')->id)
            ->select(
                'admin_login.id as admin_table_id',
                'users.id as user_table_id',
                'admin_login.*',
                'users.*'
            )->get();
        }

    }
}

?>
