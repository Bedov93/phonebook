<?php

class Controller_Main extends Controller
{
    function action_index()
    {
        $this->model = new Model_User();
        global $config;
        if (isset($_SESSION['inside']) && $_SESSION['inside'] == true) {
            $_SESSION['user_balance'] = $this->model->gUserBalId($_SESSION['user_id']);
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                $this->model = new Model_Admin();
                $products = $this->model->gAllProducts($_SESSION['user_id']);
                $this->view->generate('', 'admin_view.php',
                    array('title' => 'Управление', 'products' => $products));
            } else {
                $this->view->generate('', 'main_view.php',
                    array('title' => 'Управление'));
            }
        } else {
            $this->view->generate('', 'main_login.php', ['title' => 'Авторизация']);
        }
    }

    function action_login()
    {
        $this->model = new Model_User();
        $login = $this->model->login($_POST);
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