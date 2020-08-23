<?php
class Controller_Admin extends Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['is_admin'])) {
            header("Location: /");
        }
    }


    function action_index()
    {

    }

    function action_users() {

    }

    function action_user_delete(){

    }

    function action_user_edit() {

    }

    function action_user_save(){

    }
}