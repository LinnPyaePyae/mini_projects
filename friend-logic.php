<?php

$friends = [];
$dataFileName = "friend-data.json";

if (file_exists($dataFileName) && filesize($dataFileName)) {
    // echo 'file shi dal';
    $friends = json_decode(file_get_contents($dataFileName), true);
    // echo "<pre>";
    // print_r($friends);
    // echo "<pre>";
    // var_dump(file_get_contents($dataFileName));
    //file_get_contents will return string [{}] and change it to decode array
   
    //this become array in array [[]] and changing  friends array to encode will return [{}] so in friend-data.json it display[{}]
    // $file = json_decode((file_get_contents($dataFileName)), true);
    // print_r($file);
    
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dir = "friend-zone";
    echo "<pre>";
    print_r($_FILES);

    if ($_FILES["fri_photo"]["error"] === 0) {

        $newname = $dir . "/" . uniqid() . "-" . "friend" . "." . pathinfo($_FILES["fri_photo"]["name"])["extension"];

        // echo $newname;

        move_uploaded_file($_FILES["fri_photo"]["tmp_name"], $newname);

        // $name = explode(".", $_FILES["fri_photo"]["name"]);
        // // print_r(end($name));

        // print_r(pathinfo($_FILES["fri_photo"]["name"])["extension"]);


        $info = $_POST;
        $info["photo"] = $newname;
        // print_r($info);

        array_push($friends, $info);
        //[[]] array in array

        // var_dump($friends);
        // print_r($friends);

        // echo json_encode($friends);
        //result = [{"fri_name":"hla hla","fri_phone":"0998754122","fri_address":"aa","photo":"friend-zone\/643a234573ef4-friend.jpg"}]
        //encoding [[]] array in array is [{}]


        $fdata = fopen($dataFileName, "w"); //"a" mode isn't okay
        fwrite($fdata, json_encode($friends));
        fclose($fdata);


        // header("Location:fri-card.php");


        // $infotext = json_encode($info);
        // echo $infotext;
        // $fdata = fopen("fdata.json", "a");
        // fwrite($fdata, $infotext);
        // fclose($fdata);

        
    }
}

?>
