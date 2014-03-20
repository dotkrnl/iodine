<?php if (Request::$current->controller() == 'Index'):?>
<div class="welcome readability" style="background-image: url(<?php echo e::url('/img/brand.jpg'); ?>);">
    <div class="container">
        <?php if ((!$current_user) AND (! OJ::is_captcha_enabled())): ?>
        <div class="pull-right hidden-xs hidden-sm col-sm-4">
            <form action="<?php e::url(e::LOGIN_URL);?>" role="form" method="post" class="form-horizontal">
                <div class="form-group"><input type="text" class="form-control" id="username" name="username" placeholder="<?php echo(__('user.login.username'));?>"/></div>
                <div class="form-group"><input type="password" name="pwd" class="form-control" id="password" placeholder="<?php echo(__('user.login.password'));?>"/></div>
                <button type="submit" class="fake-hide"><?php echo(__('user.login.login'));?></button>
            </form>
        </div>
        <?php endif; ?>
        <h2><?php echo(__("index.welcome_to_:name", array(':name' => e::get_website_name()))); ?></h2>
        <p><?php echo(__("index.any_problem")); ?></p>
    </div>
</div>
<?php endif; ?>
