<?php
$friends = [];
$dataFileName = "friend-data.json";
if (file_exists($dataFileName) && filesize($dataFileName)) {
    $friends = json_decode(file_get_contents($dataFileName), true);
}

array_splice($friends, $_GET["index"], 1);

file_put_contents($dataFileName, json_encode($friends));
//In PHP, file_put_contents() is a function that allows you to write data to a file. It creates the file if it doesn't exist, and overwrites its contents if it does. 

header("Location:fri-card.php");

?>