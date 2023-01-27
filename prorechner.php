<?php
// define variables and set to empty values
$input =  $ergebnis = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["inputfeld"])){
        $inputErr = "Bitte geben sie eine gültige Rechnung an!";
    } else{
        $input = test_input($_POST["inputfeld"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}
$calc = explode(" ", $input);
if(count($calc) != 3){
    echo "Bitte geben sie eine gültige Rechnung ein.";

}else{
switch( $calc[1]){
    case "+":
        $ergebnis =  $calc[0]+ $calc[2];
        break;
    case "-":
        $ergebnis =  $calc[0] -  $calc[2];
        break;
    case "*":        
        $ergebnis =  $calc[0] *  $calc[2];
        break;
    case "/":
        if($calc[2] == 0){
            echo "Division durch null nicht möglich!";
            break;
        }
        $ergebnis =  $calc[0] /  $calc[2];
        break;
    default:
    echo "Error";
}
echo $ergebnis;
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form method="post" action="prorechner.php">
            <label for="fnumber">Bitte geben Sie Ihre Rechnung ein!</label><br>
            <input type="text" id="inputfeld" name="inputfeld"><br>
            <?php
            if(isset($inputErr)){
                echo '<span class="error">*'.$inputErr.'</span><br>';
            }
            ?>
            <input type="submit" value="berechnen">
        </form>
    </body>
</html>