<?php /* @var Model_Problem $problem */
if (isset($cid)) {
    echo(View::factory('contest/header', array('title' => $title, 'contest' => $contest, 'cid'=>$cid)));
} ?>
<dl class="detail">
    <dt><?php echo(__('problem.show.description')); ?></dt>
    <dd id="problem-desc"><?php echo($problem['description']);?></dd>
    <dt><?php echo(__('problem.show.input')); ?></dt>
    <dd><?php echo($problem['input']);?></dd>
    <dt><?php echo(__('problem.show.output')); ?></dt>
    <dd><?php echo($problem['output']);?></dd>
    <dt><?php echo(__('problem.show.sample_input')); ?></dt>
    <dd>
        <pre><?php echo(htmlspecialchars($problem['sample_input']));?></pre>
    </dd>
    <dt><?php echo(__('problem.show.sample_output')); ?></dt>
    <dd>
        <pre><?php echo(htmlspecialchars($problem['sample_output']));?></pre>
    </dd>
    <?php if (trim($problem['hint']) != ''): ?>
        <dt><?php echo(__('problem.show.hint')); ?></dt>
        <dd><?php echo($problem['hint']); ?></dd>
    <?php endif; ?>
    <?php if (trim($problem['source']) != ''): ?>
        <dt><?php echo(__('problem.show.source')); ?></dt>
        <dd><?php echo($problem['source']); ?></dd>
    <?php endif; ?>
</dl>

<?php
if (isset($cid)) {
    $submit_url = "/problem/submit/?cid={$cid}&pid={$pid}";
} else {
    $submit_url = "/problem/submit/{$problem['problem_id']}";
}
?>
<ul id="fn-nav" class="nav nav-pills">
    <li><?php echo HTML::anchor($submit_url, __('problem.show.submit'));?></li>
    <li><?php echo HTML::anchor("/problem/summary/{$problem['problem_id']}", __('problem.show.summary'));?></li>
    <li><?php echo HTML::anchor("/discuss?pid={$problem['problem_id']}", __('problem.show.discuss'));?></li>
</ul>
