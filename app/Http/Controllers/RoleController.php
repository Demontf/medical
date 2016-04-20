<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Input;
use App\Role;
use Carbon\Carbon;
class RoleController extends Controller
{
    //
    public function getAll(){
    	$roles = DB::table('roles')->get();
    	return view('role.list',['roles'=>$roles]);
    	
    }

    public function toAdd(){
        $permissions=DB::table('permissions')->get();
        return view('role.add',['permissions'=>$permissions]);
    }


    public function add(Request $request){
    	$role = $request->all();
    	unset($role['_token']);
    	$role['created_at']=Carbon::now();
        
        if(!empty($role['permission'])){
            $permissions=$role['permission'];
        }
        unset($role['permission']);
    	if(empty($role['name']) || empty($role['display_name'])){
    		return view('role.add',['error'=>'角色名和显示名称不能为空']);
    	}else{
    		$result=DB::table('roles')->insertGetId($role);
            $theRole = Role::where('id',$result)->first();
            if(!empty($permissions)){
                //add permission
                $theRole->perms()->sync($permissions);
            }
    		return redirect('role/all');
    	}
    }

    public function edit($id){
        if(empty($id)){
            return view('role.edit',['error'=>'角色id错误']);
        }
        $role=Role::where('id',$id)->first();
        $myPermissions=$role->perms()->get();
        $permissions=DB::table('permissions')->get();
        return view('role.edit',['role'=>$role,'myPermissions'=>$myPermissions,'permissions'=>$permissions]);
    }

    public function update(Request $request){
        $role = $request->all();
        unset($role['_token']);
        $role['updated_at']=Carbon::now();
        
        if(!empty($role['permission'])){
            $permissions=$role['permission'];
        }
        unset($role['permission']);
        if(empty($role['name']) || empty($role['display_name'])){
            return view('role.edit',['error'=>'角色名和显示名称不能为空']);
        }else{
            DB::table('roles')->where('id',$role['id'])->update($role);
            $role = Role::where('id',$role['id'])->first();
            
            if(empty($permissions)){
                $permissions=[];
                //add permission
            }
            
            $role->perms()->sync($permissions);
            return redirect('role/all');
        }
    }
}
