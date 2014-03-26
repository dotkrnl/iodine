<?php /* @var Model_Contest $contest */?>
<?php echo(View::factory('contest/header', array('title' => $title, 'cid' => $cid, 'contest' => $contest)));?>
<table class="table table-hover">
<thead>
    <tr>
        <th class="pid"><?php echo(__('contest.show.id')); ?></th>
        <th class="ptitle"><?php echo(__('contest.show.title')); ?></th>
        <th class="colorcol"></th>
    </tr>
</thead>
<tbody>
<?php foreach($contest->problem() as $p):?>
<?php
    $url = sprintf('/contest/%s/problem/%s', $cid, $p->num);
?>
  <tr href="<?php e::url($url);?>" class="clickable">
        <td class="pid"><?php echo($p->display_order());?></td>
        <td class="ptitle"><a href="<?php e::url($url);?>"><?php echo($p->title());?></a></td>
        <td class="colorcol <?php echo e::pass_status($p->real_problem());?>"></td>
    </tr>
<?php endforeach;?>
</tbody>
</table>
