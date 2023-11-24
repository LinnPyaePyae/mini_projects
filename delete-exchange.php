<?php
// echo "hello";
// print_r($_GET);
$filepath = "exchange-records/" . $_GET["name"];


if (is_file($filepath)) {
    unlink($filepath);
}

header("Location:exchange-calc.php");

?>
