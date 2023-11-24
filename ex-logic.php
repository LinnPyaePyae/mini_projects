<?php

$apiData = file_get_contents("http://forex.cbm.gov.mm/api/latest");
// echo $apiData;
$apiDatas = json_decode($apiData, true);

$rates = $apiDatas["rates"];
// echo "<pre>";
// print_r($rates);
// print_r($_POST);
?>


<!--  1 usd => mmk
 100usd * mmk rate (usd known)
 2 mmk => usd
 mmk/usd rate (usd know)
 3 usd => sgd
 usd => mmk => sgd -->

<?php

$foldername = "exchange-records";


if (isset($_POST["calc"])) :

    $amount = $_POST["amount"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    // print_r($from);

    $mmk  = $amount * str_replace(",", "", $rates[$from]);
    // echo $result;
    $result  = $mmk / str_replace(",", "", $rates[$to]);
    // echo $result;
    $showResult = round($result, 2);

    // $data = fopen("data", "a");
    // fwrite($data, $amount .  $from  . " to " . $showResult .  $to  . "\n");
    // fclose($data);

    $data = fopen("data", "a");
    fwrite($data, $amount .  $from  . " to " . $showResult . $to . "\n");
    fclose($data);

?>

    <div class="bg-light border-3 p-3 m-3">
        <p class="mb-0 text-black-50">
            From <?= $amount ?> <?= $from ?> to <?= $to ?>
        </p>
        <h1 class="fw-bold">
            <?= round($result, 2) ?>
            <?= $to ?>
        </h1>
    </div>

    <?php

    $json = json_encode(["amount" => $amount, "from" => $from, "to" => $to, "result" => $result]);

    if (!is_dir($foldername)) {
        mkdir($foldername);
    }

    $filename = "exchange" . uniqid() . ".json";
    $filestream = fopen($foldername . "/" . $filename, "w");
    fwrite($filestream, $json);
    fclose($filestream);



    ?>

<?php endif; ?>