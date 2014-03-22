<h1><?php echo(__('problem.search.search_:text_in_:area', array(':text' => $search_text, ':area' => __($area))));?></h1>

<?php echo(View::factory('problem/searchform'));?>

<table class="table table-hover">
<thead>
    <tr>
        <th class="pid"><?php echo(__('problem.list.id')); ?></th>
        <th class="ptitle"><?php echo(__('problem.list.title')); ?></th>
        <th class="pratio"><?php echo(__('problem.list.ratio_ac_submit')); ?></th>
    </tr>
</thead>
<tbody>
<?php foreach($problemlist as $problem): ?>
<tr href="<?php e::url("/problem/show/{$problem->problem_id}"); ?>" class="clickable">
        <td class="<?php echo e::pass_status($problem);?> pid"><?php echo($problem->problem_id); ?></td>
        <td class="ptitle"><?php echo HTML::anchor("/problem/show/{$problem->problem_id}", $problem->title);?>
        <?php if ($problem->source != ''): ?>
            <span> - <?php echo($problem->source);?></span>
        <?php endif;?>
        </td>
        <td class="pratio"><?php echo($problem->accepted); ?>/<?php echo($problem->submit); ?></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
