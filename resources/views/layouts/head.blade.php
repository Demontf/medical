<!doctype html>
<html class="no-js fixed-layout">
<body>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>全域医疗后台管理系统</title>
  <meta name="description" content="全域医疗后台管理系统">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="全域医疗后台管理系统" />
  <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/assets/css/admin.css">
</head>

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>全域医疗</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <!-- <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li> -->
      <li class="am-dropdown" data-am-dropdown>


        @if (Auth::guest())
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="url('/login') }}">
          <span class="am-icon-users"></span> 登录 <span class="am-icon-caret-down"></span>
        </a>
        @else
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> {{ Auth::user()->name }} <span class="am-icon-caret-down"></span>
        </a>
        @endif
        <ul class="am-dropdown-content">
          <!-- <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li> -->
          <li><a href="{{ url('/logout') }}"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
<div class="am-cf admin-main">
<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="{{url('/home')}}"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-patient'}"><span class="am-icon-file"></span>用户管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-patient">
            <li><a href="{{url('/user/all')}}" class="am-cf"><span class="am-icon-check"></span>用户列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <!-- <li><a href="patients_record.php"><span class="am-icon-puzzle-piece"></span>病人记录管理</a></li> -->
          </ul>
        </li>
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-doctor'}"><span class="am-icon-table"></span>权限管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-doctor">
            <li><a href="{{ url('/permission/list') }}"><span class="am-icon-th"></span>权限列表</a></li>
            <li><a href="{{ url('/role/all') }}"><span class="am-icon-th"></span>角色列表</a></li>
            <!-- <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 系统日志</a></li>
            <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li> -->
          </ul>
        </li>
        
        <li><a href="admin-form.php"><span class="am-icon-pencil-square-o"></span>系统设置</a></li>
        <li><a href="{{ url('/logout') }}"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>给自己一个微笑，美好生活每一天。</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> wiki</p>
          <p>Welcome to the wiki!</p>
        </div>
      </div>
    </div>
  </div>

@yield('content')
<footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© Key Laboratory of Trustworthy Distributed Computing and Service (BUPT)，Ministry of Education.</p>
    </footer>
</div>
<script src="/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>