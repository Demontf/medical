@extends('layouts.head')

  <!-- sidebar start -->
  <!-- sidebar end -->
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">角色管理</strong> / <small>角色列表</small></div>
      </div>
      <hr>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" onclick="window.location.href='{{url('/role/toAdd')}}'" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
              <!-- <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button> -->
            </div>
          </div>
        </div>
        
        <div class="am-u-sm-12 am-u-md-3">
          
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">角色</th><th class="table-type">角色名称</th><th class="table-type">描述</th><th class="table-author am-hide-sm-only">创建时间</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>

              @foreach ($roles as $role)
              <tr>
                <td><input type="checkbox" /></td>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td class="am-hide-sm-only">{{$role->display_name}}</td>
                <td>{{$role->description}}</td>
                <td class="am-hide-sm-only">{{$role->created_at}}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" onclick="window.location.href='{{url('role/edit',$role->id)}}'" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑</button> 
                     <!--  <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button> -->
                     
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              
              
              </tbody>
            </table>
            <div class="am-cf">
              
            </div>
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>

    

  </div>
  <!-- content end -->

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

@endsection



