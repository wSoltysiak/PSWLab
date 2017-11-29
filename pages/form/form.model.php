<?php

include_once('form.validator.php');

class FormModel {

    // TODO: wydzielić rules do enuma
    private $validation;
    private $validator;

    public function __construct() {
        $this->validator = new FormValidator();
        $this->validation = [
            'first-name' => [
                'isValid' => true,
                'rule' => 'string'
            ],
            'last-name' => [
                'isValid' => true,
                'rule' => 'string'
            ],
            'month' => [
                'isValid' => true,
                'rule' => 'month'
            ],
            'email' => [
                'isValid' => true,
                'rule' => 'email'
            ],
            'phone' => [
                'isValid' => true,
                'rule' => 'phone'
            ],
            'interest' => [
                'isValid' => true,
                'rule' => 'string'
            ],
            'book-name' => [
                'isValid' => true,
                'rule' => 'text'
            ],
            'book-description' => [
                'isValid' => true,
                'rule' => 'text'
            ],
            'age-group' => [
                'isValid' => true,
                'rule' => 'age'
            ],
            'first-agreement' => [
                'isValid' => true,
                'rule' => 'boolean'
            ],
            'second-agreement' => [
                'isValid' => true,
                'rule' => 'boolean'
            ],
        ];
    }

    public function getPostData() {
        if ($this->isPostRequest()) {
            foreach ($this->validation as $key => $value) {
                $clearData = $this->clearInput($_POST[$key]);
                $this->validation[$key]['isValid'] = $this->validator->valid($value['rule'], $clearData);
            }
        }
    }

    private function isPostRequest() {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }

    private function clearInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>