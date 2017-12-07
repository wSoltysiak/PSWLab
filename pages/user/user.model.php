<?php

include_once('utils/post-helpers.php');
include_once('utils/array-helper.php');

class UserModel {
    const COOKIENAME = "userStyles";
    const COOKIETIME = 3600;
    const COOKIEDEFAULT = [
        "firstname" => "John",
        "firstnameColor" => "Grey",
        "lastname" => "Doe",
        "lastnameColor" => "Blue",
        "font" => "",
        "fontColor" => "Green",
    ];
    const COLORS = [
        "Blue" => "#CDEE69",
        "Brown" => "#E09690",
        "Green" => "#9CD9F0",
        "Grey" => "#333333"
    ];

    public function isSaved(){
        return isset($_COOKIE['fontColor']);
    }

    public function autoReset(){
        if(!$this->isSaved()){
            $this->resetCookie();
        }
    }

    public function read(){
        if(isPostRequest() && $this->correctValues()){
            foreach ($_POST as $key => $value){
                setcookie($key, $value, time() + self::COOKIETIME);
            }
        }
    }

    public function saveData($data){
        setcookie("firstname", $data['firstname'], time() + self::COOKIETIME);
        setcookie("firstnameColor", $data['firstnameColor'], time() + self::COOKIETIME);
        setcookie("lastname", $data['lastname'], time() + self::COOKIETIME);
        setcookie("lastnameColor", $data['lastnameColor'], time() + self::COOKIETIME);
        setcookie("font", $data['font'], time() + self::COOKIETIME);
        setcookie("fontColor", $data['fontColor'], time() + self::COOKIETIME);
    }

    public function loadData(){
        return $_COOKIE;
    }

    public function resetCookie(){
        foreach (SELF::COOKIEDEFAULT as $key => $element) {
            setcookie($key, $element, time() + self::COOKIETIME);
        }
    }

    public function generateCSS(){
        if(!$this->isSaved()){
            return "";
        }else{
            $css = "<style>";
            $css .= ".line1{";
                $css .= "color:";
                $css .= self::COLORS[$this->loadData()['firstnameColor']];
                $css .= ";";
            $css .= "}";

            $css .= ".line2{";
                $css .= "color:";
                $css .= self::COLORS[$this->loadData()['lastnameColor']];
                $css .= ";";
            $css .= "}";

            $css .= ".line3{";
                $css .= "color:";
                $css .= self::COLORS[$this->loadData()['fontColor']];
                $css .= ";";
            $css .= "}";

            $css .= "</style>";

            return $css;
        }
    }

    public function correctValues(){
        foreach (self::COOKIEDEFAULT as $key => $value){
            if(!isset($_POST[$key])){
                echo "Niepoprawne wartości";
                return false;
            }
        }
        return true;
    }

}