<?php /* @var Model_Solution $solution */ ?>
<div class="row solution">

<?php if ($cinfo || $rinfo): ?>
<div class="modal fade" id="error_info" tabindex="-1" role="dialog" aria-labelledby="error_info_label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo(__('solution.source.error.close')); ?></span></button>
      <h4 class="modal-title" id="error_info_label"><?php echo(__('solution.source.error_info')); ?></h4>
      </div>
      <div class="modal-body">
        <?php if ($cinfo): ?>
          <pre><?php echo(htmlentities($cinfo->error)); ?></pre>
        <?php endif; ?>
        <?php if ($rinfo): ?>
          <pre><?php echo(htmlentities($rinfo->error)); ?></pre>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<ul class="list-group solution-info col-sm-2">
    <?php if ($cinfo || $rinfo): ?>
    <button class="btn btn-primary btn-lg btn-full" data-toggle="modal" data-target="#error_info">
        <?php echo(__('solution.source.show_error')); ?>
    </button>
    <?php endif; ?>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->solution_id);?></span>
        <?php echo(__('solution.source.run_id')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->problem_id);?></span>
        <?php echo(__('solution.source.problem_id')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->user_id);?></span>
        <?php echo(__('solution.source.user')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_language());?></span>
        <?php echo(__('solution.source.language')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_result());?></span>
        <?php echo(__('solution.source.result')); ?>
    </li>
    <?php if (OJ::is_oi_mode()): ?>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->display_pass_rate()); ?></span>
        <?php echo(__('solution.source.score')); ?>
    </li>
    <?php endif; ?>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->time);?>ms</span>
        <?php echo(__('solution.source.time')); ?>
    </li>
    <li class="list-group-item">
        <span class="badge"><?php echo($solution->memory);?>KB</span>
        <?php echo(__('solution.source.memory')); ?>
    </li>
</ul>
<pre class="prettyprint linenums solution-code col-sm-10">
<?php echo(htmlentities($solution->source()));?>
</pre>
</div>
<script type="text/javascript">
    $(prettyPrint());
</script>
