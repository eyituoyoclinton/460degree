
<?php

class authentication_model
{
    public function __construct()
    {
        //do nothing
    }

    //check if user login in is valid one
    public function userAuth($username)
    {
        $dbQuery = "SELECT * FROM `User_tbl` WHERE `username` = '$username'";
        $DOQuery = db::DbQuery($dbQuery);
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    public function userAuthWithSlug($slug)
    {
        $dbQuery = "SELECT * FROM `User_tbl` WHERE `slug` = '$slug'";
        $DOQuery = db::DbQuery($dbQuery);
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //check user email address
    public function userEmailAuth($email)
    {
        $dbQuery = "SELECT * FROM `User_tbl` WHERE `email` = '$email'";
        $DOQuery = db::DbQuery($dbQuery);
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //authenticate the user is a super seller
    public function adminAuth($slug)
    {
        $dbQuery = "SELECT * FROM `User_tbl` WHERE `slug` = '$slug' AND `role`='Super seller'";
        $DOQuery = db::DbQuery($dbQuery);
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    public function fetchResellers()
    {
        $dbQuery = "SELECT * FROM `User_tbl` WHERE `role`='Reseller'";
        $DOQuery = db::DbQuery($dbQuery);
        // die(var_dump($DOQuery));
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //fetch the list of all users
    public function fetchUser()
    {
        $dbQuery = 'SELECT * FROM `User_tbl` ORDER BY `id` DESC';
        $DOQuery = db::DbQuery($dbQuery);
        if (array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //fetch single roles
    public function fetchUserRoles($role)
    {
        $dbQuery = "SELECT * FROM `User_role` WHERE `role` = '$role'";
        // var_dump($dbQuery);
        $DOQuery = db::DbQuery($dbQuery);
        // var_dump($DOQuery);
        if (array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //fetch the list of available roles
    public function fetchAllRoles()
    {
        $dbQuery = 'SELECT * FROM `User_role` ORDER BY `id` ASC';
        $DOQuery = db::DbQuery($dbQuery);
        if (array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //fetch user transaction
    public function fetchUserTrans($id)
    {
        $dbQuery = "SELECT * FROM `user_transaction` WHERE `user_id`=$id ORDER BY `id` DESC";
        $DOQuery = db::DbQuery($dbQuery);
        if (array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    public function userSingleTransaction($id, $userId)
    {
        $dbQuery = "SELECT * FROM `user_transaction` WHERE `id`=$id AND `user_id`=$userId";
        $DOQuery = db::DbQuery($dbQuery);
        if (array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    public function deleteTransaction($id)
    {
        $dbQuery = "DELETE FROM `user_transaction` WHERE `id`=$id";
        $DOQuery = db::DbQuery($dbQuery, 'delete');
        // die(var_dump($DOQuery));
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //add new user
    public function addUser($slug, $fullname, $username, $email, $password, $role)
    {
        $dbQuery = "INSERT INTO `User_tbl` (`slug`, `fullname`, `username`, `email`, `password`, `role`) VALUES('$slug', '$fullname', '$username', '$email', '$password', '$role')";
        $DOQuery = db::DbQuery($dbQuery, 'insert');
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //insert transaction
    public function userTrans($id, $desc)
    {
        $dbQuery = "INSERT INTO `user_transaction` (`user_id`, `transaction`) VALUES($id, '$desc')";
        $DOQuery = db::DbQuery($dbQuery, 'insert');
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }

    //update user
    public function updateUser($fullname, $username, $email, $password, $role)
    {
        $dbQuery = "UPDATE `User_tbl` SET `fullname`='$fullname', `email`='$email', `password`='$password', `role`='$role' WHERE `username`='$username'";
        $DOQuery = db::DbQuery($dbQuery, 'insert');
        // var_dump($DOQuery);
        if (is_array($DOQuery) && array_key_exists('error', $DOQuery)) {
            return false;
        }

        return $DOQuery;
    }
}
