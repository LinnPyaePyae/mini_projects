<?php require_once("head.php");

?>


<h1 class="m-3">Create Friend Card</h1>
<form action="./fri-logic.php" method="post" enctype="multipart/form-data" class="m-3">
    <div class="mb-3">
        <label for="" class="form-label">Friend Name</label>
        <input type="text" class="form-control w-100" name="fri_name" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Friend Phone</label>
        <input type="number" name="fri_phone" class="form-control w-100" required>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Friend Address</label>
        <textarea rows="10" class="form-control" name="fri_address" required></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Friend Photo</label>
        <input type="file" accept="image/jpeg,image/png" class="form-control w-100" name="fri_photo" required>

    </div>

    <div class="form-check mb-3">
        <input type="checkbox" id="isreal" value="yes" class="form-check-input">
        <label for="isreal" class="form-check-label">Real Friend</label>
    </div>

    <button class="btn btn-primary w-100">Create Friend List</button>


    <div class="my-5">
        <?php
        $dataFileName = "friend-data.json";
        $friends = json_decode(file_get_contents($dataFileName), true);

        ?>

        <?php foreach ($friends as $key => $friend) : ?>
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="<?= $friend["photo"] ?>" alt="" class="rounded-circle" width="100" height="100">
                    <h4><?= $friend["fri_name"] ?></h4>
                    <p><?= $friend["fri_phone"] ?></p>
                    <a href="./fri-detail.php?index=<?= $key ?>" class="btn btn-primary w-100 d-block">Detail</a>
                    <a href="./fri-del.php?index=<?= $key ?>" class="btn btn-danger w-100 d-block">Delete</a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    </div>

</form>