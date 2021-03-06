<?php /* @var Model_Contest $contest */
?>
<?php echo(View::factory('contest/header', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<div class="scrollable-container">
<table class="table table-hover" id="contest-standing">
<thead>
    <tr>
        <th><?php echo(__('contest.standing.rank')); ?></th>
        <th><?php echo(__('contest.standing.user')); ?></th>
        <th><?php echo(__('contest.standing.solved')); ?></th>
        <th><?php echo(__('contest.standing.penalty')); ?></th>
        <?php foreach($contest->problem() as $problem): ?>
            <th href="<?php e::url("/contest/{$cid}/problem/{$problem->num}"); ?>" class="clickable">
                <?php echo(HTML::anchor("/contest/{$cid}/problem/{$problem->num}", $problem->display_order())); ?>
            </th>
        <?php endforeach; ?>
    </tr>
</thead>
<tbody>
    <?php $rank = 0; ?>
    <?php foreach($contest->standing() as $team): ?>
    <?php $rank++; ?>
    <tr href="<?php echo e::url("/status?cid={$cid}&uid={$team->user_id}"); ?>" class="clickable">
        <td><?php echo($rank);?></td>
        <td href="<?php e::url("/u/{$team->user_id}"); ?>">
            <?php echo(HTML::anchor("/u/{$team->user_id}", $team->user_id));?>
        </td>
        <td><?php echo($team->solved);?></td>
        <td><?php e::the_contest_problem_time($team->time);?></td>
        <?php for($i = 0; $i < $contest->number_of_problems(); $i++): $pdata = $team->problem_status($i)?>
        <td class="<?php if ($pdata['accept_at']) echo 'success'; else if ($pdata['wa_count']) echo 'warning';?>">
            <?php if ($pdata['accept_at']): ?>
                <b><?php echo($pdata['wa_count'] + 1);?></b><br />
                <small><?php e::the_contest_problem_time($pdata['accept_at']);?></small>
            <?php elseif ($pdata['wa_count']): ?>
                <b><?php echo($pdata['wa_count']);?></b><br />
                <small>--</small>
            <?php endif; ?>
        </td>
        <?php endfor; ?>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
</div>
