<?php
/**
 * @author: freefcw
 * Date: 1/22/14
 * Time: 11:46 PM
 */

class Controller_Admin_News extends Controller_Admin_Base {

    public function action_index()
    {
        $page = $this->get_query('page', 1);
        $limit = $this->get_query('limit', 50);

        $orderby = array(
            'news_id' => 'DESC',
        );
        $news_list = Model_News::find(array(), $page, $limit, $orderby);

        $this->template_data['title'] = __('admin.news.index.news_list');
        $this->template_data['news_list'] = $news_list;
    }

    public function action_add()
    {
        $this->view = 'admin/news/edit';
        $news = new Model_News;

        $this->template_data['title'] = __('admin.news.edit.new_news');
        $this->template_data['news'] = $news;
    }

    public function action_edit()
    {
        $id = $this->request->param('id', null);

        if ( $id )
        {
            $news = Model_News::find_by_id($id);
        } else {
            $news = new Model_News;
        }

        if ( $this->request->is_post() )
        {
            $post = $this->cleaned_post();
            $news->update($post);

            $news->defunct = Model_News::DEFUNCT_NO;
            $news->importance = Model_News::TYPE_NORMAL;
            $news->content = $this->get_raw_post('content');

            if ( isset($post['defunct']) )
            {
                $news->defunct = Model_News::DEFUNCT_YES;
            }
            if ( isset($post['top']) )
            {
                $news->importance = Model_News::TYPE_TOP;
            }

            if ( is_null($news->user_id) )
                $news->user_id = $this->current_user->user_id;

            if ( $news->save() )
            {
                $this->redirect('/admin/news');
            } else {
                $this->flash_error(__('common.error'));
            }
        }

        $this->template_data['title'] = 
            __('admin.news.edit.edit_news_:name',
                array(':name' => $news->title));
        $this->template_data['news'] = $news;
    }
}
