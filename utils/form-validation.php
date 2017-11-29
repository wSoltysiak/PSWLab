<?php
const PI = 3.14;
$palce = 4;
$palcePoWypadku = ((float)$palce) - 0.5;


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$formData = [
    "imie" => "",
    "nazwisko" => "",
    "miesiac" => "",
    "email" => "",
    "number" => "",
    "bookType" => "",
    "bookTitle" => "",
    "bookDescription" => "",
    "group" => ""
];

$formError = [
    "imie" => "",
    "nazwisko" => "",
    "miesiac" => "",
    "email" => "",
    "number" => "",
    "bookType" => "",
    "bookTitle" => "",
    "bookDescription" => "",
    "group" => ""
];

$numbersArray = [0, 5, 10, 22, 11, 123, 133, 112, 13];

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function has_next($array) {
    if (is_array($array)) {
        if (next($array) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function sumArray($array){
    $wynik = 0;
    for ($i = 0; $i <= count($array); $i++) {
        $wynik += $array[$i];
        echo "<br>";
    }
    return $wynik;
}
function printArrayFor($array){
    for ($i = 0; $i < count($array); $i++) {
        echo($array[$i]);
        echo "<br>";
    }
}
function printArrayForEach($array){
    foreach ($array as $value){
        echo($value);
        echo "<br>";
    }
}

function printArrayIterable($array){
    while(has_next($array)){
        echo(next($array));
        echo "<br>";
    }
    reset($array);
}

function calculate($radius){
    return $radius * PI;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["imie"])) {
        $formError["imie"] = "Brak imienia";
      } else {
        $formData["imie"] = test_input($_POST["imie"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $formData["imie"])) {
          $formError["imie"] = "Only letters and white space allowed";
        }
      }

  if (empty($_POST["nazwisko"])) {
    $formError["nazwisko"] = "Nazwisko jest wymagane";
  } else {
    $formData["nazwisko"] = test_input($_POST["nazwisko"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $formData["nazwisko"])) {
      $formError["nazwisko"] = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["miesiac"])) {
      $formError["miesiac"] = "Brak podanego miesiąca";
    } else {
      $formData["miesiac"] = test_input($_POST["miesiac"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $formData["miesiac"])) {
        $formError["miesiac"] = "Only letters and white space allowed";
      }
    }

  if (empty($_POST["email"])) {
    $formError["email"] = "Email jest wymagany";
  } else {
    $formData["email"] = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $formError["email"] = "Niepoprawny email";
    }
  }

  printArrayFor($numbersArray);
  printArrayForEach($formData);
  printArrayIterable($formData);

    $calculated = calculate(4);

  echo "Długość okręgu z promieniem 4 to $calculated";
  echo "<br>";

}else{
     die("ERROR 404");
}
?>