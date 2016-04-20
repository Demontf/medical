<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;
use Carbon\Carbon;
class ServiceController extends Controller
{
    //
    public function getWebPermissionList(Request $request){
    	$result = $request->all();
    	if(empty($result['id'])){
    		$respone['status']="error";
	    	$respone['errmsg']="need id ";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}
    	$user=User::where('id',$result['id'])->first();
    	if(empty($user)){
    		$respone['status']="error";
	    	$respone['errmsg']="no user ";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}
    	$roles = $user->roles()->get();

    	$return = array();
    	foreach ($roles as $role) {
    		$perms = $role->perms()->get();
    		foreach ($perms as $perm) {
    			$temp['id']=$perm['id'];
    			$temp['name']=$perm['name'];
    			$temp['display_name']=$perm['display_name'];
    			$temp['description']=$perm['description'];
    			array_push($return,$temp);
    		}
    	}
    	//$return 需要去重

    	$respone['status']="success";
    	$respone['errmsg']="";
    	$respone['result']=$return;
    	return json_encode($respone);
    	
    }
    // username:登录账号  name:用户名字 默认为‘新用户’ password密码 comfirm确认密码
    public function register(Request $request){
    	$result = $request->all();
    	if(empty($result['username'])
    		||empty($result['password'])
    		||empty($result['comfirm'])){
    		$respone['status']="error";
	    	$respone['errmsg']="不允许为空";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}

    	if($result['password']!=$result['comfirm']){
    		$respone['status']="error";
	    	$respone['errmsg']="两次密码不一致";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}
    	$result = User::where('email',$result['username'])->first();
		
		if(!empty($result)){
    		$respone['status']="error";
	    	$respone['errmsg']="已存在";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}
    	$user['email'] = $request['username'];
    	$user['password'] = md5($request['password']);
    	$user['name'] = empty($request['name'])?'新用户':$request['name'];
    	$user['created_at']=Carbon::now();
    	$user['flag']=1;
    	$id=DB::table('users')->insertGetId($user);

    	if($id!=0){
    		$respone['status']="success";
	    	$respone['errmsg']="";
	    	$respone['result']=array("id"=>$id);
	    	return json_encode($respone);
    	}
    	
		$respone['status']="error";
    	$respone['errmsg']="注册失败";
    	$respone['result']=array();
    	return json_encode($respone);
    }

    //username 用户登录凭证 password 密码
    public function login(Request $request){
    	$result = $request->all();
    	if(empty($result['username'])
    		||empty($result['password'])){
    		$respone['status']="error";
	    	$respone['errmsg']="不允许为空";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}

    	$user=DB::table('users')->where('email',$result['username'])->first();

    	if(empty($user) || $user->password!=md5($result['password'])){
    		$respone['status']="error";
	    	$respone['errmsg']="用户名密码错误";
	    	$respone['result']=array();
	    	return json_encode($respone);
    	}
    	$respone['status']="success";
    	$respone['errmsg']="";
    	$respone['result']=array("id"=>$user->id,"username"=>$user->email,"name"=>$user->name);
    	return json_encode($respone);

    }
}
