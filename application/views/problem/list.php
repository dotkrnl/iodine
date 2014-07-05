<ul class="pagination problem-pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
    <li<?php if($i == $page):?> class="active"<?php endif;?>><a href="<?php e::url("/problem/list/{$i}");?>"><?php echo($i);?></a></li>
<?php endfor;?>
</ul>
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
<?php /* @var Model_Problem[] $problemlist */ ?>
<?php foreach($problemlist as $problem): ?>
    <tr href="<?php e::url("/problem/show/{$problem->problem_id}"); ?>" class="clickable">
        <td class="pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?></td>
        <td class="pratio hidden-xs"><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
        <td class="colorcol <?php echo e::pass_status($problem);?>"></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
<ul class="pagination problem-pagination">
<?php for($i = 1; $i <= $pages; $i++): ?>
    <li<?php if($i == $page):?> class="active"<?php endif;?>><a href="<?php e::url("/problem/list/{$i}");?>"><?php echo($i);?></a></li>
<?php endfor;?>
</ul>
