<table class="table table-hover">
	<thead>
	<tr>
		<th class="hidden-xs"><?php echo(__('contest.list.id')); ?></th>
		<th><?php echo(__('contest.list.title')); ?></th>
		<th><?php echo(__('contest.list.endtime')); ?></th>
		<th><?php echo(__('contest.list.type')); ?></th>
	</tr>
	</thead>
	<tbody>
<?php foreach($list as $c): ?>
<tr href="<?php echo e::url("/contest/show/{$c['contest_id']}"); ?>" class="clickable">
<td class="hidden-xs"><?php echo($c['contest_id']);?></td>
<td><?php echo HTML::anchor("/contest/show/{$c['contest_id']}", $c['title']);?></td>
<td><?php echo($c['end_time']);?></td>
<td><?php echo(__(e::private_value($c['private'])));?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php echo(View::factory('block/pager', array('base_url' => '/contest', 'total' => $total)));?>
