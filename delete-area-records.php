<?php
// echo "Hello Welcome";
// print_r($_GET);
// $filePath = "area-records/" . $_GET["name"];
// echo $filePath;

// if (is_file($filePath)) {
//     unlink($filePath);
// }

// header("Location:area-calc.php");

$filePath = "area-records/".$_GET["name"];
if(is_file($filePath)){
    unlink($filePath);
}

header("Location:area-calc.php");

?>
