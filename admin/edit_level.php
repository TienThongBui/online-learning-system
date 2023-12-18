<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/db_connection.php';
    include_once 'functions/admin_functions.php';


    $id=$_GET['id'];
    $query = "select * from level where level_id = '".$id."';";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        $level = $row["level"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include_once 'partitials/admin_sideMenu.php';
?>

    <div class="main">
        <h2 class="text-center">Edit level</h2>
        <hr>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Level</strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="New level" class=form-control-lable>
                                        New level
                                    </label>
                                    <input type="text" id="level" class="form-control" name="level"
                                    value=<?php echo $level ?>>
                                </div>

                                <div class="form-group mt-3">
                                
                                    <input type="submit" class="btn btn-success" name="submit" value="Save exam">
                                </div>
                            </div>
                        <form>    

                    </div>
                </div>
            </div>
        </div>
    </div>

       

<?php
edit_level();
?>

</body>
</html>