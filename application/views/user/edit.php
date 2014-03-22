<h2 class="page-title"><?php echo(__('user.edit.user_edit')); ?></h2>
<form action="<?php e::url(Request::current()->uri());?>" method="POST" class="form-horizontal col-sm-7 col-sm-offset-2" role="form">
    <div class="form-group">
        <label class="control-label col-sm-4" for="user_id"><?php echo(__('user.register.username')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" type="text" id="user_id" disabled="disabled" value="<?php print $userinfo['user_id'];?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="nick"><?php echo(__('user.register.nick')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" id="nick" name="nick" type="text" value="<?php print $userinfo['nick'];?>"/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="newpwd"><?php echo(__('user.edit.new_password')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" id="newpwd" name="newpassword" type="password" value=""/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="repwd"><?php echo(__('user.register.confirm')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" id="repwd" name="confirm" type="password" value=""/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="school"><?php echo(__('user.register.school')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" name="school" id="school" type="text" value="<?php print $userinfo['school'];?>"/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="email"><?php echo(__('user.register.email')); ?></label>
        <div class="col-sm-8">
            <input class="form-control" name="email" id="email" type="email" value="<?php print $userinfo['email'];?>"/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="locale"><?php echo(__('user.register.locale')); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="locale" id="locale" type="locale">
            <?php $selected = $userinfo['locale']; ?>
            <?php foreach(I18n::supported_lang() as $value => $info): ?>
                <option value="<?php echo($value);?>" <?php if ($selected==$value) echo('selected'); ?>>
                    <?php echo($info['name']);?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-4" for="theme"><?php echo(__('user.register.theme')); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="theme" id="theme" type="theme">
            <?php $selected = $userinfo['theme']; ?>
            <?php foreach(Theme::supported_themes() as $value => $name): ?>
                <option value="<?php echo($value);?>" <?php if ($selected==$value) echo('selected'); ?>>
                    <?php echo($name);?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <input type="submit" value="<?php echo(__('user.edit.save_changes')); ?>" class="btn-primary btn" id='submit'/>
        </div>
    </div>
</form>
<script type="text/javascript" data-turbolinks-eval="true">
    $(function(){
        $("input.pop").popover({
            trigger: 'focus',
            offset: 10
        })
    });
    $(function(){
        $('#submit').click(function(){
            if ($('#newpwd').val() != $('#repwd').val()){
                $('#repwd').popover({
                    container: 'body',
                    content: '<?php echo(__('user.edit.error_not_same')); ?>',
                    offset: 10,
                    trigger: 'focus'
                }).popover('show');
                return false;
            }
            return true;
        })
    });
</script>
