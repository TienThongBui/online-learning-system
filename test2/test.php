<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Question in Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>
<style>
    .main {
        margin-top: 10px;
        margin-left: 70px;
        padding: 0px 10px; 
    }
</style>
<body>
    <div class="main">
        <h2>Add new question</h2>
        <br>
        <div class="cotainer">
            <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Listening question</strong>
                            </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Question .No" class=form-control-lable>
                                            Question .No
                                        </label>
                                        <input type="text" id="question_no" class="form-control" name="question_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="Question" class=form-control-lable>
                                            Question
                                        </label>
                                        <input type="text" id="question_name" class="form-control" name="question_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="New question" class=form-control-lable>
                                            Video (Optional)
                                        </label>
                                        <!-- <input type="text" id="question" class="form-control" name="question"> -->
                                        <input type="file" id="video_url" class="form-control" name="video_url">
                                    </div>

                                    <div class="form-group">
                                        <label for="New question" class=form-control-lable>
                                            Audio (Optional)
                                        </label>
                                        <!-- <input type="text" id="question" class="form-control" name="question"> -->
                                        <input type="file" id="audio_url" class="form-control" name="audio_url">
                                    </div>

                                    <div class="form-group">
                                        <label for="Option 1" class=form-control-lable>
                                            Option 1
                                        </label>
                                        <input type="text" id="opt1" class="form-control" name="opt1" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Option 2" class=form-control-lable>
                                            Option 2
                                        </label>
                                        <input type="text" id="opt2" class="form-control" name="opt2" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Option 3" class=form-control-lable>
                                            Option 3
                                        </label>
                                        <input type="text" id="opt3" class="form-control" name="opt3" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Option 4" class=form-control-lable>
                                            Option 4
                                        </label>
                                        <input type="text" id="opt4" class="form-control" name="opt4" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Correct answer" class=form-control-lable>
                                            Correct answer
                                        </label>
                                        <input type="text" id="answer" class="form-control" name="answer" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Level" class=form-control-lable>
                                            Level
                                        </label>
                                        <select type="text" id="level" class="form-select" name="level">
                                            <option select>Select a category</option>
                                            
                                            <?php
                                                    $level_query = "select * from level";
                                                    $level_result = $conn->query($level_query);
                                                    while ($level_row = $level_result->fetch_assoc()) {
                                                               
                                                        $level=$level_row['level'];        
                                            ?>
                                            <option value="<?php echo $level ?>"><?php echo $level ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>


                                    <div class="form-group">
                                        <label for="Category" class=form-control-lable>
                                            Category
                                        </label>
                                        <select type="text" id="category_title" class="form-select" name="category_title">
                                            <option select>Select a category</option>
                                            
                                            <?php
                                                    $category_query = "select * from category";
                                                    $category_result = $conn->query($category_query);
                                                    while ($category_row = $category_result->fetch_assoc()) {
                                                               
                                                        $category=$category_row['category_title'];        
                                            ?>
                                            <option value="<?php echo $category ?>"><?php echo $category ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>


                                    <div class="form-group mt-3">
                                    
                                        <input type="submit" class="btn btn-success" name="submit" value="Save question">
                                    </div>
                                </div>
                            <form>    

                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>


<?php
if (isset($_POST['submit']) && isset($_FILES['audio_url'])) {
	//include "db_conn.php";
    $question_no = $_POST["question_no"];
    $question_name = $_POST["question_name"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    $answer = $_POST["answer"];
    $level = $_POST["level"];
    $category_title = $_POST["category_title"];
    $audio_name = $_FILES['audio_url']['name'];
    $tmp_name = $_FILES['audio_url']['tmp_name'];
    $error = $_FILES['audio_url']['error'];

    if ($error === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);

    	$allowed_exs = array("3gp", 'mp3', 'm4a', 'wav', 'm3u', 'ogg');

    	if (in_array($audio_ex_lc, $allowed_exs)) {
    		
    		// $new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
    		$audio_upload_path = '../uploads/audio/'.$audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            // $sql = "INSERT INTO exam_video (video_url) 
            //        VALUES('$new_audio_name')";
            // mysqli_query($conn, $sql);
            // header("Location: view.php");

            $query = "insert into exam_question (question_no, question_name, audio_url, opt1, opt2, opt3, opt4, answer, level, category_title) values 
                        ('$question_no', '$question_name', '$audio_name', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$level', '$category_title');";
           $result = $conn->query($query);
        
        }
    }
}

if (isset($_POST['submit']) && isset($_FILES['video_url'])) {
	//include "db_conn.php";
    $question_no = $_POST["question_no"];
    $question_name = $_POST["question_name"];
    $opt1 = $_POST["opt1"];
    $opt2 = $_POST["opt2"];
    $opt3 = $_POST["opt3"];
    $opt4 = $_POST["opt4"];
    $answer = $_POST["answer"];
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
    		
    		// $new_video_name = uniqid("audio-", true). '.'.$video_ex_lc;
    		$audio_upload_path = '../uploads/video'.$video_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            // $sql = "INSERT INTO exam_video (video_url) 
            //        VALUES('$new_video_name')";
            // mysqli_query($conn, $sql);
            // header("Location: view.php");

            $query = "insert into exam_question (question_no, question_name, video_url, opt1, opt2, opt3, opt4, answer, level, category_title) values 
                        ('$question_no', '$question_name', '$video_name', '$opt1', '$opt2', '$opt3', '$opt4', '$answer', '$level', '$category_title');";
           $result = $conn->query($query);
        
        }
    }
}
?>
</body>
</html>
    