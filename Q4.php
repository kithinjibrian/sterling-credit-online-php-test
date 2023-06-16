<?php
class User{
    private $ID;
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    //id
    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    //username
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    //firstname
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    //lastname
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    //email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    //password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    //fullname
    public function getFullname() {
        return $this->firstname . ' ' . $this->lastname;
    }
}

$user = new User();
$user->setID(1);
$user->setFirstname("kithinji");
$user->setLastname("brian");
$user->setUsername("kithinji");
$user->setEmail("kithinjibrian369@gmail.com");
$user->setPassword("topsecret");
echo "Full name:" . ' ' . $user->getFullname();
?>