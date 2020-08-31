<?php

class Controller_Contact extends Controller
{
    function __construct()
    {
        parent::__construct();
    }


    function action_index()
    {
        if ($_SESSION['logged']) {
            $this->model = new Model_Contact();
            echo json_encode($this->model->draw($_GET));
        } else {
            header('Location: /');
        }

    }

    function action_contact()
    {
        if ($_SESSION['logged']) {
            $this->model = new Model_Contact();
            echo json_encode($this->model->getById(intval($_POST['id'])));
        }
    }

    function action_delete()
    {
        if ($_SESSION['logged'] && isset($_POST['id'])) {
            Model_Contact::delete(intval($_POST['id']));
        }
    }

    function action_update()
    {
        if ($_SESSION['logged'] && isset($_POST['id'])) {
            $this->model = new Model_Contact();

            $_POST['id'] = intval($_POST['id']);

            preg_match_all('!\d+!', $_POST['phone'], $matches);

            $_POST['phone'] = "+" . preg_replace('/[^0-9]/', '', $_POST['phone']);


            if (!$this->model->validate([
                'first_name',
                'last_name',
                'email',
                'phone'
            ], $_POST, true)) {
                echo json_encode(["errors" => $this->model->errors]);
                return false;
            }

            if (!$this->model->update($_POST)) {
                echo json_encode(["errors" => $this->model->errors]);
                return false;
            }

            echo json_encode(['result' => true]);
            return true;
        }
    }

    function action_create()
    {

    }
}