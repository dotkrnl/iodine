<table class="table table-hover">
<thead>
    <tr>
        <th class="pid"><?php echo(__('problem.list.id')); ?></th>
        <th class="ptitle"><?php echo(__('problem.list.title')); ?></th>
        <th class="pratio hidden-xs"><?php echo(__('problem.list.ratio_ac_submit')); ?></th>
        <th class="colorcol"></th>
    </tr>
</thead>
<tbody>
<?php foreach($problemlist as $problem): ?>
<tr href="<?php e::url("/problem/show/{$problem->problem_id}"); ?>" class="clickable">
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?>
        <?php if ($problem->source != ''): ?>
            <span> - <?php echo($problem->source);?></span>
        <?php endif;?>
        </td>
        <td class="pratio hidden-xs"><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
        <td class="colorcol <?php echo e::pass_status($problem);?>"></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
