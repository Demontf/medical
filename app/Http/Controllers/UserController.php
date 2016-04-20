<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Input;
use App\User;
use App\Role;
use Carbon\Carbon;
class UserController extends Controller
{
    //
    public function getAll(){
    	$users = User::where('flag',1)->get();
    	foreach ($users as $key => $value) {
    		$roles=$value->roles()->get();
    		if(!$roles->isEmpty()){
    			$users[$key]['roles']=$roles;
    		}
    		
    	}
    	return view('user.list',['users'=>$users]);
    }

    public function editRole($id){
    	if(empty($id)){
    		return view('user.edit',['error'=>'用户有误']);
    	}
    	$user = User::where('id',$id)->first();
    	$myRoles = $user->roles()->get();
    	$roles = DB::table('roles')->get();
    	return view('user.edit',['user'=>$user,'myRoles'=>$myRoles,'roles'=>$roles]);

    }

    public function updateRole(Request $request){
    	$input = $request->all();
    	$roles=[];
    	if(!empty($input['role'])){
    		$roles=$input['role'];
    	}
    	
    	$user = User::where('id',$input['id'])->first();

    	if(empty($user)){
    		return view('user.edit',['error'=>'用户有误']);
    	}
    	$user->roles()->sync([]);
    	foreach ($roles as $role) {
			$user->attachRole($role);
    	}
    	return redirect('user/all');
    }

}
