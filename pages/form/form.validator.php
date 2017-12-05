<?php

include_once('utils/validation-rules.php');

class FormValidator {
    public function valid($rule, $data) {
        switch ($rule) {
            case ValidationRules::string:
                return $this->validString($data);
            case ValidationRules::text:
                return $this->validText($data);
            case ValidationRules::month:
                return $this->validMonth($data);
            case ValidationRules::email:
                return $this->validEmail($data);
            case ValidationRules::phone:
                return $this->validPhone($data);
            case ValidationRules::age:
                return $this->validAge($data);
            case ValidationRules::boolean:
                return $this->validBoolean($data);
            default:
                return false;
        }
    }

    private function validString($data) {
        return preg_match("/^[a-zA-Z]+$/", $data) == 1;
    }

    private function validText($data) {
        return preg_match("/^[a-zA-Z0-9]+$/", $data) == 1;
    }

    private function validMonth($data) {
        $months = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Paździenik', 'Listopad', 'Grudzień'];
        return in_array($data, $months);
    }

    private function validEmail($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL) != false;
    }

    private function validPhone($data) {
        return preg_match("/^\d{3} \d{3} \d{3}$/", $data) == 1;
    }

    private function validAge($data) {
        $ageGroups = ['teenager', 'adult', 'senior'];
        return in_array($data, $ageGroups);
    }

    private function validBoolean($data) {
        return strcmp($data, 'on') == 0;
    }
}

?>