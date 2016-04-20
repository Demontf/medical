<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Input;
use Carbon\Carbon;
class PermissionController extends Controller
{
    //
    public function getWebAll(){
    	$permissions = DB::table('permissions')->get();
    	//dump($permissions);
    	return view('permission.list',['permissions'=>$permissions]);
    	
    }

    public function add(Request $request){
    	$permission = $request->all();
    	unset($permission['_token']);
    	$permission['created_at']=Carbon::now();

    	if(empty($permission['name']) || empty($permission['display_name'])){
    		return view('permission.add',['error'=>'权限名和显示名称不能为空']);
    	}else{
    		DB::table('permissions')->insert($permission);
    		return redirect('permission/webAll');
    	}
    }

    public function edit($id){
        if(empty($id)){
            return view('permission.edit',['error'=>'id错误，未找到该权限']);
        }
        $permission=DB::table('permissions')->where('id',$id)->first();
        if(empty($permission)){
            return view('permission.edit',['error'=>'未找到该权限']);
        }
        return view('permission.edit',['permission'=>$permission]);
    }


    public function update(Request $request){
        $permission = $request->all();
        unset($permission['_token']);
        $permission['updated_at']=Carbon::now();

        if(empty($permission['name']) || empty($permission['display_name'])){
            return view('permission.edit',['error'=>'权限名和显示名称不能为空']);
        }else{
            $re=DB::table('permissions')->where('id',$permission['id'])->update($permission);
            //return view('permission.edit',['error'=>'修改成功','permission'=>$permission]);
            return redirect('permission/webAll');
        }
    }
}
