<?php

class Model_User extends Model
{

    public $errors = [];
    public $oldValue = [];

    public function validate($input, $post)
    {

        $rules = [
            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'The E-mail is specified incorrectly',
            ],
            'login' => [
                'pattern' => '#^[a-z0-9]{3,15}$#',
                'message' => 'The login is specified incorrectly 
                (only Latin letters and numbers from 3 to 15 characters are allowed',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{5,30}$#',
                'message' => 'The password is specified incorrectly 
                (only Latin letters and numbers from 5 to 30 characters are allowed',
            ],
            'captcha' => [
                'pattern' => '#^[0-9]{4}$#',
                'message' => 'The captcha is specified incorrectly, only numbers 4 characters allowed',
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->errors[$val] = $rules[$val]['message'];
            }
        }


        if (isset($input['captcha']) && !isset($_SESSION['captcha']) || !(md5($post['captcha']) == $_SESSION['captcha'])) {
            $this->errors['captcha'] = 'The captcha is wrong';
        }

        if(isset($input['login']))
        {
            $this->checkLoginExists($post['login']);
        }

        if(isset($input['email'])) {
            $this->checkEmailExists($post['email']);
        }

        $this->oldValue = $post;

        return $this->errors ? false : true;
    }

    public function checkEmailExists($email)
    {
        $params = [
            'email' => $email,
        ];
        if (Database::column('SELECT id FROM users WHERE email = :email', $params)) {
            $this->errors['email'] = 'Email already exists';
        }
    }

    public function checkLoginExists($login)
    {
        $params = [
            'login' => $login,
        ];

        if (Database::column('SELECT id FROM users WHERE login = :login', $params)) {
            $this->errors['login'] = 'Login already exists';
        }
    }

    public function createUser($data)
    {
        Database::query("
            INSERT INTO 
                users (login, password, email, is_admin)
                VALUES (:login, :password, :email, 0)
             
        ", $data);
    }
}