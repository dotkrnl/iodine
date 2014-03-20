<form class="form-inline" role="form" action="<?php e::url('/discuss');?>" method="GET">
    <div class="form-group">
        <label class="sr-only" for="pid"><?php echo(__('discuss.list.problem_id')); ?></label>
        <input placeholder="<?php echo(__('discuss.list.problem_id')); ?>" name="pid" id="pid" class="form-control"/>
    </div>
    <div class="form-group">
        <label class="sr-only" for="uid"><?php echo(__('discuss.list.user_id')); ?></label>
        <input placeholder="<?php echo(__('discuss.list.user_id')); ?>" name="uid" id="uid" class="form-control"/>
    </div>
    <input type="submit" value="<?php echo(__('discuss.list.filter')); ?>" class="btn btn-default">
</form>
