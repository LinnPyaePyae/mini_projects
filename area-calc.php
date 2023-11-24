<?php include_once "head.php"; ?>

<div class="p-3">
    <h1>Area Calculator</h1>

    <?php include_once("server.php"); ?>

    <form method="post">
        <div class="row">
            <div class="col">
                <input type="number" name="width" class="form-control" placeholder="Width" required>
            </div>

            <div class="col">
                <input type="number" name="breadth" class="form-control" placeholder="Breadth" required>
            </div>

            <div class="col">
                <button name="calc_form" class="btn btn-primary">Calculate</button>
            </div>
        </div>
    </form>

   

    <?php

    if(is_dir($folderName)): ?>

    <?php 
    $records = array_filter(scandir($folderName), fn($r)=> $r!="." && $r != ".." );

        // print_r($records);

    if (count($records)) :
    ?>

    <table class="table table-bordered mt-3 ">
        <thead>
            <tr>
                <th>Width</th>
                <th>Breadth</th>
                <th>Area</th>
                <th>Control</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($records as $record) :
                $currentfile = $folderName."/".$record;
                $stream = fopen($currentfile,"r");
                $j =  fread($stream,filesize($currentfile));
                $arr = json_decode($j,true);
            ?>
            <tr>
                <td><?= $arr["width"] ?> ft</td>
                <td><?= $arr["breadth"] ?> ft</td>
                <td><?= $arr["area"] ?> sqft</td>
                <td>
                    <a onclick="return confirm('Are you sure to delete')" href="delete-area-records.php?name=<?= $record ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>

    <?php endif;?>

    <?php endif; ?>



</div>

<?php include_once "footer.php"; ?>