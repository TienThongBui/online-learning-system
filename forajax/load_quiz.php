<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';

$quiz_no = "";
$quiz_name = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";
$queno = $_GET['questionNo'];

if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}


$query = "select * from quiz where quiz_level = '$_SESSION[quiz_level]' && quiz_no = $_GET[questionNo]";
$result = $conn->query($query);
$count = mysqli_num_rows($result);

if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($result)) {
        $quiz_no = $row['quiz_no'];
        $quiz_name = $row['quiz_name'];
        $opt1 = $row['opt1'];
        $opt2 = $row['opt2'];
        $opt3 = $row['opt3'];
        $opt4 = $row['opt4'];
    }

    ?>
    <div class="question-container">
        <h1 id="display-question">
            <?php echo $quiz_name ?>
        </h1>
    </div>

    <div class="options-container">
        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt1) {
                       echo "Checked";
                   }
                   ?>>
            <label for="option-one" class="option" id="option-one-label">
                <?php echo $opt1; ?>
            </label>

        </span>

        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt2) {
                       echo "Checked";
                   }
                   ?>>
            <label for="option-one" class="option" id="option-one-label">
                <?php echo $opt2; ?>
            </label>

        </span>

        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt3) {
                       echo "Checked";
                   }
                   ?>>
            <label for="option-one" class="option" id="option-one-label">
                <?php echo $opt3; ?>
            </label>

        </span>

        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt4) {
                       echo "Checked";
                   }
                   ?>>
            <label for="option-one" class="option" id="option-one-label">
                <?php echo $opt4; ?>
            </label>

        </span>

       

       

        <!-- <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt2) {
                       echo "Checked";
                   }
                   ?>><?php echo $opt2; ?>
        </span>

        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt3) {
                       echo "Checked";
                   }
                   ?>><?php echo $opt3; ?>
        </span>

        <span>
            <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>"
                onclick="radioclick(this.value, <?php echo $quiz_no ?>)" <?php
                   if ($ans == $opt4) {
                       echo "Checked";
                   }
                   ?>><?php echo $opt4; ?>
        </span> -->


    </div>

<?php } ?>