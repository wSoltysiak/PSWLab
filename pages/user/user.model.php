<?php

include_once('utils/post-helpers.php');
include_once('utils/array-helper.php');

class UserModel {
    const COOKIENAME = "userStyles";
    const COOKIETIME = 3600;
    const COOKIEDEFAULT = [
        "firstname" => "John",
        "firstnameColor" => "Blue",
        "lastname" => "Doe",
        "lastnameColor" => "Green",
        "font" => "",
        "fontColor" => "Green",
    ];
    const COLORS = [
        "Green" => "#CDEE69",
        "Brown" => "#E09690",
        "Blue" => "#9CD9F0",
        "Grey" => "#AAA"
    ];

    public function isSaved(){
        return isset($_COOKIE['fontColor']);
    }

    public function autoReset(){
        if(!$this->isSaved()){
            $this->resetCookie();
        }
    }

    public function saveData($data){
        setcookie("firstname", $data['firstname'], time() + self::COOKIETIME);
        setcookie("firstnameColor", $data['firstname'], time() + self::COOKIETIME);
        setcookie("lastname", $data['firstname'], time() + self::COOKIETIME);
        setcookie("lastnameColor", "Green", time() + self::COOKIETIME);
        setcookie("font", "Green", time() + self::COOKIETIME);
        setcookie("fontColor", "Green", time() + self::COOKIETIME);
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

}