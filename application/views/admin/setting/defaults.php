<div class="alert alert-info">
    <p><?php echo(__('admin.settings.default.notice')); ?></p>
</div>
<table class="table table-responsive">
    <thead>
    <tr>
        <th style="width: 200px"><?php echo(__('admin.settings.index.name')); ?></th>
        <th><?php echo(__('admin.settings.index.value')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach(Model_Option::defaults() as $key => $value):?>
        <tr class="config-default">
            <td><?php echo($key);?></td>
            <td><?php echo($value);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
