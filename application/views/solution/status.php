<?php if ( Request::$current->query('cid') ):?>
    <?php echo(View::factory('contest/header', array('title' => $title, 'cid' => e::xss(Request::$current->query('cid')), 'contest' => $contest)));?>
<?php endif;?>
<table class="table table-hover">
	<thead>
	<tr>
		<th class="pid"><?php echo(__('solution.status.problem_id')); ?></th>
		<th><?php echo(__('solution.status.user_id')); ?></th>
		<th><?php echo(__('solution.status.result')); ?></th>
		<th class="hidden-xs"><?php echo(__('solution.status.time')); ?></th>
		<th class="hidden-xs"><?php echo(__('solution.status.memory')); ?></th>
		<th class="hidden-xs"><?php echo(__('solution.status.language')); ?></th>
		<th class="hidden-xs hidden-sm"><?php echo(__('solution.status.code_length')); ?></th>
		<th class="hidden-xs"><?php echo(__('solution.status.submit_time')); ?></th>
        <th class="colorcol"></th>
	</tr>
	</thead>
	<tbody>
<?php /* @var Model_Solution[] $list */?>
<?php foreach($list as $i): ?>
<?php if (!OJ::is_test_run($i->problem_id)): ?>
    <tr <?php if ( $current_user AND $i->allow_view_code($current_user)):?>
        href="<?php e::url("/solution/source/{$i->solution_id}");?>" class="clickable"
    <?php endif;?>>
        <?php if ( ! Request::$current->query('cid') ):?>
            <?php if ( $i->contest_id ): ?>
            <td href="<?php e::url("/contest/{$i->contest_id}/problem/{$i->num}"); ?>" class="pid">
                <?php echo(HTML::anchor("/contest/{$i->contest_id}/problem/{$i->num}", '' . $i->contest_id . e::contest_pid($i->num) )); ?>
            </td>
            <?php else: ?>
            <td href="<?php e::url("/problem/show/{$i->problem_id}"); ?>" class="pid">
                <?php echo(HTML::anchor("/problem/show/{$i->problem_id}", $i->problem_id)); ?>
            </td>
            <?php endif; ?>
        <?php else: ?>
        <td href="<?php e::url("/contest/{$cid}/problem/{$i->num}"); ?>" class="pid">
            <?php echo(HTML::anchor("/contest/{$cid}/problem/{$i->num}", e::contest_pid($i->num))); ?>
        </td>
        <?php endif; ?>
        <td href="<?php e::url("/u/{$i->user_id}"); ?>">
            <?php echo(HTML::anchor("/u/{$i->user_id}", $i->user_id)); ?>
        </td>
        <td>
            <?php echo(__(e::jresult($i->result)));?>
            <?php if (OJ::is_oi_mode()) echo $i->display_pass_rate(); ?>
        </td>
        <td class="hidden-xs"><?php if($i->result == 4) echo $i->time, 'ms'; else echo('----');?></td>
        <td class="hidden-xs"><?php if($i->result == 4) echo $i->memory, 'KB'; else echo('----');?></td>
        <td class="hidden-xs"><?php echo e::lang($i->language);?></td>
        <td class="hidden-xs hidden-sm"><?php echo $i->code_length;?>B</td>
        <td class="hidden-xs"><?php echo($i->in_date);?></td>
        <td class="colorcol <?php echo(e::status_color($i->result)); ?>"></td>
    </tr>
<?php endif; ?>
<?php endforeach;?>
</tbody>
</table>
<?php echo(View::factory('block/pager', array('base_url' => '/status', 'total' => $total)));?>
