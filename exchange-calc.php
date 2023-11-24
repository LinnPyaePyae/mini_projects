<?php include_once "head.php"; ?>

<?php
require_once("./ex-logic.php");

?>

<div class="p-3">
    <h1>Exchange Calculator</h1>
    <form id="exform" method="post"></form>

    <div class="row g-3">
        <div class="col-12">
            <label for="">Amount</label>
            <input type="number" name="amount" form="exform" class="form-control" required>
        </div>
        <div class="col-6">
            <label for="" class="form-label">From Currency</label>
            <select name="from" id="" form="exform" class="form-select" required>
                <option value="">Choose</option>
                <?php foreach ($rates as $key => $value) : ?>
                    <option value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6">
            <label for="" class="form-label">To Currency</label>
            <select name="to" id="" form="exform" class="form-select" required>
                <option value="">Choose</option>
                <?php foreach ($rates as $key => $value) : ?>
                    <option value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary w-100 btn-lg" name="calc" form="exform">Calculate</button>
        </div>

        <div class="col-12">
            <h3>History</h3>
            <ul class="list-group">
                <?php
                foreach (file("data") as $l) :
                    // print_r(file("data"));
                ?>
                    <li class="list-group-item">
                        <?= $l ?>
                    </li>


                <?php endforeach; ?>

            </ul>
        </div>


    </div>

    <?php

    if (is_dir($foldername)) : ?>

        <?php
        $records = array_filter(scandir($foldername), fn ($f) => $f != "." && $f != "..");

        if (count($records)) :

        ?>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Result</th>
                        <th>Control</th>
                    </tr>
                </thead>

                <tobody>
                    <?php foreach ($records as $record) :
                        $currentfile = $foldername . "/" . $record;
                        $json = fopen($currentfile, "r");
                        $read = fread($json, filesize($currentfile));
                        $arr = json_decode($read, true);

                    ?>
                        <tr>
                            <td>
                                <?= $arr["amount"] ?>
                            </td>
                            <td>
                                <?= $arr["from"] ?>
                            </td>
                            <td>
                                <?= $arr["to"] ?>
                            </td>
                            <td>
                                <?= round($arr["result"], 2) ?> <?= $arr["to"] ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure to delete ?')" href="./delete-exchange.php?name=<?= $record ?>" class="btn btn-danger">Del</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tobody>
            </table>

        <?php endif; ?>
    <?php endif; ?>

</div>

<?php include_once "footer.php"; ?>