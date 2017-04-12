<?php /* @var Model_Topic $the_topic */
?>
<ul class="breadcrumb">
    <li><a href="<?php e::url('/discuss/');?>"><?php echo(__('discuss.list.discuss')); ?></a> <span class="divider"></span></li>
    <?php if ( !is_null($the_topic->cid) && $the_topic->cid != 0):?>
    <li><a href="<?php e::url("/contest/talk?cid={$the_topic->cid}");?>"><?php echo(__('discuss.list.contest')); ?> <?php echo($the_topic->cid);?></a> <span class="divider"></span></li>
    <?php elseif ( $the_topic->pid != 0):?>
    <li><a href="<?php e::url("/discuss?pid={$the_topic->pid}");?>"><?php echo($the_topic->pid);?></a> <span class="divider"></span></li>
    <?php endif;?>
    <li class="active"><?php echo($the_topic->title);?></li>
</ul>
<div class="topic">
根据相关法律法规，讨论已被禁用。
</div>
