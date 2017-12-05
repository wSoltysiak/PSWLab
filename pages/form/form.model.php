<?php

include_once('form.validator.php');
include_once('utils/validation-rules.php');
include_once('utils/post-helpers.php');

class FormModel {

    public $validation;
    private $validator;
    public function __construct() {
        $this->validator = new FormValidator();
        $this->validation = [
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
            ],
            'second-agreement' => [
                'isValid' => true,
                'rule' => ValidationRules::boolean
            ],
        ];
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
}

?>