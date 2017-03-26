<?php

class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once (ROOT . '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Ім\'я не повинно бути коротше 2 символів';
            }

            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не повинен бути коротше 6 символів';
            }

            if($errors == false){
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once (ROOT . '/views/cabinet/edit.php');

        return true;
    }

}