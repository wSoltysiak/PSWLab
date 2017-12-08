<?php

include_once('form.validator.php');
include_once('utils/validation-rules.php');
include_once('utils/post-helpers.php');
include_once('utils/database-helpers.php');

class FormModel {

    public $validation;
    public $isUniqueError = false;
    private $validator;
    private $dbConnection;

    public function __construct() {
        $this->validator = new FormValidator();
        $this->validation = [
            'login' => [
                'isValid' => false,
                'rule' => ValidationRules::string
            ],
            'password' => [
                'isValid' => false,
                'rule' => ValidationRules::password
            ],
            'first-name' => [
                'isValid' => false,
                'rule' => ValidationRules::string
            ],
            'last-name' => [
                'isValid' => false,
                'rule' => ValidationRules::string
            ],
            'month' => [
                'isValid' => false,
                'rule' => ValidationRules::month
            ],
            'email' => [
                'isValid' => false,
                'rule' => ValidationRules::email
            ],
            'phone' => [
                'isValid' => false,
                'rule' => ValidationRules::phone
            ],
            'interest' => [
                'isValid' => false,
                'rule' => ValidationRules::string
            ],
            'book-name' => [
                'isValid' => false,
                'rule' => ValidationRules::text
            ],
            'book-description' => [
                'isValid' => false,
                'rule' => ValidationRules::text
            ],
            'age-group' => [
                'isValid' => false,
                'rule' => ValidationRules::age
            ],
            'first-agreement' => [
                'isValid' => false,
                'rule' => ValidationRules::boolean
            ],
            'second-agreement' => [
                'isValid' => false,
                'rule' => ValidationRules::boolean
            ],
        ];
        $this->dbConnection = connectToDatabase();
    }

    public function __destruct() {
        closeDatabaseConnection($this->dbConnection);
    }

    public function getPostData() {
        if (isPostRequest()) {
            foreach ($this->validation as $key => $value) {
                $clearData = $this->clearInput($_POST[$key]);
                $this->validation[$key]['isValid'] = $this->validator->valid($value['rule'], $clearData);
            }
        }
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

        $this->dbConnection->query("INSERT INTO users SET login = '{$_POST['login']}',
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

    private function hashPassword($password) {
        return hash('sha256', $password);
    }

    private function translateCheckboxToBoolean($checkboxValue) {
        return $checkboxValue === 'on';
    }
}