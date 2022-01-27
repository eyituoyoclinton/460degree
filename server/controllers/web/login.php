<?php

class login extends ServerController
{
    public function __construct()
    {
    }

    public function index()
    {
        if (@$_SESSION['slug']) {
            $this->redirect(base_url().'/home');
        }
        $this->renderView('login');
    }

    public function process()
    {
        //if the post data is JSON, use
        $body = $this->getPostData()->json;
        $username = validator::GetInputValueString(@$body, 'username');
        $password = validator::GetInputValueString(@$body, 'password');

        if (empty($username)) {
            $sendData = [
                'status' => 'error',
                'message' => 'Username is required',
            ];

            return helper::Output_Success($sendData);
        }
        if (empty($password) || strlen($password) < 6) {
            $sendData = [
                'status' => 'error',
                'message' => 'A valid password is required',
            ];

            return helper::Output_Success($sendData);
        }

        //check the user
        $loginModel = $this->loadModel('authentication_model');
        $login = $loginModel->userAuth($username);
        //if error
        if ($login === false) {
            return helper::Output_Error(500);
        }
        if (count($login) === 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'Invalid login details',
            ];

            return helper::Output_Success($sendData);
        }
        $dbPassword = $login[0]->password;

        $passVerify = password_verify($password, $dbPassword);
        if (!$passVerify) {
            $sendData = [
                'status' => 'error',
                'message' => 'Invalid login details',
            ];

            return helper::Output_Success($sendData);
        }

        //insert activity
        $loginModel->userTrans($login[0]->id, 'Logged in');

        //send success to web
        // $_SESSION = (array) $login;
        $_SESSION['slug'] = $login[0]->slug;
        $_SESSION['fullname'] = $login[0]->fullname;
        $_SESSION['role'] = $login[0]->role;
        $_SESSION['email'] = $login[0]->email;
        $_SESSION['username'] = $login[0]->username;

        $sendData = [
                'status' => 'success',
                'message' => 'Login was successfull',
            ];

        return helper::Output_success($sendData);
    }
}
