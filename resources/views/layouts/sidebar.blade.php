<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="admin-index.php"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-patient'}"><span class="am-icon-file"></span>病人管理模块<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-patient">
            <li><a href="patients_list.php" class="am-cf"><span class="am-icon-check"></span>病人基本情况<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="patients_record.php"><span class="am-icon-puzzle-piece"></span>病人记录管理</a></li>
          </ul>
        </li>
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-doctor'}"><span class="am-icon-table"></span>医生管理模块<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-doctor">
            <li><a href="doctors_list.php"><span class="am-icon-th"></span>医生列表</a></li>
            <!-- <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 系统日志</a></li>
            <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li> -->
          </ul>
        </li>
        <li>
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav-activity'}"><span class="am-icon-table"></span>活动管理模块<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-activity">
          <li><a href="activity_list.php"><span class="am-icon-th"></span>活动列表</a></li>
            <!-- <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 系统日志</a></li>
            <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li> -->
          </ul>
        </li>
        <li><a href="admin-form.php"><span class="am-icon-pencil-square-o"></span>系统设置</a></li>
        <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。</p>
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