<?php
// controller, class that takes input from user
class RegisterContr extends Register
{

    private $firstName;
    private $email;
    private $password;
    private $lastName;


    public function __construct($firstName, $lastName, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function registerUser()
    {
        if ($this->emailTakenCheck() == false) {

            $this->err = "This email is already registered";

            return;
        }

        $this->setUser($this->firstName, $this->lastName, $this->email, $this->password);
        $this->getUser($this->email);
        $this->location = "index.php";
    }
    // error handlers
    private function emailTakenCheck()
    {
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
