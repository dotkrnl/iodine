<form action="<?php e::url('/status');?>" method="GET" class="form-inline status-filter" role="form">
    <div class="form-group">
        <label class="sr-only" for="pid"><?php echo(__('solution.status.problem_id')); ?></label>
        <input placeholder="<?php echo(__('solution.status.problem_id')); ?>" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="udi"><?php echo(__('solution.status.user_id')); ?></label>
        <input placeholder="<?php echo(__('solution.status.user_id')); ?>" name="uid" id="uid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="language"><?php echo(__('solution.status.language')); ?></label>
        <select name="language" class="form-control">
            <option value="-1" selected="selected"><?php echo(__('solution.status.language')); ?></option>
        <?php foreach( OJ::$language as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo e::lang($key);?></option>
        <?php endforeach;?>
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="result"><?php echo(__('solution.status.result')); ?></label>
        <select name="result" class="form-control">
            <option value="-1" selected="selected"><?php echo(__('solution.status.result')); ?></option>
        <?php foreach( OJ::$status as $key=>$lang):?>
            <option value="<?php echo $key; ?>"><?php echo(__(e::jresult($key)));?></option>
        <?php endforeach;?>
        </select>
    </div>
    <input type="submit" value="<?php echo(__('solution.status.filter')); ?>" class="btn btn-default">
</form>
