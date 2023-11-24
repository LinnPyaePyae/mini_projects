<?php
$friends = [];
$dataFileName = "friend-data.json";
if (file_exists($dataFileName) && filesize($dataFileName)) {
    $friends = json_decode(file_get_contents($dataFileName), true);
}

// print_r($friends[$_GET["index"]]);

?>




<div class="card mb-3">
    <div class="card-body text-center">
        <img src="<?= $friends[$_GET["index"]]["photo"] ?>" alt="" class="rounded-circle" width="100" height="100">
        <h4><?= $friends[$_GET["index"]]["fri_name"] ?></h4>
        <p><?= $friends[$_GET["index"]]["fri_phone"] ?></p>
        <a href="./fri-detail.php?index=<?= $key ?>" class="btn btn-primary w-100 d-block">Detail</a>
    </div>

</div>