<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
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
    <h2>Add new Listening Question</h2>
        <br>
        <div class="cotainer">
            <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add new video lecttuces</strong>
                            </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Lecttuce name" class=form-control-lable>
                                            Lecttuce name
                                        </label>
                                        <input type="text" id="lecttuces_name" class="form-control" name="lecttuces_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="video" class=form-control-lable>
                                            Video
                                        </label>
                                        <input type="file" id="video_url" class="form-control" name="video_url">
                                    </div>

                                    <div class="form-group">
                                        <label for="Lecttuce discription" class=form-control-lable>
                                            Lecttuce discription
                                        </label>
                                        <input type="text" id="lecttuces_discription" class="form-control" name="lecttuces_discription" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Category" class=form-control-lable>
                                            Level
                                        </label>
                                        <select type="text" id="level" class="form-select" name="level">
                                            <option select>Select a level</option>
                                            
                                            <?php
                                                    $level_query = "select * from level";
                                                    $level_result = $conn->query($level_query);
    
                                                    while ($row = $level_result->fetch_assoc()) {
                                                               
                                                        $level=$row['level'];        
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
    
                                                    while ($row = $category_result->fetch_assoc()) {
                                                               
                                                        $category_title=$row['category_title'];        
                                            ?>
                                            <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
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
    if (isset($_POST['submit']) && isset($_FILES['video_url'])) {

        $lecttuces_name = $_POST["lecttuces_name"];
        $lecttuces_desc = $_POST["lecttuces_discription"];
        $level = $_POST["level"];
        $category_title = $_POST["category_title"];
        $video_url = $_FILES['video_url']['name'];
        $tmp_name = $_FILES['video_url']['tmp_name'];
        $error = $_FILES['video_url']['error'];

        if ($error === 0) {

            $video_ex = pathinfo($video_url, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array('mp4', 'm4a', 'mov', 'ogg', '3gp', 'gif');

            if (in_array($video_ex_lc, $allowed_exs)) {

                $video_upload_path = '../../uploads/video/' . $video_url;
                move_uploaded_file($tmp_name, $video_upload_path);


                $query = "insert into video_lecttuces (lecttuces_name, video_url, lecttuces_discription, level, category_title) values 
                        ('$lecttuces_name', '$video_url', '$lecttuces_desc', '$level', '$category_title');";
                $result = $conn->query($query);
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                $em = "You can't upload files of this type";
                header("Location: admin_listening_question.php?error=$em");
            }
        }
    }
    ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>