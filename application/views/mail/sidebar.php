<ul class="nav nav-pills nav-stacked">
    <li <?php if (Request::$current->action() == 'inbox'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/inbox');?>"><?php echo(__('mail.inbox')); ?><?php if ($current_user->have_new_mail()):?> <span class="badge"><?php echo $current_user->number_of_new_mail();?></span><?php endif;?></a></li>
    <li <?php if (Request::$current->action() == 'outbox'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/outbox');?>"><?php echo(__('mail.outbox')); ?></a></li>
    <li <?php if (Request::$current->action() == 'new'):?> class="active"<?php endif;?>><a href="<?php e::url('/mail/new');?>"><?php echo(__('mail.new_mail')); ?></a></li>
</ul>
