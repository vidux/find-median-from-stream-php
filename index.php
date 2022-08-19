<?php
session_start();
require_once('FindMedian.php');


$medianFind = new FindMedian($_SESSION['array_data'] ?? []);

$number = $_POST['number'] ?? null;

//reset ression
if (isset($_POST['reset_stack'])) {

    session_destroy();

    header("Location: index.php");
    die();
}


if (floatval($number) > 0) {

    if (isset($_POST['remove_num'])) {
        try {
            $medianFind->remNum(floatval($number));
        } catch (\Throwable $th) {
            //throw $th;
        }
    } else {
        $medianFind->addNum(floatval($number));
    }


    $_SESSION['array_data'] = $medianFind->getArray();
    header("Location: index.php");
    die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find median</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css">
    
</head>

<body>
    <div class="container" style="min-height: 82vh;">
        <section class="section">
            <form action="" method="post">
                <div class="field">
                    <label class="label"> Number</label>
                    <div class="control">
                        <input class="input" name="number" type="number" placeholder="enter number">
                    </div>
                </div>
                <button type="submit" class="button">Add Number</button>
                <button type="submit" name="remove_num" class="button">Remove Number</button>
                <button type="submit" name="reset_stack" class="button">Reset Stack</button>
            </form>
        </section>

        <section class="section" style="border-top:1px #939393 solid">
            <label class="label"> Curent Number Stack:</label>
            <p class="subtitle is-5">
                <?php
                echo (implode(',', $medianFind->getArray()));
                ?>
            </p>
            <label class="label"> Median of the Stack:</label>
            <p class="subtitle is-5">
                <?php
                echo ($medianFind->findMedian());
                ?>
            </p>

        </section>

    </div>



    <footer class="footer" style="background:#171920">
        <div class="content has-text-centered">
            <p>
                <a href="https://github.com/vidux/find-median-from-stream-php">Github</a>
            </p>
        </div>
    </footer>
</body>

</html>