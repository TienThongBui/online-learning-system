<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/db_connection.php';
    require_once '../includes/login.view.inc.php';
    $date = date("Y-m-d H:i:s");

    $_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<style>
    .main {
        margin-left: 65px;
        padding: 0px 10px; 
    }    

    #countdowntimer {
        display: block;
    }
</style>
<body>
    <div class="main">
        <?php
            $correct = 0;
            $wrong = 0;

            if(isset($_SESSION["answer"])) 
            {
                for($i = 1; $i <= sizeof($_SESSION["answer"]); $i++)
                {
                    $answer = "";
                    $stmt= $pdo -> query("select * from exam_question where category_title= '$_SESSION[exam_category]' && question_no=$i");
                    while($row = $stmt -> fetch(PDO::FETCH_BOTH))
                    {
                        $answer = $row["answer"];
                    }

                    if(isset($_SESSION["answer"][$i]))
                    {
                        if($answer==$_SESSION["answer"][$i])
                        {
                            $correct = $correct + 1;
                        }
                        else
                        {
                            $wrong = $wrong + 1;
                        }
                    }
                    else
                    {
                        $wrong = $wrong + 1;
                    }
                }
            }

            $count = 0;
            $stmt2 = $pdo -> query("select * from exam_question where category_title= '$_SESSION[exam_category]'");
            $count = $stmt2 -> rowCount();
            $wrong = $count - $correct;

            echo "<br>"; echo "<br>";

            echo "<center>";

            echo "Total Questions=".$count;
            echo "<br>";
            echo "Total Correct=".$correct;
            echo "<br>";
            echo "Total Wrong=".$wrong;

            echo "<center>";

        ?>
    </div>

<?php
    if(isset($_SESSION["exam_start"]))
    {
        $date = date("Y-m-d");
        $stmt3 = $pdo -> query("insert into exam_results (username, exam_type, total_question, correct_answer, wrong_answer, exam_time) 
        values ('$_SESSION[user_id]', '$_SESSION[exam_category]', '$count', '$correct', '$wrong', '$date')");
    }

    if(isset($_SESSION["exam_start"]))
    {
        unset($_SESSION["exam_start"])
        ?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
<?php
    }

?>




</body>
</html>