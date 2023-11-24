<?php

$friends = [];
$dataFileName = "friend-data.json";

if (file_exists($dataFileName) && filesize($dataFileName)) {
    // echo "file shi tal";
    $friends = json_decode(file_get_contents($dataFileName), true);
    // echo file_get_contents($dataFileName);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    print_r($_FILES);
    // print_r($_REQUEST);

    // file upload မှအလုပ်လုပ်မှာ
    if ($_FILES["fri_photo"]["error"] === 0) {

        $dir = "friend-zone";
        $newName = $dir . "/" . uniqid() . "-" . "friend" . "." . pathinfo($_FILES["fri_photo"]["name"])["extension"];

        // echo $newName;

        move_uploaded_file($_FILES["fri_photo"]["tmp_name"], $newName);


        $fdata = fopen("fdata.json", "a");

        $info = $_POST; //post method ထဲက array information အကုန်
        //array အခန်းသစ်ထပ်ထည့် 
        $info["photo"] = $newName;

        array_push($friends, $info);
        // print_r($friends);

        $fdata = fopen($dataFileName, "w");
        fwrite($fdata, json_encode($friends));

        fclose($fdata);

        // header("Location:fri-card.php");

        // $infotext = json_encode($info);
        // echo $infotext;
        // fwrite($fdata, $infotext);
        // fclose($fdata);

        // $nameArr = explode(".", $_FILES["fri_photo"]["name"]);
        // print_r(end($nameArr));

        // print_r(pathinfo($_FILES["fri_photo"]["name"]));

        
    }
}




?>