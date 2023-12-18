<!-- Admin functions -->

<?php

// Admin Dashboard


// Add, edit, delete CATEGORY
function add_category()
{
    global $conn;
    if (isset($_POST["submit"])) {
        $category_title = $_POST["category_title"];
        $exam_time = $_POST["exam_time"];

        $query = "insert into category (category_title) values
                    ('$category_title');";
        $result = $conn->query($query);

        echo "<meta http-equiv='refresh' content='0'>";
    }
}

function edit_category()
{
    global $conn;
    $id = $_GET['id'];

    if (isset($_POST["submit"])) {
        $category_title = $_POST['category_title'];

        $query = "update category set category_title='$category_title' where category_id='" . $id . "';";
        $result = $conn->query($query);
        header("location: admin_category.php");
    }
}

function delete_category()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from category where category_id = '" . $id . "';";
    $result = $conn->query($query);
    header("location: admin_category.php");
}



// Add, edit, delete LEVEL
function add_level()
{
    global $conn;
    if (isset($_POST["submit"])) {
        $level = $_POST["level"];
        // $exam_time = $_POST["exam_time"];

        $query = "insert into level (level) values
                    ('$level');";
        $result = $conn->query($query);

        echo "<meta http-equiv='refresh' content='0'>";
    }
}
function edit_level()
{
    global $conn;
    $id = $_GET["id"];

    if (isset($_POST["submit"])) {
        $level = $_POST['level'];

        $query = "update level set level='$level' where level_id='" . $id . "';";
        $result = $conn->query($query);
        header("location: admin_level.php");
    }
}

function delete_level()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from level where level_id = '" . $id . "'";
    $result = $conn->query($query);
    header("location: admin_level.php");
}

//Add, edit, delete QUIZ LEVEL
function add_quiz_level()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $quiz_level = $_POST['quiz_level'];
        $exam_time = $_POST['exam_time'];
        $query = "insert into quiz_level (quiz_level, exam_time) values ('$quiz_level', '$exam_time');";
        $result = mysqli_query($conn, $query);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

function edit_quiz_level()
{
    global $conn;
    $id = $_GET['id'];

    if (isset($_POST["submit"])) {
        $quiz_level = $_POST['quiz_level'];
        $exam_time = $_POST['exam_time'];

        $query = "update quiz_level set quiz_level='$quiz_level', exam_time='$exam_time' where id='" . $id . "';";
        $result = $conn->query($query);
        // header("location: admin_category.php");
    }
}

function delete_quiz_level()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from quiz_level where id = '" . $id . "'";
    $result = $conn->query($query);
    header("location: admin_quiz_level.php");
}

// Add, edit, delete QUIZ

function add_quiz()
{
    global $conn;
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $query = 'select * from quiz_level where id = "' . $id . '";';
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $quiz_level = $row['quiz_level'];
            // $level = $row['level'];
        }

        if (isset($_POST['submit'])) {
            $quiz_no = $_POST["quiz_no"];
            $quiz_name = $_POST["quiz_name"];
            $opt1 = $_POST["opt1"];
            $opt2 = $_POST["opt2"];
            $opt3 = $_POST["opt3"];
            $opt4 = $_POST["opt4"];
            $answer = $_POST["answer"];

            $query = "insert into quiz (quiz_no, quiz_name, opt1, opt2, opt3, opt4, answer, quiz_level_id, quiz_level) values 
                ('$quiz_no', '$quiz_name', '$opt1', '$opt2', '$opt3', '$opt4', '$answer','$id', '$quiz_level');";
            $result = mysqli_query($conn, $query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}

function edit_quiz()
{
    global $conn;
    $qid = $_GET['qid'];
    $quiz_level_id = $_GET['quiz_level_id'];

    $query = 'select * from quiz_level where id = "' . $quiz_level_id . '";';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $q_lvl_id = $row["id"];
    $quiz_level = $row["quiz_level"];




    if (isset($_POST['submit'])) {
        $quiz_no = $_POST["quiz_no"];
        $quiz_name = $_POST["quiz_name"];
        $opt1 = $_POST["opt1"];
        $opt2 = $_POST["opt2"];
        $opt3 = $_POST["opt3"];
        $opt4 = $_POST["opt4"];
        $answer = $_POST["answer"];

        $query = "update quiz set quiz_no='$quiz_no', quiz_name='$quiz_name', opt1='$opt1', opt2='$opt2', opt3='$opt3',
            opt4='$opt4', answer='$answer', quiz_level_id='$q_lvl_id', quiz_level='$quiz_level' where id = '$qid'";

        $result = mysqli_query($conn, $query);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

function delete_quiz()
{
    global $conn;
    $qid = $_GET['qid'];

    $query = "delete from quiz where id = '$qid'";
    $result = $conn->query($query);
    header("location: admin_quiz_level.php");
    echo "<meta http-equiv='refresh' content='0'>";


}

// Add, edit, delete VIDEO LECTTUCES
function add_video_lecttuce()
{
    global $conn;
    if (isset($_POST['submit']) && isset($_FILES['video_url'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        $video_name = $_FILES['video_url']['name'];
        $tmp_name = $_FILES['video_url']['tmp_name'];
        $error = $_FILES['video_url']['error'];

        if ($error === 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array('mp4', 'mp3');

            if (in_array($video_ex_lc, $allowed_exs)) {

                // $new_video_name = uniqid("audio-", true). '.'.$video_ex_lc;
                $audio_upload_path = '../uploads/' . $video_name;
                move_uploaded_file($tmp_name, $audio_upload_path);

            }
        }

        $query = "INSERT into `lecttuces`(`lecttuces_name`, `video_url`, `lecttuces_keyword`, `lecttuces_discription`, `level`, `category_title`) 
        VALUES ('$lecttuces_name','$video_name','$lecttuces_keyword','$lecttuces_desc','$level','$category_title');";

        $result = $conn->query($query);
        echo "<meta http-equiv='refresh' content='0'>";


    }

}

function edit_video_lecttuce()
{
    global $conn;
    if (isset($_POST['update_lecttuce']) && isset($_FILES['video_url'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        $video_name = $_FILES['video_url']['name'];
        $tmp_name = $_FILES['video_url']['tmp_name'];
        $error = $_FILES['video_url']['error'];

        if ($error === 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array('mp4');

            if (in_array($video_ex_lc, $allowed_exs)) {

                $audio_upload_path = '../uploads' . $video_name;
                move_uploaded_file($tmp_name, $audio_upload_path);

            }
        }
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        $query = "update lecttuces set lecttuces_name='$lecttuces_name', video_url='$video_name', lecttuces_keyword='$lecttuces_keyword',
                    lecttuces_discription='$lecttuces_desc', level='$level', category_title='$category_title' where lecttuces_id='" . $id . "';";

        $result = $conn->query($query);
        header("location: admin_add_videoLecttuce.php");


    }
}

function delete_video_lecttuce()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from lecttuces where lecttuces_id = '" . $id . "'";
    $result = $conn->query($query);
    header("location: admin_add_videoLecttuce.php");
}

//Add, edit, delete PDF LECTTUCES

function add_pdf_lecttuce()
{
    global $conn;
    if (isset($_POST['submit']) && isset($_FILES['pdf_url'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        $pdf_name = $_FILES['pdf_url']['name'];
        $tmp_name = $_FILES['pdf_url']['tmp_name'];
        $error = $_FILES['pdf_url']['error'];

        if ($error === 0) {
            $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION);

            $pdf_ex_lc = strtolower($pdf_ex);

            $allowed_exs = array('pdf', 'doc');

            if (in_array($pdf_ex_lc, $allowed_exs)) {

                // $new_pdf_name = uniqid("audio-", true). '.'.$pdf_ex_lc;
                $pdf_uploads_path = '../uploads/pdf/' . $pdf_name;
                move_uploaded_file($tmp_name, $pdf_uploads_path);

            }
        }

        $query = "INSERT into `lecttuces`(`lecttuces_name`, `pdf_url`, `lecttuces_keyword`, `lecttuces_discription`, `level`, `category_title`) 
        VALUES ('$lecttuces_name','$pdf_name','$lecttuces_keyword','$lecttuces_desc','$level','$category_title');";

        $result = $conn->query($query);
        echo "<meta http-equiv='refresh' content='0'>";


    }

}

function edit_pdf_lecttuce()
{
    global $conn;
    if (isset($_POST['update_lecttuce']) && isset($_FILES['pdf_url'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        $pdf_name = $_FILES['pdf_url']['name'];
        $tmp_name = $_FILES['pdf_url']['tmp_name'];
        $error = $_FILES['pdf_url']['error'];

        if ($error === 0) {
            $video_ex = pathinfo($pdf_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array('pdf', 'doc');

            if (in_array($video_ex_lc, $allowed_exs)) {

                $pdf_upload_path = '../uploads/pdf/' . $pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);

            }
        }
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        $query = "update lecttuces set lecttuces_name='$lecttuces_name', pdf_url='$pdf_name', lecttuces_keyword='$lecttuces_keyword',
                    lecttuces_discription='$lecttuces_desc', level='$level', category_title='$category_title' where lecttuces_id='" . $id . "';";

        $result = $conn->query($query);
        header("location: admin_add_videoLecttuce.php");


    }
}

function delete_pdf_lecttuce()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from lecttuces where lecttuces_id = '" . $id . "'";
    $result = $conn->query($query);
    header("location: admin_add_pdfLecttuce.php");
}

//Add, edit, delete READING LECTTUCES
function add_reading_lecttuce()
{
    global $conn;
    if (isset($_POST['submit'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $reading_name = $_POST["reading_url"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        

        $query = "INSERT into `lecttuces`(`lecttuces_name`, `reading_url`, `lecttuces_keyword`, `lecttuces_discription`, `level`, `category_title`) 
        VALUES ('$lecttuces_name','$reading_name','$lecttuces_keyword','$lecttuces_desc','$level','$category_title');";

        $result = $conn->query($query);
        echo "<meta http-equiv='refresh' content='0'>";


    }

}

function edit_reading_lecttuce()
{
    global $conn;
    if (isset($_POST['update_lecttuce'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $reading_url = $_POST["reading_url"];
        $lecttuces_keyword = $_POST["lecttuces_keyword"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
       

        
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        $query = "update lecttuces set lecttuces_name='$lecttuces_name', reading_url='$reading_url', lecttuces_keyword='$lecttuces_keyword',
                    lecttuces_discription='$lecttuces_desc', level='$level', category_title='$category_title' where lecttuces_id='" . $id . "';";

        $result = $conn->query($query);
        header("location: admin_add_videoLecttuce.php");


    }
}

function delete_reading_lecttuce()
{
    global $conn;
    $id = $_GET['id'];
    $query = "delete from lecttuces where lecttuces_id = '" . $id . "'";
    $result = $conn->query($query);
    header("location: admin_add_readingLecttuce.php");
}


//Edit, delete lecture's quiz


// Delete USER

function delete_user()
{
    global $conn;
    $id = $_GET["id"];

    $query = "delete from users where id = '$id'";
    $result = $conn->query($query);
    header("location: admin_user.php");
}