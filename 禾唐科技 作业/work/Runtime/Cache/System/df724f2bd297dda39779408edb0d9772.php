<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php if(empty($pageTitle)): echo S('SITE_ADMIN_TITLE'); else: echo ($_pageTitle); ?> - <?php echo S('SITE_ADMIN_TITLE'); endif; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="<?php echo S('SITE_ADMIN_DESCRIPTION');?>" name="description"/>
<meta content="homyit.cn" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/sis - test/Public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->

<?php if(is_array($_assets["GLOBAL"]["CSS"])): foreach($_assets["GLOBAL"]["CSS"] as $key=>$item): ?><link href="_PUBLIC__/assets/global/styles/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>
<?php if(is_array($_assets["PLUGINS"]["CSS"])): foreach($_assets["PLUGINS"]["CSS"] as $key=>$item): ?><link href="/sis - test/Public/assets/global/plugins/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>
<?php if(is_array($_assets["PAGES"]["CSS"])): foreach($_assets["PAGES"]["CSS"] as $key=>$item): ?><link href="/sis - test/Public/assets/pages/styles/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/sis - test/Public/assets/global/styles/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/global/styles/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/layout/styles/layout.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/layout/styles/themes/blue.css" rel="stylesheet" type="text/css"/>
<link href="/sis - test/Public/assets/global/styles/hyframe.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
            <img src="/sis - test/Public/assets/layout/img/logo-default.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold"><?php echo count($hyAlerts);?></span> 条待处理的信息</h3>
                                <a href="<?php echo U('System/HyAlert/all');?>">查看全部</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <?php if(empty($hyAlerts)): ?><li style="padding:10px;">暂无未读消息！</li><?php endif; ?>
                                    <?php if(is_array($hyAlerts)): $i = 0; $__LIST__ = $hyAlerts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                        <?php if(!empty($v['url'])): ?><a href="<?php echo U($v['url']);?>"><?php else: ?><a href="javascript:;"><?php endif; ?>
                                            <span class="time">
                                                <?php echo (to_time($v["create_time"],5)); ?>
                                            </span>
                                            <span class="details">
                                                <?php $arr=explode(',',$v['icon']); $icon=$arr[1]; $label=$arr[0]?:'label-success'; ?>
                                                <span class="label label-sm label-icon <?php echo ($label); ?>">
                                                <i class="fa <?php echo ($icon); ?> fa-fw"></i>
                                                </span>
                                                                                                                            【<?php echo ($v["category"]); ?>】<?php echo ($v["message"]); ?>
                                            </span>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->                    
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle hide1" src="<?php echo session('avatarFile');?>"/>
                            <span class="username username-hide-on-mobile">
                            <?php echo session('userName');?>（<?php echo session('roleTitle');?>）</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo U('System/User/profile');?>">
                                <i class="icon-user"></i> 个人信息</a>
                            </li>
                            <?php $roleSwitch=session('roleSwitch'); ?>
                            <?php if(is_array($roleSwitch)): $i = 0; $__LIST__ = array_slice($roleSwitch,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('System/HyStart/switchs',array('role'=>$key));?>">
                                <i class="icon-settings"></i> 切换到 - <?php echo ($v); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo U('System/HyStart/logout');?>">
                                <i class="icon-logout"></i> 退出系统 </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container hy-page-<?php echo strtolower(CONTROLLER_NAME);?>">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="hy-sidebar-menu" class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                个人中心&nbsp;<small>维护个人信息</small>
            </h3>
            <div class="page-bar">
                
    <ul class="page-breadcrumb">
        <li><i class="fa fa-home"></i> <a href="/sis - test">首页</a> <i class="fa fa-angle-right"></i></li>
        <li><a href="javascript:;">系统用户</a><i class="fa fa-angle-right"></i></li>
        <li><a href="javascript:;">用户中心</a></li>
    </ul>

                
            </div>
            <div id="hy-alert-wrapper"></div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row profile">
        <div class="col-md-12">
            <!--BEGIN TABS-->
            <div class="tabbable tabbable-custom tabbable-noborder">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">
                            概况信息</a>
                    </li>
                    <li>
                        <a href="#tab-2" data-toggle="tab">
                            账号设置</a>
                    </li>

                </ul>
                <div class="tab-content" style="text-align: center;">
                    <!-- tab-1 -->
                    <div class="tab-pane active" id="tab-1" style="text-align: center;">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-user"></i>账号基础信息
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" title="收缩/展开"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <tbody>
                                            <?php echo ($user['aa']); ?>
                                            <?php if(is_array($user['base'])): foreach($user['base'] as $k=>$v): if(!empty($v)): ?><tr><th><?php echo ($k); ?></th><td><?php echo ($v); ?></td></tr><?php endif; endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>近期登录日志 <small><span class="hidden-480">账号异常？请及时</span><a data-toggle="totab" class="font-yellow" href="#tab-2-3" >修改密码</a></small>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" title="收缩/展开"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <i class="fa fa-clock-o"></i>&nbsp;登录时间
                                                </th>
                                                <th class="hidden-xs">
                                                    <i class="fa fa-map-marker"></i>&nbsp;登录IP
                                                </th>
                                                <th>
                                                    <i class="fa fa-info-circle"></i>&nbsp;是否成功
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($user["logs"])): $i = 0; $__LIST__ = $user["logs"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                                    <td>
                                                        <?php echo (to_time($v["create_time"],2)); ?>
                                                    </td>
                                                    <td class="hidden-xs">
                                                        <?php echo ($v["ip"]); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($v["description"]); ?>
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab-2-->
                    <div class="tab-pane" id="tab-2">
                        <div class="row profile-account">
                            <div class="col-md-3" style="text-align:left;">
                                <ul class="ver-inline-menu tabbable margin-bottom-10" ">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab-2-1">
                                            <i class="fa fa-cogs"></i> 基础信息 </a>
									<span class="after">
									</span>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#tab-2-3">
                                            <i class="fa fa-lock"></i> 修改密码 </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div id="tab-2-1" class="tab-pane active">
                                        <div class="portlet light">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs font-green-sharp"></i>
                                                    <span class="caption-subject font-green-sharp bold">信息编辑</span>
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <form role="form" class="form-horizontal" id="form-base">
                                                    <div class="form-body">
                                                        <input type="hidden" name="_submit" value="updateMe">
                                                        <?php if(is_array($user['form'])): foreach($user['form'] as $k=>$v): ?><div class="form-group">
                                                                <label class="col-md-offset-2 col-md-2 control-label"><?php echo ($v['name']); ?></label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="<?php echo ($k); ?>"  value="<?php echo ($user[$k]); ?>" placeholder="<?php echo ($v['tip']); ?>" class="form-control"/>
                                                                </div>
                                                            </div><?php endforeach; endif; ?>

                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-4 col-md-8">
                                                                <button type="submit" class="btn green"><i class="fa fa-check"></i>&nbsp;保存更改</button>
                                                                <button type="reset" class="btn default"><i class="fa fa-times"></i>&nbsp;取消</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2-2" class="tab-pane tab-avatar">

                                    </div>
                                    <div id="tab-2-3" class="tab-pane">
                                        <div class="portlet light">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-lock font-green-sharp"></i>
                                                    <span class="caption-subject font-green-sharp bold">密码修改</span>
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <form role="form" id="form-pwd" class="form-horizontal">
                                                    <input type="hidden" name="_submit" value="pwdMe">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-offset-1 col-md-2 control-label">旧密码</label>
                                                            <div class="col-md-4">
                                                                <input type="password" name="old_password" value="" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-offset-1 col-md-2 control-label">新密码</label>
                                                            <div class="col-md-4">
                                                                <input type="password" id="password" name="password" value="" class="form-control"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="help-block">长度不小于6位长度不大于30位</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-offset-1 col-md-2 control-label">确认输入</label>
                                                            <div class="col-md-4">
                                                                <input type="password" name="confirm_pwd" value="" class="form-control"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="help-block">验证您的新密码</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-4 col-md-8">
                                                                <button type="submit" class="btn green bao"><i class="fa fa-check"></i>&nbsp;保存更改</button>
                                                                <button type="reset" class="btn default"><i class="fa fa-times"></i>&nbsp;取消</button>
                                                                <input type="hidden" id="login-addon" value="<?php echo C('PWD_HASH_ADDON');?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
            <!--END TABS-->
        </div>

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         2014-2015 &copy; 宏奕工作室 Homyit Studio
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<script type="text/javascript">
/* GLOBAL URL */
var _ROOT_ = '/sis - test',
    _PUBLIC_ = '/sis - test/Public',
    _INDEX_ = '/sis - test/index.php',
    _ACTION_ = '/sis - test/index.php/System/User/profile',
    _MODULE_ = '/sis - test/index.php/System',
    _CONTROLLER_ = '/sis - test/index.php/System/User';
</script>
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/sis - test/Public/assets/global/plugins/respond.min.js"></script>
<script src="/sis - test/Public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/sis - test/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/jquery.blockui.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/store-json2.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/crypto.custom.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/bootbox.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<?php if(is_array($_assets["PLUGINS"]["JS"])): foreach($_assets["PLUGINS"]["JS"] as $key=>$item): ?><script src="/sis - test/Public/assets/global/plugins/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<!-- BEGIN CORE SCRIPTS -->
<script src="/sis - test/Public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/scripts/hyframe.js" type="text/javascript"></script>
<!-- END CORE SCRIPTS -->
<?php if(is_array($_assets["GLOBAL"]["JS"])): foreach($_assets["GLOBAL"]["JS"] as $key=>$item): ?><script src="/sis - test/Public/assets/global/scripts/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<?php if(is_array($_assets["PAGES"]["JS"])): foreach($_assets["PAGES"]["JS"] as $key=>$item): ?><script src="/sis - test/Public/assets/pages/scripts/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
jQuery(document).ready(function() {
    HyFrame.initMenu(<?php echo ($hyMenu); ?>);
    Metronic.init();
    Layout.init();
    HyFrame.init();
});
</script>

    <script>
        userProfile.init();
    </script>

<!-- END JAVASCRIPTS -->
<!-- BEGIN ANALYTICS -->
<div class="hidden">
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?41c66ca2d9e89051b8f673b25979b6a0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>
<!-- END ANALYTICS -->
</body>
<!-- END BODY -->
</html>