<?php
declare(strict_types=1);
require_once "DBList.php";
$data = new DBList();


if (isset($_POST['co_robit']) && isset($_POST['stav'])) {
    $data->vytvorUlohu($_POST['co_robit'], $_POST['stav']);
}

if (isset($_POST['delete'])) {
    $data->vymazUlohu($_POST['delete']);
}

if (isset($_POST['update'])) {
    $data->editujUlohu($_POST['update'], $_POST['co'], $_POST['stav']);
}


$listUloh = $data->getData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TO DO!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="white">

<div class="logo white"><h1>TO DO!</h1></div>
<a href="index.html">
    <div class="logo"><h1>#click me#</h1>
    </div>
</a>


<div class="blok login" style="text-align: right">
    <form method="post">
        <p>
            <label>Čo robit </label> <br>
            <input type="text" name="co_robit" required>
        </p>
        <p>
            <label>Stav</label><br>
            <input type="text" name="stav" required>
        </p>
        <p>
            <input type="submit" value="add">
        </p>
    </form>
</div>

<div class="logo white">
    <table class="tabulka-todo" width="100%">
        <tr>
            <th>#</th>
            <th>čo</th>
            <th>stav</th>
        </tr>
        <?php
        foreach ($listUloh as $uloha) {
            ?>
            <tr>
                <form method="post">
                    <td><?= $uloha->getId() ?></td>

                    <td>
                        <input type="text" name="co" value="<?= $uloha->getCoRobit() ?>">
                    </td>
                    <td>
                        <input type="text" name="stav" value="<?= $uloha->getStav() ?>">
                    </td>
                    <td style="width: 41px">
                        <input type="hidden" name="update" value="<?= $uloha->getId() ?>">
                        <input type="submit" value="update">
                    </td>
                </form>

                <td style="width: 41px">
                    <form method="post">
                        <input type="hidden" name="delete" value="<?= $uloha->getId() ?>">
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>

<a href="index.html">
    <div class="logo"><h1>#click me#</h1></div>
</a>


</body>
</html>