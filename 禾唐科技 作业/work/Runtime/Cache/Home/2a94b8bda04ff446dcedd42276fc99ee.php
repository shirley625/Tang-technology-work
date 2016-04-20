<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>江西师大国际教育学院</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="author" content="Carmen"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/sis - test/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/sis - test/Public/assets/global/styles/public.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- [if IE] -->
    <script src="/sis - test/Public/assets/global/plugins/ie8/html5shiv.min.js" type="text/javascript"></script>
    <script src="/sis - test/Public/assets/global/plugins/ie8/respond.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/sis - test/Public/assets/global/styles/ie8-fix.css" type="text/css"/>
    <!-- [endif] -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    
    <link rel="stylesheet" type="text/css" href="/sis - test/Public/assets/global/plugins/carousel-baidu/yx_rotaion.css"/>
    <link rel="stylesheet" type="text/css" href="/sis - test/Public/assets/pages/styles/index.css" />

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
                    <img class="logo hidden-xs hidden-sm" src="/sis - test/Public/assets/global/img/logo.png">
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
    
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
           <?php if(empty($banner)): ?><div class="item active">
                   <img style="width: 100%;" src="/sis - test/Public/uploads/2015-03-03/bg1.png" alt="...">
               </div><?php endif; ?>
            <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['index_show']) == "2"): ?><div class="item active">
                        <img style="width: 100%;" src="/sis - test/Public/uploads/<?php echo ($vo['img_url']); ?>" alt="...">
                    </div>
                <?php else: ?>
                    <div class="item">
                        <img style="width: 100%;" src="/sis - test/Public/uploads/<?php echo ($vo['img_url']); ?>" alt="...">
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row fly">
            <div class="col-md-4 col-xs-12 col-sm-12 change-md-4">
                <div class="box box-left width100">
                    <ul class="pull-left">
                        <li class="tags wishes"><a href="javascript:;"><?php if(($lang_id) == "2"): ?>领导致辞 <?php else: ?>Wishes<?php endif; ?></a></li>
                        <li class="tags notice"><a href="javascript:;"><?php if(($lang_id) == "2"): ?>公告通知 <?php else: ?>Notice<?php endif; ?></a></li>
                        <li class="tags news"><a href="javascript:;"><?php if(($lang_id) == "2"): ?>学院新闻 <?php else: ?>News<?php endif; ?></a></li>
                    </ul>
                    <span class="more"><a href="<?php echo U('Article/category',array('category_id'=>33));?>" class="pull-right hidden-xs hidden-sm"><?php if(($lang_id) == "2"): ?>更多<?php else: ?>More<?php endif; ?></a></span>
                    <span class="more more-icon"><a href="<?php echo U('Article/category',array('category_id'=>51));?>" class="pull-right"><i class="glyphicon glyphicon-share"></i></a></span>
                    <div class="box-left-content">
                        <!-- 院长致辞-内容 -->
                        <a href="<?php echo U('Article/detail',array('content_id'=>$wishes['0']['id']));?>">
                            <div class="wishes-show" style="display:none;">
                                <?php if(empty($wishes)): ?><p><span class="glyphicon glyphicon-grain"></span><?php if(($lang_id) == "2"): ?>暂无内容 <?php else: ?> No content<?php endif; ?></p>
                                    <?php else: ?>
                                    <p><span class="glyphicon glyphicon-grain"></span><?php if(($lang_id) == "2"): echo (mb_substr($wishes['0']['content'],0,150,'UTF8')); ?> <?php else: echo (mb_substr($wishes['0']['content'],0,350,'utf8')); ?>...<?php endif; ?></p><?php endif; ?>
                            </div>
                        </a>
                        <!-- 通知公告-内容 -->
                        <div class="notice-show" style="display:none;">
                            <?php if(empty($notice)): ?><div class="notice-list"><span class="glyphicon glyphicon-chevron-right"></span><?php if(($lang_id) == "2"): ?>暂无公告 <?php else: ?>No Notice<?php endif; ?></div>
                                <?php else: ?>
                                <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="notice-list"><span class="glyphicon glyphicon-chevron-right"></span> <a href="<?php echo U('Article/detail',array('content_id'=>$vo['id'],'lan_id'=>$lang_id));?>"><?php if(($lang_id) == "2"): echo (mb_substr($vo['title'],0,18,'UTF-8')); ?>... <?php else: echo (mb_substr($vo['title'],0,30)); ?>...<?php endif; ?></a></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                        <!-- 新闻动态-内容 -->
                        <?php if(empty($picUrl)): ?>暂无新闻
                            <?php else: ?>
                                <div class="yx-rotaion" style="display:block;">
                                    <ul class="rotaion_list">

                                        <?php if(is_array($picUrl)): $i = 0; $__LIST__ = $picUrl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Article/detail',array('content_id'=>$vo['content_id'],'lan_id'=>$se_lan_id));?>"><?php echo ($vo['url']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 change-md-4">
                <div class="box box-center width100 event-block" style="display: block">
                    <div class="box-title"><span class="glyphicon glyphicon-volume-up"></span><?php if(($lang_id) == "2"): ?>学院动态 <?php else: ?>College News<?php endif; ?></div>
                    <span class="more"><a href="<?php echo U('Article/category',array('category_id'=>$news[0]['category_id']));?>" class="pull-right hidden-xs hidden-sm"><?php if(($lang_id) == "2"): ?>更多<?php else: ?>More<?php endif; ?></a></span>
                    <span class="more more-icon"><a href="" class="pull-right"><i class="glyphicon glyphicon-share"></i></a></span>
                    <!-- 学院动态 -->
                    <div class="box-center-content">
                        <?php if(empty($news)): ?><div class="notice-list"><span class="glyphicon glyphicon-chevron-right"></span> 暂无动态</div>
                            <?php else: ?>
                            <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="notice-list"><span class="glyphicon glyphicon-chevron-right"></span> <a href="<?php echo U('Article/detail',array('content_id'=>$vo['id'],'lan_id'=>$lang_id));?>"><?php if(($lang_id) == "2"): echo (mb_substr($vo['title'],0,15,'UTF-8')); ?>... <?php else: echo (mb_substr($vo['title'],0,30,'UTF-8')); ?>...<?php endif; ?></a><span class="notice-time pull-right hidden-xs"><?php echo (date('m-d',$vo['create_time'])); ?></span></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </div>
                <div class="box box-center width100 topic-block" style="display: none">
                    <div class="box-title"><span class="glyphicon glyphicon-gift"></span> <?php if(($lang_id) == "2"): ?>专题展示 <?php else: ?>Topic<?php endif; ?></div>
                    <span class="more"><a href="javascript:;" class="pull-right hidden-xs hidden-sm back"><?php if(($lang_id) == "2"): ?>返回<?php else: ?>Back<?php endif; ?></a></span>
                    <span class="more more-icon"><a href="" class="pull-right"><i class="glyphicon glyphicon-share"></i></a></span>
                    <!-- 专题展示  -->
                    <div class="box-center-content">
                        <div class="topic-pic">
                            <a target="_blank" href="<?php echo ($topic['url']); ?>" title="<?php echo ($topic['name']); ?>"><br><img style="height: 0" src="/sis - test/Public/uploads/<?php echo ($topic['path']); ?>" alt=""/></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 change-md-3">
                <div class="row">
                    <?php if(($array_count) == "3"): ?><div class="col-md-9">
                                <div class="box-right">
                                    <?php if(($lang_id) == "2"): ?><ul class="box-nav">
                                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>"><a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <li class="topic"><a href="javascript:;" ><?php if(($lang_id) == "2"): ?>专题展示 <?php else: ?>Topic Show<?php endif; ?></a></li>
                                        </ul>
                                        <?php else: ?>
                                        <ul class="box-nav2">
                                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>"><a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <li style="margin-left: 0px;" class="topic"><a href="javascript:;" > Topic Show</a></li>
                                        </ul><?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-11">
                                <div class="box-right">
                                    <?php if(($lang_id) == "2"): ?><ul class="box-nav">
                                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>"><a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <li class="topic"><a href="javascript:;" ><?php if(($lang_id) == "2"): ?>专题展示 <?php else: ?>Topic Show<?php endif; ?></a></li>
                                        </ul>
                                        <?php else: ?>
                                        <ul class="box-nav2">
                                            <?php if(is_array($subNav)): $i = 0; $__LIST__ = $subNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo['id']); ?>"><a href="<?php echo U($vo['url']);?>" ><?php echo ($vo['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <li style="margin-left: 0px;" class="topic"><a href="javascript:;" > Topic Show</a></li>
                                        </ul><?php endif; ?>
                                </div>
                            </div><?php endif; ?>
                </div>
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
<script src="/sis - test/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/sis - test/Public/assets/global/plugins/bootbox.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript">
    /* GLOBAL URL */
    var _ROOT_ = '/sis - test',
            _PUBLIC_ = '/sis - test/Public',
            _INDEX_ = '/sis - test/index.php',
            _ACTION_ = '/sis - test/index.php/Home/Index/index',
            _MODULE_ = '/sis - test/index.php/Home',
            _CONTROLLER_ = '/sis - test/index.php/Home/Index';
</script>
<script type="text/javascript">
    window._ROOT_='/sis - test';
    window._APP_='/sis - test/index.php';
    window._ACTION_='<?php echo U("");?>';
    window._SELF_='<?php echo urldecode("/sis%20-%20test/");?>';
</script>
<!-- BEGIN CORE SCRIPTS -->
<script src="/sis - test/Public/assets/global/scripts/public.js" type="text/javascript"></script>
<!-- END CORE SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script type="text/javascript" src="/sis - test/Public/assets/global/plugins/carousel-baidu/jquery.yx_rotaion.js"></script>
    <script src="/sis - test/Public/assets/pages/scripts/index_home.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">
        $(document).ready(function(){
            IndexShow.init();
        });

    </script>

<script type="text/javascript">

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>