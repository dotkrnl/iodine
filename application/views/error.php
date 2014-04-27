<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keyword" content="<?php echo(e::get_website_keyword()); ?>"/>
    <meta name="description" content="<?php echo(e::get_website_desc()); ?>"/>
    <meta name="robots" content="index,follow"/>
    <title><?php echo($title); ?></title>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?php e::url('favicon.ico');?>"/>
    <link rel="stylesheet" href="<?php e::url('css/bootstrap-glyphicons.css')?>">
    <link rel="stylesheet" href="<?php e::url('css/themes/'.Theme::get_theme().'.css');?>">
    <link rel="stylesheet" href="<?php e::url('css/style.css');?>">
    <link rel="stylesheet" href="<?php e::url('css/ui-lightness/jquery-ui-1.10.3.custom.min.css');?>">
    <script type="text/javascript" src="<?php e::url('js/jquery-1.9.1.js');?>"></script>
    <script type="text/javascript" src="<?php e::url('js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php e::url('js/jquery.bs.js');?>"></script>
    <script type="text/javascript" src="<?php e::url('js/site.js');?>"></script>
</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php e::home();?>"><?php echo(e::get_website_name()); ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="home"><a href="<?php e::home();?>"><?php echo(__("top_frontend.home")); ?></a></li>
                <li><a href="<?php e::url('problem/list');?>"><?php echo(__("top_frontend.problem")); ?></a></li>
                <li><a href="<?php e::url('status');?>"><?php echo(__("top_frontend.status")); ?></a></li>
                <li><a href="<?php e::url('rank/user');?>"><?php echo(__("top_frontend.rank")); ?></a></li>
                <li><a href="<?php e::url('contest');?>"><?php echo(__("top_frontend.contest")); ?></a></li>
                <li><a href="<?php e::url('discuss');?>"><?php echo(__("top_frontend.discuss")); ?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="header">
    <div class="container">
        <h1 class="page-title"><?php echo $title; ?></h1>
    </div>
</div>
<div class="container">
    <?php echo View::factory('block/error');?>
</div>
<div class="footer center-block">
    <ul>
        <li><?php echo HTML::anchor('about', __('footer.about'));?></li>
        <li><?php echo HTML::anchor('links', __('footer.links'));?></li>
        <li><?php echo HTML::anchor('status', __('footer.status'));?></li>
        <li><?php echo HTML::anchor('contact', __('footer.contact'));?></li>
        <li><?php echo HTML::anchor('faqs', __('footer.help'));?></li>
        <li><?php echo HTML::anchor('terms', __('footer.terms'));?></li>
    </ul>
    <div class="runtime-info">{memory_usage}, {execution_time}</div>
    <p id="copyright"><?php echo(__('footer.copyright_:year_:team_reserved', array(':year'=>date('Y'), ':team'=>e::get_website_team()))); ?></p>
</div>
<?php echo View::factory('block/ga');?>
</body>
</html>
