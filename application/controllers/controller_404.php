<?php

class Controller_404 extends Controller
{
	function action_index()
    {
        ob_start();
        session_start();

        if ($_SESSION['admin'] == $GLOBALS['admin_passwd']) {
            $data['admin'] = "yes";
        } else {
            session_destroy();
            $data['admin'] = "no";
        }
        $this->view->generate('404_view.php', 'template_view.php', $data);
    }
}
