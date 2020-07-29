<?php

class Controller_Feedback extends Controller
{

    function __construct()
    {
        $this->model = new Model_Feedback();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
        } else $current_page = 1;
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else $sort = 'all';

        $on_page = 4;
        $from = ($current_page * $on_page) - $on_page;
        $data['posts'] = $this->model->getSortedData($from, $on_page, $sort);
        $data['stars'] = $this->model->getCountStars();

        if ($sort == 'all') {
            $total = array_sum($data['stars']);
        } else {
            $total = $data['stars'][$sort];
        }
        $pages = ceil($total / $on_page);
        $data['totalPage'] = $pages != 0 ? $pages : 1;

        $data += $this->getPagination($data['totalPage'], $current_page);

        $data['active'] = $current_page;
        if (isset($_GET['status'])) {
            $data['status'] = $_GET['status'];
        }
        $this->view->generate('feedback_view.php', 'template_view.php', $data);
    }

    function action_add()
    {
        $status = '';
        if (isset($_POST['submit'])) {
            $tel = $_POST['phone'];
            $name = $_POST['name'];
            $post = $_POST['post'];
            $time = $_POST['time'];
            $rating = $_POST['rating'];

            if (!empty($tel) && !empty($name) && !empty($post) && !empty($time)) {
                $success = $this->model->postAdd($tel, $name, $post, $time, $rating);
                $status = $success ? 'postOk' : 'postBad';
            } else {
                $status = 'postBad';
            }

            if (isset($status)) {
                $status = '?status=' . $status;
            }
        }
        header("Location: /feedback/index$status");
    }

    private function getPagination($totalPage, $current_page, $count_show_pages = 3)
    {
        $link = "/feedback/index?" . $_SERVER["QUERY_STRING"];
        $pattern = '/page=\d+/';
        $replacement = "";
        if (!preg_match($pattern, $link) and !empty($_SERVER["QUERY_STRING"])) {
            $link = $link . "&";
        }
        $url_page = preg_replace($pattern, $replacement, $link) . "page=";

        $end = -1;
        $start = 0;
        if ($totalPage > 1) {
            $left = $current_page - 1;
            if ($left < floor($count_show_pages / 2)) $start = 1;
            else $start = $current_page - floor($count_show_pages / 2);
            $end = $start + $count_show_pages - 1;
            if ($end > $totalPage) {
                $start -= ($end - $totalPage);
                $end = $totalPage;
                if ($start < 1) $start = 1;
            }
        }
        return ['url_page' => $url_page, 'start' => $start, 'end' => $end];
    }
}
