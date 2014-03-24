<div class="row index">
    <div class="news">
        <?php /* @var Model_News[] $news_list */foreach($news_list as $news):?>
        <div class="col-md-6 news-item">
            <h4><a href="<?php e::url("/news/{$news->news_id}");?>"><?php echo($news->title);?></a><?php if ($news->is_top_news()):?><span class="label label-danger">top</span><?php endif;?></h4>
            <div class="news-summary readability">
                <?php echo($news->content);?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php echo(View::factory('common/pager', array('base_url' => '', 'total' => $total)));?>
