<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/db_connection.php';

    $question_no = "";
    $question = "";
    $opt1 = "";
    $opt2 = "";
    $opt3 = "";
    $opt4 = "";
    $answer = "";
    $count = 0;
    $ans = "";
    $queno = $_GET['questionNo'];

    if(isset($_SESSION["answer"][$queno]))
    {
        $ans=$_SESSION["answer"][$queno];
    }

    $stmt = $pdo->query("select * from exam_audio where category_title='$_SESSION[exam_category]' && question_no= $_GET[questionNo]");
    $count = $stmt -> rowCount();

    if($count == 0)
    {
        echo "over";
    }
    else
    {
        while($row = $stmt->fetch(PDO::FETCH_BOTH))
        {
            $question_no = $row['question_no'];
            $question = $row['audio_url'];
            $opt1 = $row['opt1'];
            $opt2 = $row['opt2'];
            $opt3 = $row['opt3'];
            $opt4 = $row['opt4'];
        }

        ?>
    <br>
    <table>
        <tr>
            <td style="font-weight: bold; font-size: 20px; padding-left: 5px" colspan="2">
                <?php
                    echo " ( ". $question_no ." ) " ?> 
                    <audio src="../uploads/<?=$question?>" controls></audio> 
              
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td><input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)">
                
                 
                    <?php
                        if($ans == $opt1)
                        {
                            echo "Checked";
                        }
                    ?>
               

            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?> " onclick="radioclick(this.value, <?php echo $question_no ?>)"
                
                    <?php
                        if($ans==$opt2)
                        {
                            echo "Checked";
                        }
                    ?>> <?php echo $opt2 ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                
                    <?php
                        if($ans==$opt3)
                        {
                            echo "Checked";
                        }
                    ?>> <?php echo $opt3 ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                
                    <?php
                        if($ans==$opt4)
                        {
                            echo "Checked";
                        }
                    ?>> <?php echo $opt4 ?>
            </td>
        </tr>
    </table>


    


<?php } ?>
