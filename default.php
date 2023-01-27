<?php
// define variables and set to empty values
$fnumber = $snumber = $sign =$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["fnumber"])){
        $fnumberErr = "Please enter a number!";
    } else{
        $fnumber = test_input($_POST["fnumber"]);
    }
    if(empty($_POST["snumber"])){
        $snumberErr = "Please enter a number!";
    } else{
        $snumber = test_input($_POST["snumber"]);
    }
    if(empty($_POST["sign"])){
        $signErr = "Please enter a calculation sign!";
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
switch($sign ){
    case "+":
        $result = $fnumber + $snumber;
        break;
    case "-":
        $result = $fnumber - $snumber;
        break;
    case "*":        
        $result = $fnumber * $snumber;
        break;
    case "/":
        $result = $fnumber / $snumber;
        break;
    default:
    echo "Error";
}
echo $result;
?>
<!Doctype html>
<html>
    <head><title>Calculator</title></head>
    <body>
        <form method="post" action="default.php">
            <label for="fnumber">first Number</label><br>
            <input type="number" id="fnumber" name="fnumber">
            <?php
            if(isset($fnumberErr)){
                echo '<span class="error">*'.$fnumberErr.'</span>';
            }
            ?>
            <br>
            <input type="radio" id="+" name="sign" value="+">
            <label for="+">+</label>
            <br>
            <input type="radio" id="-" name="sign" value="-">
            <label for="-">-</label><br>
            <input type="radio" id="*" name="sign" value="*">
            <label for="*">*</label><br>
            <input type="radio" id="/" name="sign" value="/">
            <label for="/">/</label>
            <?php
            if(isset($zeichenErr)){
                echo '<span class="error">*'.$signErr.'</span>';
            }
            ?>
            <br>
            <label for="snumber">second number</label><br>
            <input type="number" id="snumber" name="snumber"><br>
            <?php
            if(isset($snumberErr)){
                echo '<span class="error">*'.$snumberErr.'</span>';
            }
            ?>
            <input type="submit" value="calculate">
        </form>
    </body>
</html>    


