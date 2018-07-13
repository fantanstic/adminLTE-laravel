<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="#"><i class="fa fa-link"></i> <span>后台首页</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Followers for Instagram (v1)</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v1">
                    <li><a href="{{ route('admin.v1.member.detail') }}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v1.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v1.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v1.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v1.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v1.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v1.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v1.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v1.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v1.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstantLikes (v2)</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v2">
                    <li><a href="{{ route('admin.v2.member.detail') }}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v2.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v2.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v2.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v2.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v2.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v2.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v2.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v2.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v2.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstaPhoto (v4) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v4">
                    <li><a href="{{ route('admin.v4.member.detail') }}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v4.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v4.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v4.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v4.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v4.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v4.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v4.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v4.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v4.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstaTags (v5) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v5">
                    <li><a href="{{ route('admin.v5.member.detail') }}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v5.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v5.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v5.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v5.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v5.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v5.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v5.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v5.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v5.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            {{----- web getinstafollow -----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>网站getInstaFollow </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="getIns">
                    <li><a href="{{ route('admin.web.ins.user') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.web.ins.like') }}"><i class="fa fa-list-alt"></i> <span>Like订单</span></a></li>
                    <li><a href="{{ route('admin.web.ins.follow') }}"><i class="fa fa-asterisk"></i> <span>Follow订单</span></a></li>
                    <li><a href="{{ route('admin.web.ins.message') }}"><i class="fa fa-thumbs-o-up"></i> <span>网站留言</span></a></li>
                    <li><a href="{{ route('admin.web.ins.from') }}"><i class="fa fa-thumbs-o-up"></i> <span>广告来源</span></a></li>
                    <li><a href="{{ route('admin.web.ins.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.web.ins.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.web.ins.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Follow Up Analysis (v7) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v7">
                    <li><a href="{{ route('admin.v7.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v7.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v7.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v7.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v7.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v7.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v7.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v7.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v7.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v7.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v7.ip.index') }}"><i class="fa fa-bars"></i> <span>用户ip列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstantLikes_android (v6) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v6">
                    <li><a href="{{ route('admin.v6.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v6.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v6.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v6.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v6.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v6.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v6.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v6.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v6.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v6.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                    {{--<li><a href="{{ route('admin.v6.ip.index') }}"><i class="fa fa-bars"></i> <span>用户ip列表</span></a></li>--}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Followers Plus Report (v10) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v10">
                    <li><a href="{{ route('admin.v10.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v10.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v10.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v10.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v10.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v10.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v10.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v10.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v10.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v10.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstantLikes (v3) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v3">
                    <li><a href="{{ route('admin.v3.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v3.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v3.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v3.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v3.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v3.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v3.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v3.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v3.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v3.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v3.ip.index') }}"><i class="fa fa-bars"></i> <span>用户ip列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Followers Track-Analyse (v8) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v8">
                    <li><a href="{{ route('admin.v8.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v8.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v8.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v8.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v8.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v8.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v8.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v8.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v8.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v8.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v8.ip.index') }}"><i class="fa fa-bars"></i> <span>用户ip列表</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>InstantLikes_android (v9) </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu" name="v9">
                    <li><a href="{{ route('admin.v9.member.detail')}}"><i class="fa fa-bars"></i> <span>用户做任务详情</span></a></li>
                    <li><a href="{{ route('admin.v9.member.index') }}"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
                    <li><a href="{{ route('admin.v9.total.index') }}"><i class="fa fa-list-alt"></i> <span>信息总览</span></a></li>
                    <li><a href="{{ route('admin.v9.remain.index') }}"><i class="fa fa-asterisk"></i> <span>留存查看</span></a></li>
                    <li><a href="{{ route('admin.v9.project.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>消费项目</span></a></li>
                    <li><a href="{{ route('admin.v9.coins.index') }}"><i class="fa fa-calendar"></i> <span>花费金币</span></a></li>
                    <li><a href="{{ route('admin.v9.pay.index') }}"><i class="fa fa-paper-plane-o"></i> <span>充值日志</span></a></li>
                    <li><a href="{{ route('admin.v9.order.index') }}"><i class="fa fa-anchor"></i> <span>未完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v9.order.completetoday') }}"><i class="fa fa-bars"></i> <span>今日已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v9.order.complete') }}"><i class="fa fa-bars"></i> <span>已完成任务列表</span></a></li>
                    <li><a href="{{ route('admin.v9.paypalstrip.index') }}"><i class="fa fa-bars"></i> <span>paypal和信用卡列表</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>