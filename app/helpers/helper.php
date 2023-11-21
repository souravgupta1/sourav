<?php

use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Routing\Route;


if(!function_exists('p')){
    function p($p){
        echo "<pre>";
        print_r($p);
        echo "</pre>";
        exit;
    }
}
if(!function_exists('check_owner')){
    function check_owner    (){
        if(session('admin')->role == "owner"){
            return true;
        }
    }
}
if(!function_exists('check_admin')){
    function check_admin($page){
        if(session('admin')->role == "Admin" || session('admin')->role == "User"){
                $access = User::where('admin_id',session('admin')->id)->first();
                if(in_array($page,explode('|',$access->pages))){
                    return true;
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


?>
