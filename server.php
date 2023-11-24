<?php
// print_r($_POST);
// $area = $_POST["width"] * $_POST["breadth"];
// echo "width {$_POST["width"]} * breadth {$_POST["breadth"]} =$area sqft";
?>

<?php //print_r($_POST); 
?>

<?php

$folderName = 'area-records';

$width = $_POST["width"];
$breadth = $_POST["breadth"];
$area = area($width, $breadth);

if (isset($_POST["calc_form"])) : ?>

    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Width</th>
                <th>Breadth</th>
                <th>Area</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $width ?> ft</td>
                <td><?= $breadth ?> ft</td>
                <td><?= $area ?> sqft</td>
            </tr>
        </tbody>
    </table>

    <br>

    <?php
    // $json = json_encode(["width" => $width, "breadth" => $breadth, "area" => $area]);
    
    // if (!is_dir($folderName)) {
    //     mkdir($folderName);
    // }


    // $fileName = "record" . uniqid() . ".json";
    // $filestream = fopen($folderName . "/" . $fileName, "w");
    // fwrite($filestream, $json);
    // fclose($filestream);

    $json = json_encode(["width"=>$width,"breadth"=>$breadth,"area"=>$area]);
    if(!is_dir($folderName)){
        mkdir($folderName);
    }

    $fileName = "record". uniqid() . ".json";
    $stream = fopen($folderName."/".$fileName,"w");
    fwrite($stream,$json);
    fclose($stream);


    ?>

<?php endif; ?>