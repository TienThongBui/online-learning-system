<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Display exam</title>
</head>

<body>
    <?php
    $query = 'select * from exam_question';
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $question_id = $row['qid'];
        $question_no = $row['question_no'];
        $question_name = $row['question_name'];
        $video_name = $row['video_url'];
        $audio_name = $row['audio_url'];
        $opt1 = $row['opt1'];
        $opt2 = $row['opt2'];
        $opt3 = $row['opt3'];
        $opt4 = $row['opt4'];
        $level = $row['level'];
        $category_title = $row['category_title'];

        ?>
        <table>
            <tr>
                <td style="font-weight: bold; font-size: 20px; padding-left: 5px" colspan="2">
                    <a href="test2.php?qid=<?php echo $question_id ?>"><?php echo $question_id ?></a>
                    <?php echo $question_no ?>
                    <?php echo $question_name ?>

                    <?php
                    if ($video_name !== '') {
                        ?>
                        <video src="../uploads<?= $video_name ?>" style="width:50%; height:50%;" controls></video>
                        <?php
                    }
                    ?>

                    <?php
                    if ($audio_name !== '') {
                        ?>
                        <audio src="../uploads<?= $audio_name ?>" controls></audio>
                        <?php
                    }
                    ?>

                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>"
                        onclick="radioclick(this.value, <?php echo $question_no ?>)">




                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?> "
                        onclick="radioclick(this.value, <?php echo $question_no ?>)">

                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>"
                        onclick="radioclick(this.value, <?php echo $question_no ?>)">


                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>"
                        onclick="radioclick(this.value, <?php echo $question_no ?>)">
                </td>
            </tr>
        </table>

        <?php
    }
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>