<?php

class users extends ServerController
{
    public function __construct()
    {
        $this->checkLogin();
    }

    public function index()
    {
        $this->checkAdmin();
        $authModel = $this->loadModel('authentication_model');
        $data['users'] = $authModel->fetchUser();
        $this->loadView('users', $data);
    }

    public function add()
    {
        if ($this->requestMethod === 'post') {
            $body = $this->getPostData()->post;
            $username = validator::GetInputValueString(@$body, 'username');
            $password = validator::GetInputValueString(@$body, 'password');
            $fullname = validator::GetInputValueString(@$body, 'fullname');
            $role = validator::GetInputValueString(@$body, 'role');
            $email = validator::GetInputValueString(@$body, 'email');
            $authModel = $this->loadModel('authentication_model');
            // var_dump($fullname);
            $getAdmin = $authModel->adminAuth($_SESSION['slug']);
            if ($getAdmin === false) {
                return helper::Output_Error(500);
            }
            if (count($getAdmin) === 0) {
                $sendData = [
                'status' => 'error',
                'message' => 'You are not authorized to perform this task',
            ];

                return helper::Output_Success($sendData);
            }

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
        } else {
            $authenticationModel = $this->loadModel('authentication_model');
            $data['userrole'] = $authenticationModel->fetchAllRoles();
            $this->loadView('addUser', $data);
        }
    }

    public function update($slug = null)
    {
        if ($this->requestMethod === 'post') {
            $body = $this->getPostData()->post;
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
            if (count($checkUsername) === 0) {
                $sendData = [
                'status' => 'error',
                'message' => 'Invalid authorization',
                ];

                return helper::Output_Success($sendData);
            }
            $recordEmail = $checkUsername[0]->email;
            $id = $checkUsername[0]->id;
            if ($email != $recordEmail) {
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
            }

            //insert user

            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $slug = validator::GenerateToken(10);
            //update the new user details into the database
            $insertUser = $authModel->updateUser($fullname, $username, $email, $hashPassword, $role);
            //check if there is an error in the database query
            if ($insertUser === false) {
                return helper::Output_Error(500);
            }
            if ($insertUser) {
                //insert activity
                $authModel->userTrans($id, 'Updated account successfully');
                $sendData = [
                    'status' => 'success',
                    'message' => 'User was added successfully',
                ];

                return helper::Output_Success($sendData);
            } else {
                $authModel->userTrans($id, 'Account had error');
                $sendData = [
                    'status' => 'error',
                    'message' => 'There was an error during adding this user please try again',
                ];

                return helper::Output_Success($sendData);
            }
        } else {
            $authModel = $this->loadModel('authentication_model');
            $data['userrole'] = $authModel->fetchAllRoles();
            $data['record'] = $authModel->userAuthWithSlug($slug);
            // die(var_dump($data));
            $this->loadView('updateUser', $data);
        }
    }

    public function delete()
    {
        //if the post data is JSON, use
        $body = $this->getPostData()->post;
        $transactionId = validator::GetInputValueString(@$body, 'id');
        $authModel = $this->loadModel('authentication_model');
        $getAdmin = $authModel->userAuthWithSlug($_SESSION['slug']);
        if ($getAdmin === false) {
            return helper::Output_Error(500);
        }
        if (count($getAdmin) === 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'You are not authorized to perform this task',
            ];

            return helper::Output_Success($sendData);
        }
        $userId = $getAdmin[0]->id;
        $getTransaction = $authModel->userSingleTransaction($transactionId, $userId);
        if ($getTransaction === false) {
            return helper::Output_Error(500);
        }
        if (count($getTransaction) === 0) {
            $sendData = [
                'status' => 'error',
                'message' => 'This transaction does not exist',
            ];

            return helper::Output_Success($sendData);
        }
        //delete the transaction
        $deleteTransaction = $authModel->deleteTransaction($transactionId);
        if ($deleteTransaction) {
            $sendData = [
                'status' => 'success',
                'message' => 'This transaction has been deleted',
            ];

            return helper::Output_Success($sendData);
        } else {
            $sendData = [
                'status' => 'error',
                'message' => 'There was an error performing this task please try again',
            ];

            return helper::Output_Success($sendData);
        }
    }

    public function transaction()
    {
        $authModel = $this->loadModel('authentication_model');
        $userData = $authModel->userAuthWithSlug($_SESSION['slug']);
        $id = $userData[0]->id;
        $data['usertransaction'] = $authModel->fetchUserTrans($id);
        // die(var_dump($data));
        $this->loadView('usertransaction', $data);
    }

    public function reseller()
    {
        $this->checkAdmin();
        $authModel = $this->loadModel('authentication_model');
        $data['reseller'] = $authModel->fetchResellers();
        // die(var_dump($data));
        $this->loadView('allResellers', $data);
    }
}
