<?php

// Model, query into the database -> extend to the database
class Login extends Dbh
{
    public $location;
    public $err;
    protected $admin;

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;

            $this->err = "statement failed";

            return;
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $this->err = "email not found";
            return;
        }

        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $userInfo[0]['password']);

        if ($checkPwd == false) {
            $stmt = null;
            $this->err = "wrong password";
            return;
        } else {


            if ($userInfo[0]['role'] == 'admin') {
                $this->admin = true;
            } else {
                $this->admin = false;
            }

            session_start();
            $_SESSION['email'] = $userInfo[0]['email'];

            $stmt = null;
        }


        $stmt = null;
    }
}
