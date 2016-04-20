@extends('layouts.head')

  <!-- sidebar start -->
  <!-- sidebar end -->
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">权限管理</strong> / <small>权限分类</small></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
               <button type="button" onclick="window.location.href='{{url('/permission/webAll')}}'" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>管理网站站点</button>

               <br><br>
               <button type="button"  class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>待开放...</button><base></base>
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
        
    </div>

    

  </div>
  <!-- content end -->

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

@endsection



