<?php if ( ! isset($cid) ):?>
<ul class="breadcrumb">
<li>
    <a href="<?php e::url('/discuss/');?>"><?php echo(__('discuss.list.discuss')); ?></a>
    <span class="divider"></span> 
</li>
<?php if (Request::current()->query('pid')):?>
<li>
    <a href="<?php e::url('/problem/show/'. Request::current()->query('pid'));?>"><?php echo Request::current()->query('pid');?></a>
    <span class="divider"></span> 
</li>
<?php endif;?>
</ul>
<?php else:?>
    <?php echo(View::factory('contest/header', array('title' => $title, 'cid' => Request::$current->query('cid'), 'contest' => $contest)));?>
<?php endif;?>

根据相关法律法规，讨论已被禁用。
