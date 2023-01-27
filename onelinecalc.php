<?php
// define variables and set to empty values
$input =  $result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["inputfield"])){
        $inputErr = "Please enter a correct calculation!";
    } else{
        $input = test_input($_POST["inputfield"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}
$calc = explode(" ", $input);
if(count($calc) != 3){
    echo "Please enter a correct calculation";

}else{
switch( $calc[1]){
    case "+":
        $result =  $calc[0]+ $calc[2];
        break;
    case "-":
        $result =  $calc[0] -  $calc[2];
        break;
    case "*":        
        $result =  $calc[0] *  $calc[2];
        break;
    case "/":
        if($calc[2] == 0){
            echo "Division by zero not possible!";
            break;
        }
        $result =  $calc[0] /  $calc[2];
        break;
    default:
    echo "Error";
}
echo $result;
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form method="post" action="prorechner.php">
            <label for="fnumber">Please enter your calculation!</label><br>
            <input type="text" id="inputfeld" name="inputfield"><br>
            <?php
            if(isset($inputErr)){
                echo '<span class="error">*'.$inputErr.'</span><br>';
            }
            ?>
            <input type="submit" value="calculate">
        </form>
    </body>
</html>
