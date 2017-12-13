<?php

include_once('form.validator.php');
include_once('utils/validation-rules.php');
include_once('utils/database-helpers.php');

class FormModel {

    public $validation;
    public $isUniqueError = false;
    public $success = false;
    private $validator;
    private $dbConnection;

    public function __construct() {
        $this->validator = new FormValidator();
        $this->validation = [
            'login' => [
                'isValid' => true,
                'rule' => ValidationRules::string
            ],
            'password' => [
                'isValid' => true,
                'rule' => ValidationRules::password
            ],
            'first-name' => [
                'isValid' => true,
                'rule' => ValidationRules::string
            ],
            'last-name' => [
                'isValid' => true,
                'rule' => ValidationRules::string
            ],
            'month' => [
                'isValid' => true,
                'rule' => ValidationRules::month
            ],
            'email' => [
                'isValid' => true,
                'rule' => ValidationRules::email
            ],
            'phone' => [
                'isValid' => true,
                'rule' => ValidationRules::phone
            ],
            'interest' => [
                'isValid' => true,
                'rule' => ValidationRules::string
            ],
            'book-name' => [
                'isValid' => true,
                'rule' => ValidationRules::text
            ],
            'book-description' => [
                'isValid' => true,
                'rule' => ValidationRules::text
            ],
            'age-group' => [
                'isValid' => true,
                'rule' => ValidationRules::age
            ],
            'first-agreement' => [
                'isValid' => true,
                'rule' => ValidationRules::boolean
            ]
        ];
        $this->dbConnection = connectToDatabase();
    }

    public function __destruct() {
        closeDatabaseConnection($this->dbConnection);
    }

    public function getPostData() {
        foreach ($this->validation as $key => $value) {
            $clearData = $this->clearInput($_POST[$key]);
            $this->validation[$key]['isValid'] = $this->validator->valid($value['rule'], $clearData);
        }
    }

    public function getUserData(){
        $login = $_SESSION['login'];
        print_r($login);
        $user = $this->dbConnection->query("SELECT * FROM users WHERE login='{$_POST['login']}'");
        return mysqli_fetch_row($user)[0];
    }

    public function toCookie($data){
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                setcookie($key, $value);
            }
        }
    }

    public function isLogged(){
        return isset($_SESSION['isLogged']);
    }

    private function clearInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function isAllValid() {
        $validArray = array_map(array($this, 'flatValidation'), $this->validation);
        return array_reduce($validArray, array($this, 'multipleBoolean'), 1);
    }

    private function flatValidation($elem) {
        return $elem['isValid'];
    }

    private function multipleBoolean($acc, $elem) {
        return $acc * $elem;
    }

    public function isLoginUnique() {
        $result = $this->dbConnection->query("SELECT count(id) FROM users WHERE login='{$_POST['login']}'");
        return !mysqli_fetch_row($result)[0];
    }

    public function createUser() {
        $hash = $this->hashPassword($_POST['password']);
        $firstAgreement = $this->translateCheckboxToBoolean($_POST['first-agreement']);
        $secondAgreement = $this->translateCheckboxToBoolean($_POST['second-agreement']);

        return $this->dbConnection->query("INSERT INTO users SET login = '{$_POST['login']}',
                                                        password = '{$hash}',
                                                        firstName = '{$_POST['first-name']}',
                                                        lastName = '{$_POST['last-name']}',
                                                        monthName = '{$_POST['month']}',
                                                        email = '{$_POST['email']}',
                                                        phone = '{$_POST['phone']}',
                                                        interest = '{$_POST['interest']}',
                                                        bookName = '{$_POST['book-name']}',
                                                        bookDescription = '{$_POST['book-description']}',
                                                        ageGroup = '{$_POST['age-group']}',
                                                        firstAgreement = '{$firstAgreement}',
                                                        secondAgreement = '{$secondAgreement}'
                            ");
    }

    public function updateUser() {
        $hash = $this->hashPassword($_POST['password']);
        $firstAgreement = $this->translateCheckboxToBoolean($_POST['first-agreement']);
        $secondAgreement = $this->translateCheckboxToBoolean($_POST['second-agreement']);

        return $this->dbConnection->query("UPDATE users SET
                                                        password = '{$hash}',
                                                        firstName = '{$_POST['first-name']}',
                                                        lastName = '{$_POST['last-name']}',
                                                        monthName = '{$_POST['month']}',
                                                        email = '{$_POST['email']}',
                                                        phone = '{$_POST['phone']}',
                                                        interest = '{$_POST['interest']}',
                                                        bookName = '{$_POST['book-name']}',
                                                        bookDescription = '{$_POST['book-description']}',
                                                        ageGroup = '{$_POST['age-group']}',
                                                        firstAgreement = '{$firstAgreement}',
                                                        secondAgreement = '{$secondAgreement}'
                                                        WHERE
                                                        login = '{$_POST['login']}'
                            ");
    }

    private function hashPassword($password) {
        return hash('sha256', $password);
    }

    private function translateCheckboxToBoolean($checkboxValue) {
        return (int)($checkboxValue === 'on');
    }

    private function setUpCookie() {
        setcookie("SessionID", session_id());
    }
}