<?php

class FormModel {

    // TODO: wydzielić rules do enuma
    private $validation;

    public function __construct() {
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
                // TODO: zamienić na tablicę z metodami
                switch ($value['rule']) {
                    case 'string':
                        $this->validation[$key]['isValid'] = $this->validString($clearData);
                        break;
                    case 'text':
                        $this->validation[$key]['isValid'] = $this->validText($clearData);
                        break;
                    case 'month':
                        $this->validation[$key]['isValid'] = $this->validMonth($clearData);
                        break;
                    case 'email':
                        $this->validation[$key]['isValid'] = $this->validEmail($clearData);
                        break;
                    case 'phone':
                        $this->validation[$key]['isValid'] = $this->validPhone($clearData);
                        break;
                    case 'age':
                        $this->validation[$key]['isValid'] = $this->validAge($clearData);
                        break;
                    case 'boolean':
                        $this->validation[$key]['isValid'] = $this->validBoolean($clearData);
                        break;
                    default:
                        $this->validation[$key]['$isValid'] = false;
                }
            }
        }

        print_r($this->validation);
    }


    // TODO: wydzielić do osobnej klasy
    private function validString($data) {
        return preg_match("/^[a-zA-Z0]+$/", $data) == 1;
    }

    private function validText($data) {
        return true;
    }

    private function validMonth($data) {
        return true;
    }

    private function validEmail($data) {
        return true;
    }

    private function validPhone($data) {
        return true;
    }

    private function validAge($data) {
        return true;
    }

    private function validBoolean($data) {
        return true;
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