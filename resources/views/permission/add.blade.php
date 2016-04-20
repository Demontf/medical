@extends('layouts.head')

  <!-- sidebar start -->
  <!-- sidebar end -->
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">权限管理</strong> / <small>新建权限</small></div>
      </div>

      <hr>
  <div class="am-gs">
    
  <form class="am-form am-form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/permission/add')}}">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        @if (!empty($error))
            <span class="help-block">
                <strong>{{ $error }}</strong>
            </span>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <div class="am-form-group">
            <label for="name" class="am-u-sm-3 am-form-label">权限名</label>
            <div class="am-u-sm-5 am-u-end">
              <input type="text" id="name"  name="name" placeholder="英文" >
            </div>
          </div>

        <div class="am-form-group">
            <label for="display_name" class="am-u-sm-3 am-form-label">显示名称</label>
            <div class="am-u-sm-5 am-u-end">
              <input type="text" id="display_name"  name="display_name" placeholder="网站地址" >
            </div>
          </div>


          <div class="am-form-group">
            <label for="description" class="am-u-sm-3 am-form-label">描述</label>
            <div class="am-u-sm-9">
              <textarea  rows="10" id="description" name="description" placeholder="描述" style="width:400px;height:150px;"></textarea>
            </div>
          </div>
        
    
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" class="am-btn am-btn-primary">保存</button>
            </div>
          </div>
      </div>
      </form>
    </div>

  </div>
  @endsection

  <!-- content end -->

