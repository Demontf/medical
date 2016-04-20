@extends('layouts.head')

  <!-- sidebar start -->
  <!-- sidebar end -->
@section('content')
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong> / <small>编辑角色</small></div>
      </div>

      <hr>
  <div class="am-gs">
    
  <form class="am-form am-form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/user/updateRole')}}">
      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        @if (!empty($error))
            <span class="help-block">
                <strong>{{ $error }}</strong>
            </span>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
      </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <div class="am-form-group">
            <label for="name" class="am-u-sm-3 am-form-label">角色名</label>
            <div class="am-u-sm-3 am-u-end">
              <input type="text" id="name"  readOnly="true"  name="name" value="{{$user->name}}" >
            </div>
          </div>


          <div class="am-form-group ">
            <label for="role" class="am-u-sm-3 am-form-label">用户角色</label>
            @foreach ($roles as $role)
            <div class="am-u-sm-1 am-u-end">
              <label class="am-checkbox">
                <?php $flag=0?>
                @foreach ($myRoles as $my)
                    @if ($my->id==$role->id)
                       <?php $flag=1?>
                    @endif
                @endforeach
                @if ($flag==1)
                <input type="checkbox" name="role[]" value="{{$role->id}}" data-am-ucheck minchecked="1" maxchecked="10" checked> {{$role->display_name}}
                @else
                <input type="checkbox" name="role[]" value="{{$role->id}}" data-am-ucheck minchecked="1" maxchecked="10"> {{$role->display_name}}
                @endif
              </label>
            </div>
             @endforeach
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

