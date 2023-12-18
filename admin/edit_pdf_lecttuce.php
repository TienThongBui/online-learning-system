<?php
include_once "includes/config_session.inc.php";
include_once "includes/db_connection.php";
include_once "functions/admin_functions.php";
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
<?php
include_once 'partitials/admin_sideMenu.php';
?>
<body>

<div class="main">
    <div class="container">
        <div class="row">
                <?php
                    $id = $_GET["id"];
                    if (isset($_GET["id"])) {
                        $query = 'select * from lecttuces where lecttuces_id = "'.$id.'"';
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                            // $id = $row['id']; 
                            $lecttuces_name = $row['lecttuces_name'];
                            $pdf_url = $row['pdf_url'];
                            $lecttuces_keyword = $row['lecttuces_keyword'];
                            $lecttuces_desc = $row['lecttuces_discription'];
                            $level = $row['level'];
                            $category_title = $row['category_title'];

                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Update <strong class="text-danger"><?php echo $lecttuces_name ?></strong> lecttuce
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Lecttuce name" class=form-control-lable>
                                        Lecttuce name
                                    </label>
                                    <input type="text" id="lecttuces_name" class="form-control" name="lecttuces_name" placeholder="<?php echo $lecttuces_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="New question" class=form-control-lable>
                                        PDF
                                    </label>
                                    <!-- <input type="text" id="question" class="form-control" name="question"> -->
                                    <input type="file" id="pdf_url" class="form-control" name="pdf_url">
                                </div>

                                <div class="form-group">
                                    <label for="Keywords" class=form-control-lable>
                                        Keywords (for searching)
                                    </label>
                                    <input type="text" id="lecttuces_keyword" class="form-control" name="lecttuces_keyword" placeholder="<?php echo $lecttuces_keyword ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Discription" class=form-control-lable>
                                        Discription
                                    </label>
                                    <input type="text" id="lecttuces_discription" class="form-control" name="lecttuces_discription" placeholder="<?php echo $lecttuces_desc ?>">
                                </div>

                                <div class="form-group">
                                    <label for="Level" class=form-control-lable>
                                        Level
                                    </label>
                                    <select type="text" id="level" class="form-select" name="level">
                                        <option select>Select level</option>
                                        
                                        <?php
                                                $level_all = "select * from level";
                                                $result_level = $conn -> query($level_all);
                                                while ($level_row = mysqli_fetch_assoc($result_level)){
                                                    $level = $level_row['level'];      
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
                                                $category_all = "select * from category";
                                                $result_category = $conn -> query($category_all);
                                                while ($category_row = mysqli_fetch_assoc($result_category)){
                                                    $category_title = $category_row['category_title'];       
                                        ?>
                                        <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>

                                <div class="form-group mt-3">
                                
                                    <input type="submit" class="btn btn-success" name="update_lecttuce" value="Save lecttuce">
                                </div>
                               
                            </div>
                        <form>    
                    </div>
                </div>
        </div>
            <?php
                }
            ?>


           
    </div>
</div>

<?php
edit_pdf_lecttuce();
// add_quick_video_quiz();
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>