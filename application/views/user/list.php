<table class="table table-hover">
	<thead>
	<tr>
		<th class="urank"><?php echo(__('user.list.rank')); ?></th>
		<th><?php echo(__('user.list.user_id')); ?></th>
		<th class="unick hidden-xs hidden-sm"><?php echo(__('user.list.nick')); ?></th>
		<th class="usolved"><?php echo(__('user.list.solved')); ?></th>
		<th class="usubmit"><?php echo(__('user.list.submit')); ?></th>
		<th class="uratio hidden-xs hidden-sm"><?php echo(__('user.list.ratio')); ?></th>
	</tr>
	</thead>
	<tbody>
<?php $rank = ($page - 1) * $per_page; /* @var Model_User[] $users */ ?>
<?php foreach($users as $u):?>
<?php $rank = $rank + 1;?>
    <tr href="<?php e::url("/u/{$u->user_id}"); ?>" class="clickable">
        <td class="urank"><?php echo($rank) ?></td>
        <td><?php echo HTML::anchor("/u/{$u->user_id}", $u->user_id); ?></td>
        <td class="unick hidden-xs hidden-sm"><div><?php echo HTML::chars($u->nick); ?></div></td>
        <td class="usolved"><?php echo($u->solved); ?></td>
        <td class="usubmit"><?php echo($u->submit); ?></td>
        <td class="uratio hidden-xs hidden-sm"><?php echo($u->ratio_of_accept()) ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<?php
function gen_url($page=NULL)
{
    static $base_url = '/rank/user';
    if ($base_url)
        return sprintf('%s/%s', $base_url, $page);
    return $base_url;
}?>
<?php echo(View::factory('block/pager', array('base_url' => '/rank/user', 'total' => $total_page)));?>
