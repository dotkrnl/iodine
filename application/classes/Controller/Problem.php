<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Problem extends Controller_Base
{
    public function action_index()
    {
        $this->view = 'problem/list';
        $this->action_list();
    }

    public function action_list()
    {
        $default_page = Session::instance()->get('volume', 1);
        // get user last volume
        $current_user = $this->get_current_user();
        if ( $current_user )
        {
            $default_page = $current_user->get_last_volume();
        }

        $page = $this->request->param('id', $default_page);
        // save current volume
        if ( $current_user ) {
            $current_user->volume = $page;
            $current_user->save();
        } else {
            Session::instance()->set('volume', $page);
        }

        $total_volumes = Model_Problem::number_of_volume();

        $page = e::convert_into_scope($page, $total_volumes);

        $this->template_data['problemlist'] = Model_Problem::problems_for_volume($page);

        $title = __('problem.list.problem_set_:id', array(':id' => $page));
        $this->template_data['title'] = $title;
        $this->template_data['pullright'] = 'problem/searchform';

        $this->template_data['page'] = $page;
        $this->template_data['pages'] = $total_volumes;
    }

    public function action_show()
    {
        // initial
        $pid = $this->request->param('id', null);

        $problem = Model_Problem::find_by_id($pid);
        $current_user = $this->get_current_user();

        if ( $problem AND $problem->can_user_access($current_user) )
        {
            //TODO: is defunct problem can access?
            $this->template_data['title'] = $problem['title'];
            $this->template_data['subtitle'] =
                __('problem.show.time_limit') . $problem['time_limit'] . __('problem.show.second') . '　'.
                __('problem.show.memory_limit') . $problem['memory_limit'] . __('problem.show.MB') . '　'.
                __('problem.show.submissions_:count', array(':count' => $problem['submit'])) . '　' .
                __('problem.show.solved_:count', array(':count' => $problem['accepted'])) . '　'.
                ($problem->is_special_judge() ? __('problem.show.spj') : '');

            $this->template_data['problem'] = $problem;
        } else {
            throw new Exception_Base(__('common.problem_not_found'));
        }
    }

    public function action_submit()
    {
        $current_user = $this->check_login();

        if ( $this->request->is_post() ) {
            $pid = $this->get_post('pid');
            $cid = $this->get_post('cid', null);
            $cpid = $this->get_post('cpid', -1);

            // if no pid, then it should be contest

            // if contest id set, then this submit a contest problem
            if ( $cid AND $cpid !== -1)
            {
                $contest = Model_Contest::find_by_id($cid);
                if ( $contest AND $contest->can_user_access($current_user) )
                {
                    $problem = $contest->problem($cpid);
                    if ( !$problem )
                    {
                        throw new Exception_Base(__('common.problem_not_found'));
                    }
                } else {
                    throw new Exception_Base(__('common.contest_not_found'));
                }
            } else {
                // so is normal submit
                $problem = Model_Problem::find_by_id($pid);

                if ( ! $problem OR !$problem->can_user_access($current_user) )
                {
                    throw new Exception_Base(__('common.problem_not_found'));
                }
            }

            $source_code = $this->get_raw_post('source');
            $lang = $this->get_post('language');

            $solution = Model_Solution::create($current_user, $problem, $lang, $source_code);

            if ( $cid )
            {
                // set contest info
                $solution->contest_id = $cid;
                $solution->num = $cpid;
            }
            $solution->save();

            // set user favorite language
            $current_user->language = $lang;
            $current_user->save();

            $this->redirect('/status');
            return;
        } else {
            $pid = $this->request->param('id', null);
            $this->template_data['pid'] = OJ::clean_data($pid);
        }

        $this->template_data['cid'] = $this->get_query('cid', null);
        $this->template_data['cpid'] = $this->get_query('pid', null);

        $this->template_data['default_lang'] = $current_user->language;

        $this->template_data['title'] = __('problem.submit.submit_code');
    }

    public function action_summary()
    {
        // init
        $problem_id = $this->request->param('id');
        $problem = Model_Problem::find_by_id($problem_id);

        $current_user = $this->get_current_user();

        if ( ! $problem OR ! $problem->can_user_access($current_user) )
            throw new Exception_Base(__('common.problem_not_found'));

        $this->template_data['summary'] = $problem->summary();
        $this->template_data['solutions'] = $problem->best_solution();

        $this->template_data['title']
            = __('problem.summary.summary_of_:id', array(':id' => $problem_id));

    }

    public function action_search()
    {
        // init
        $text = $this->get_query('text');
        $area = $this->get_query('area');

        if ($text === NULL) {
            // TODO: add better handler
            $this->action_list();
        }
        if ($area == 'id') {
            // TODO: add text content check
            $this->redirect("/problem/show/{$text}");
        }

        // TODO: validation
        $list = Model_Problem::search($text, $area);

        $this->template_data['area'] = $area;
        $this->template_data['search_text'] = $text;
        $this->template_data['problemlist'] = $list;
        $this->template_data['title']
            = __('problem.search.:text_search_result', array(':text' => $text));
        $this->template_data['pullright'] = 'problem/searchform';
    }

} // End Welcome
