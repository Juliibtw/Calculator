<?php
// define variables and set to empty values
$fnumber = $snumber = $zeichen =$ergebnis = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["fnumber"])){
        $fnumberErr = "Bitte geben Sie eine Zahl an!";
    } else{
        $fnumber = test_input($_POST["fnumber"]);
    }
    if(empty($_POST["snumber"])){
        $snumberErr = "Bitte geben Sie eine Zahl an!";
    } else{
        $snumber = test_input($_POST["snumber"]);
    }
    if(empty($_POST["zeichen"])){
        $zeichenErr = "Bitte geben Sie ein Rechenzeichen an!";
    } else{
        $zeichen = test_input($_POST["zeichen"]);
    }  
}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}
settype($snumber, "integer");
settype($fnumber, "integer");
switch($zeichen){
    case "+":
        $ergebnis = $fnumber + $snumber;
        break;
    case "-":
        $ergebnis = $fnumber - $snumber;
        break;
    case "*":        
        $ergebnis = $fnumber * $snumber;
        break;
    case "/":
        $ergebnis = $fnumber / $snumber;
        break;
    default:
    echo "Error";
}
echo $ergebnis;
?>
<!Doctype html>
<html>
    <head><title>Taschenrechner</title></head>
    <body>
        <form method="post" action="default.php">
            <label for="fnumber">erste Zahl</label><br>
            <input type="number" id="fnumber" name="fnumber">
            <?php
            if(isset($fnumberErr)){
                echo '<span class="error">*'.$fnumberErr.'</span>';
            }
            ?>
            <br>
            <input type="radio" id="+" name="zeichen" value="+">
            <label for="+">+</label>
            <br>
            <input type="radio" id="-" name="zeichen" value="-">
            <label for="-">-</label><br>
            <input type="radio" id="*" name="zeichen" value="*">
            <label for="*">*</label><br>
            <input type="radio" id="/" name="zeichen" value="/">
            <label for="/">/</label>
            <?php
            if(isset($zeichenErr)){
                echo '<span class="error">*'.$zeichenErr.'</span>';
            }
            ?>
            <br>
            <label for="snumber">zweite Zahl</label><br>
            <input type="number" id="snumber" name="snumber"><br>
            <?php
            if(isset($snumberErr)){
                echo '<span class="error">*'.$snumberErr.'</span>';
            }
            ?>
            <input type="submit" value="berechnen">
        </form>
    </body>
</html>    


