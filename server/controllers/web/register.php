<?php

class register extends ServerController
{
    public function __construct()
    {
    }

    public function index()
    {
        if (@$_SESSION['slug']) {
            $this->redirect(base_url().'/home');
        }
        $authenticationModel = $this->loadModel('authentication_model');
        $data['userrole'] = $authenticationModel->fetchAllRoles();
        $this->renderView('register', $data);
    }

    public function process()
    {
        //if the post data is JSON, use
        $body = $this->getPostData()->json;
        $username = validator::GetInputValueString(@$body, 'username');
        $password = validator::GetInputValueString(@$body, 'password');
        $fullname = validator::GetInputValueString(@$body, 'fullname');
        $role = validator::GetInputValueString(@$body, 'role');
        $email = validator::GetInputValueString(@$body, 'email');
        $authModel = $this->loadModel('authentication_model');

        if ($fullname === '' || strlen($fullname) < 4) {
            $sendData = [
                    'status' => 'error',
                    'message' => 'Valid full name is required',
                ];

            return helper::Output_Success($sendData);
        }
        if ($username === '' || strlen($username) < 2) {
            $sendData = [
                'status' => 'error',
                'message' => 'A valid username is required',
            ];

            return helper::Output_Success($sendData);
        }
        if (!validator::IsEmail($email)) {
            $sendData = [
                    'status' => 'error',
                    'message' => 'Invalid email',
                ];

            return helper::Output_Success($sendData);
        }
        if ($role === '') {
            $sendData = [
                    'status' => 'error',
                    'message' => 'Valid role is required',
                ];

            return helper::Output_Success($sendData);
        }
        if ($password === '' || strlen($password) < 4) {
            $sendData = [
                    'status' => 'error',
                    'message' => 'Valid password is required',
                ];

            return helper::Output_Success($sendData);
        }

        //check if role exist in the database
        // var_dump($role);
        $checkUserrole = $authModel->fetchUserRoles($role);
        if ($checkUserrole === false) {
            return helper::Output_Error(500);
        }
        if (count($checkUserrole) === 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'Sorry invalid user role selected',
                ];

            return helper::Output_Success($sendData);
        }
        //check the username already exist
        $checkUsername = $authModel->userAuth($username);
        //check if there is an error
        if ($checkUsername === false) {
            return helper::Output_Error(500);
        }
        //check if the username exist before
        if (count($checkUsername) > 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'Sorry a user exist with this username',
                ];

            return helper::Output_Success($sendData);
        }
        //check the email already exist
        $checkEmail = $authModel->userEmailAuth($email);
        //check if there is an error
        if ($checkEmail === false) {
            return helper::Output_Error(500);
        }
        //check if the email exist before
        if (count($checkEmail) > 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'Sorry a user exist with this email',
                ];

            return helper::Output_Success($sendData);
        }
        //insert user

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $slug = validator::GenerateToken(10);
        //insert the new user details into the database
        $insertUser = $authModel->addUser($slug, $fullname, $username, $email, $hashPassword, $role);
        //check if there is an error in the database query
        if ($insertUser === false) {
            return helper::Output_Error(500);
        }
        if ($insertUser) {
            $sendData = [
                    'status' => 'success',
                    'message' => 'User was added successfully',
                ];

            return helper::Output_Success($sendData);
        } else {
            $sendData = [
                    'status' => 'error',
                    'message' => 'There was an error during adding this user please try again',
                ];

            return helper::Output_Success($sendData);
        }
    }
}
