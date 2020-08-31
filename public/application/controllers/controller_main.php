<?php

class Controller_Main extends Controller
{
    function action_index()
    {
        $this->model = new Model_User();

        if (!isset($_SESSION['logged'])) {
            header("Location: /login");
        }

        $this->view->generate('',
            'main_view.php',
            [
                'title' => 'Dashboard',
                'user' => $_SESSION['login']
            ]);

    }

    function action_login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model = new Model_User();

            if ($this->model->validate(['login', 'password', 'captcha'], $_POST)) {
                if ($this->model->login($_POST)) {
                    header("Location: /");
                } else {
                    $this->view->generate('',
                        'main_login.php',
                        [
                            'title' => 'Login',
                            'error_message' => "User doesn't exist",
                        ]);
                }
            } else {
                $this->view->generate('',
                    'main_login.php',
                    [
                        'title' => 'Login',
                        'errors' => $this->model->errors,
                        'oldValue' => $this->model->oldValue
                    ]);
            }

        } else {
            $this->view->generate('',
                'main_login.php',
                [
                    'title' => 'Login',
                ]);
        }
    }

    function action_register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model = new Model_User();

            if (!$this->model->validate(['login', 'email', 'password', 'captcha'], $_POST)) {

                $this->view->generate('',
                    'main_register.php',
                    [
                        'title' => 'Register',
                        'errors' => $this->model->errors,
                        'oldValue' => $this->model->oldValue
                    ]);
            } else {
                $this->model->oldValue = [];
                unset($_POST['captcha']);
                $this->model->createUser($_POST);
                header("Location: /");
            }
        }


        $this->view->generate('', 'main_register.php', ['title' => 'Register']);
    }

    function action_logout()
    {
        session_destroy();
        header("Location: /");
    }

    function action_captcha()
    {
        captcha();
    }
}