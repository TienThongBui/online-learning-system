<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
?>


<?php
$id = $_GET['qid'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>

<body>

    <form method="post">
        <table>
            <tr>
                <td><input type="radio" name="rl" id="rl" value="a" />a</td>
            </tr>
            <tr>
                <td><input type="radio" name="rl" id="rl" value="b" />b</td>

            </tr>
            <tr>
                <td><input type="radio" name="rl" id="rl" value="c" />c</td>
            </tr>
            <tr>
                <td><input type="radio" name="rl" id="rl" value="d" />d</td>

            </tr>
            <tr>
                <td><input type="text" name="answer" id="answer" /></td>

            </tr>

            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>

<a href="result.php">Result</a>


    <?php
    if (isset($_POST['submit'])) {
        $rl = $_POST['rl'];
        $answer = $_POST['answer'];

        $query = "insert into testradio (rl, answer) values 
        ('$rl', '$answer');";
        $result = $conn->query($query);
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>