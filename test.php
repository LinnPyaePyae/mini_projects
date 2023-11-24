<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "<pre>";
//     print_r($_FILES);
//     $dir = "store";
//     move_uploaded_file(
//         $_FILES["photo"]["tmp_name"],
//         $dir . "/" . uniqid() . "-" . $_FILES["photo"]["name"]
//     );
// }

$dir = "store";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    print_r($_FILES);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . "/" . uniqid() . "-" . $_FILES["photo"]["name"]);
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "<pre>";
    print_r($_FILES);
    move_uploaded_file($_FILES["photo"]["tmp_name"],$dir."/".uniqid()."-".$_FILES["photo"]["name"]);
}

// $json = json_encode(["width" => 100, "breadth" => 50, "area" => 150]);
// echo $json;
?>