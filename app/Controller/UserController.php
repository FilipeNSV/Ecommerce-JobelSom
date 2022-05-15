<?php

namespace App\Controller;

use \App\Model\Classes\User;

class UserController
{
    public function userRegister()
    {
        if (isset($_POST['userFNInsert']) && !empty($_POST['userFNInsert'])) {
            $user = new User;
            $result = $user->insertUser($_POST['userFNInsert'], $_POST['userSNInsert'], $_POST['userEmailInsert'], $_POST['userPassInsert']);
            return $result;
        }
    }

    public function userSelectReturn()
    {
        $user = new User;
        $result = $user->selectUsers((!empty($_POST['UserID'])) ? $_POST['UserID'] : 1);
        return $result;
    }

    public function userUpdate()
    {
        if (isset($_POST['userIDAlter']) && !empty($_POST['userIDAlter'])) {
            $user = new User;
            $result = $user->updateUserById($_POST['userIDAlter'], $_POST['userFNAlter'], $_POST['userSNAlter'], $_POST['userEmailAlter'], $_POST['userPassAlter']);
            return $result;
        }
    }

    public function userDelete()
    {
        if (isset($_POST['userIDDelete']) && !empty($_POST['userIDDelete'])) {
            $user = new User;
            $result = $user->deleteUser($_POST['userIDDelete']);
            return $result;
        }
    }
}
