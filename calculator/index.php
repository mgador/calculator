<?php 
session_start();
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = '';
}

if (isset($_POST['calcuInput'])) {
    require_once('calculator.php');
    $calc = new Calculator();
    if ($calc->checkInput($_POST['calcuInput'])) {
        $_SESSION['total'] = $calc->calculate($_POST['calcuInput']);
        require_once('connection.php');
        $sql = 'INSERT INTO total VALUES ('. $_SESSION['total'] .')';
        $conn->query($sql);
    } else {
        $_SESSION['total'] = "Invalid Input";
    }
    unset($_POST['calcuInput']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    
    <form id="calculator" method="post" action="">
        <input type="text" id="calcuInput" name="calcuInput" value="<?php echo $_SESSION['total']?>">
        <input type="button" class="operators" value="+">
        <input type="button" class="operators" value="-">
        <input type="button" class="operators" value="*">
        <input type="button" class="operators" value="/">
        <input type="button" id="clearBtn" value="C">
        <button type="submit" id="submitBtn">=</button>
        <br>
        <input type="button" class="numbers" value="1">
        <input type="button" class="numbers" value="2">
        <input type="button" class="numbers" value="3">
        <br>
        <input type="button" class="numbers" value="4">
        <input type="button" class="numbers" value="5">
        <input type="button" class="numbers" value="6">
        <br>
        <input type="button" class="numbers" value="7">
        <input type="button" class="numbers" value="8">
        <input type="button" class="numbers" value="9">
        <input type="button" class="numbers" value="0">
    </form>
    <script src="script.js"></script>
</body>
</html>