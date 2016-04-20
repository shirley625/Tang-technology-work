<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>江西师大国际教育学院</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="author" content="Carmen"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/sis/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/sis/Public/assets/global/styles/public.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- [if IE] -->
    <script src="/sis/Public/assets/global/plugins/ie8/html5shiv.min.js" type="text/javascript"></script>
    <script src="/sis/Public/assets/global/plugins/ie8/respond.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/sis/Public/assets/global/styles/ie8-fix.css" type="text/css"/>
    <!-- [endif] -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link rel="stylesheet" type="text/css" href="/sis/Public/assets/pages/styles/article.css" />
    <!-- END PAGE STYLES -->
    <!--<link rel="shortcut icon" href="./assets/global/img/favicon.ico"/>-->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<!-- BEGIN PAGE-HEADER -->
<section class="page-header">
    <div class="nav-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="user">
                        <?php if(empty($session_user_no)): ?><span class="login-btn"><a href="<?php echo U('User/login');?>" title="网站特定栏目仅供学院内学生访问，需先登录"><?php if(($lang_id) == "2"): ?>学生登录 <?php else: ?>Login<?php endif; ?></a></span>
                            <?php else: ?>
                            <span class="logout-btn"><a href="<?php echo U('Home/User/userLogout');?>"><?php if(($lang_id) == "2"): ?>退出 <?php else: ?>Logout<?php endif; ?></a></span>
                            <span class="admin"><a href="<?php echo U('Home/User/pwd');?>"><?php if(($lang_id) == "2"): ?>修改密码 <?php else: ?>Change Key<?php endif; ?></a></span><?php endif; ?>
                        <span class="admin"><a href="<?php echo U('Score/score');?>" title="留学生查成绩入口"><?php if(($lang_id) == "2"): ?>留学生入口 <?php else: ?>Check Grade<?php endif; ?></a></span>
                        <span class="admin"><a href="<?php echo U('System/HyStart/login');?>"><?php if(($lang_id) == "2"): ?>后台管理 <?php else: ?>Admin<?php endif; ?></a></span>
                        <?php if(empty($session_user_name)): else: ?>
                            <span class="login-welcome">|&nbsp;<?php if(($lang_id) == "2"): ?>欢迎你! <?php else: ?> Welcome!<?php endif; ?>&nbsp;<?php echo ($session_user_name); ?></span><?php endif; ?>
                        <span class="roll  hidden-xs hidden-sm">

                            <marquee style="width:56%;">
                                <?php if(empty($announce)): ?><b style="color:#fff;">暂无重要公示~</b>
                                    <?php else: ?>

                                    <?php if(is_array($announce)): $i = 0; $__LIST__ = $announce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['link'])): echo ($vo['content']); ?>
                                        <?php else: ?>
                                                <a href="http://<?php echo ($vo['link']); ?>"> <?php echo ($vo['content']); ?></a><?php endif; ?>
                                        </b><?php endforeach; endif; else: echo "" ;endif; endif; ?>

                            </marquee>
                        </span>

                    </div>
                </div>

                <div style="padding-right: 0;" class="col-md-3 col-md-offset-1 col-xs-6 col-xs-offset-6 col-sm-6">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <form class="navbar-form" role="search" action="<?php echo U('Article/searchShow');?>" method="post">
                        <div class="form-group hidden-sm hidden-xs">
                            <input name="search" type="text" class="form-control input-sm search-input" placeholder="Search">
                            <button type="submit" class="btn btn-default btn-sm hidden-sm hidden-xs search-btn"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </form>
                    <div class="btn-group" style="display: inline-block;">
                        <button type="button" class="btn btn-sm btn-info"><?php if(($lang_id) == "2"): ?>多语言切换 <?php else: ?>Language<?php endif; ?></button>
                        <button type="button" class="btn btn-sm btn-info dropdown-toggle language" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php if(is_array($lan)): $i = 0; $__LIST__ = $lan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/index',array('lan_id'=>$vo['id']));?>"><?php echo ($vo['language']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="navbar navbar-default pull-left" style="width:100%;z-index:1000!important;">
        <div class="container-fluid contanier-fl">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <!--<span class="sr-only">Toggle navigation</span>-->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('Index/index',array('lan_id'=>$lang_id));?>">
                    <img class="logo hidden-xs hidden-sm" src="/sis/Public/assets/global/img/logo.png">
                    <b class="logo-text hidden-lg hidden-md">JXNU-国教</b>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(empty($v['children'])): ?><li><a title="<?php echo ($v["name"]); ?>" href="<?php echo U('Article/category',array('category_id'=>$v['id'],'lan_id'=>$v['language_id']));?>"><?php echo (mb_substr($v['name'],0,5,'UTF8')); ?><span class="sr-only"></span></a></li>
                            <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="<?php echo ($v["name"]); ?>"><?php echo (mb_substr($v['name'],0,5,'UTF8')); ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if(is_array($v['children'])): $i = 0; $__LIST__ = $v['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ch): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Article/category',array('category_id'=>$ch['id'],'lan_id'=>$v['language_id']));?>" title="<?php echo ($ch["name"]); ?>"><?php echo ($ch['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>
<!-- END PAGE-HEADER -->

<!-- BEGIN PAGE-BODY -->
<section class="page-body">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="side-nav">
                    <ul class="side-nav">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i; if(is_array($l['children'])): $i = 0; $__LIST__ = $l['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca1): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Article/category',array('category_id'=>$key,'lan_id'=>$lang_id));?>">
                                    <li>
                                    <span class="side-nav-icon"><i class="glyphicon glyphicon-th-large"></i></span>
                                    <span class="side-nav-text"><?php echo ($ca1); ?></span>
                                    </li>
                                </a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="headline row">
                    <div class="col-md-12 col-xs-12">
                        <ol class="my-breadcrumb">
                            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i; if(empty($l['c_pid'])): else: ?>
                                <li><?php echo ($l['c_name']); ?></li><?php endif; ?>
                                <?php if(empty($list)): ?><li>暂无文章</li>
                                <?php else: ?>
                                <li><?php echo ($l['category_name']); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ol>
                    </div>
                </div>
                <br>
                <hr>
                <article>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><div class="article-title text-center"><?php echo ($l['title']); ?></div>
                        <div class="article-info pull-right">
                            发布者：<span><?php echo ($l['user_name']); ?></span>&nbsp;&nbsp;发布时间：<span><?php echo (date("Y-m-d",$l['create_time'])); ?></span>&nbsp;&nbsp;阅读：<span><?php echo ($l['hit']); ?></span>次
                        </div>
                        <div class="article-content">
                            <p><?php echo ($l['content']); ?></p>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </article>
            </div>
        </div>
    </div>

</section>
<!-- END PAGE-BODY -->
<!-- BEGIN PAGE-FOOTER -->
<section class="page-footer">
    
        <?php if(($lang_id) == "2"): ?><div class="text text-center hidden-xs hidden-sm">
                <ul class="list-unstyled list-inline  text-center">
                    <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($vo['url']); ?>" class="list-spliter"><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li><a href="http://rsc.jxnu.edu.cn/">江西师大人事网</a></li>
                </ul>
                <p>Copyright © 2015 江西师范大学国际教育学院  学院地址：江西省南昌市紫阳大道99号  邮政编码：330022</p>
                <p>联系电话：0791-8120460  赣ICP备11002450号-1 &nbsp;&nbsp;&nbsp;&nbsp; 技术支持：江西师范大学计算机信息工程学院宏奕工作室 </p>
            </div>
            <?php else: ?>
            <div class="text text-center hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 ">Address: NanChang City in JiangXi Province ziyang Road No.99&nbsp;&nbsp;&nbsp;&nbsp; Phone：0791-8120460</div>
                    <div class="col-md-12 col-xs-12 col-sm-12">@JIANGXI NOMAL UNIVERSITY OF INTERNATIONAL EDUCATION&nbsp;&nbsp;&nbsp;&nbsp; 2015 © Homyit Studio</div>
                    <!--<div class="col-md-6 col-xs-12 col-sm-12">2015 © Homyit Studio</div>-->
                </div>
            </div><?php endif; ?>
        <div class="smallscreen-foot text-center"><p>2015 © 宏奕工作室 Homyit Studio</p></div>
    
</section>
<!-- END PAGE-FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<!-- BEGIN CORE PLUGINS -->
<script src="/sis/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/sis/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/sis/Public/assets/global/plugins/bootbox.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript">
    /* GLOBAL URL */
    var _ROOT_ = '/sis',
            _PUBLIC_ = '/sis/Public',
            _INDEX_ = '/sis/index.php',
            _ACTION_ = '/sis/index.php/Home/Article/detail',
            _MODULE_ = '/sis/index.php/Home',
            _CONTROLLER_ = '/sis/index.php/Home/Article';
</script>
<script type="text/javascript">
    window._ROOT_='/sis';
    window._APP_='/sis/index.php';
    window._ACTION_='<?php echo U("");?>';
    window._SELF_='<?php echo urldecode("/sis/index.php/Home/Article/detail/content_id/40/lan_id/2.html");?>';
</script>
<!-- BEGIN CORE SCRIPTS -->
<script src="/sis/Public/assets/global/scripts/public.js" type="text/javascript"></script>
<!-- END CORE SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->



<script type="text/javascript">

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>