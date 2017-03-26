<?php

class UserController
{

    public  function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)){
                $errors[] = 'Ім\'я не повинно бути коротше 2-х символів';
            }

            if(!User::checkEmail($email)){
                $errors[] = 'Невірний email';
            }

            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не повинен бути коротше 6-ти символів';
            }

            if(User::checkEmailExists($email)){
                $errors[] = 'Такий email вже використовується';
            }

            if($errors == false){
                $result = User::register($name, $email, $password);
            }
        }

        require_once (ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Невірний email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути коротше 6-ти символів';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Невірні дані для входу на сайт';
            } else {
                User::auth($userId);

                header("Location: /cabinet/");
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }

}