<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';


$id = $_GET['id'];
$query = "select * from category where category_id = '" . $id . "';";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    $category_title = $row['category_title'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>
<?php
include_once 'partitials/admin_sideMenu.php';
?>

<body>
    <div class="main">
        <h2 class="text-center">Edit category</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit category</strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="New category" class=form-control-lable>
                                        New category
                                    </label>
                                    <input type="text" id="category_title" class="form-control" name="category_title"
                                        value="<?php echo $category_title ?>"
                                        placeholder="<?php echo $category_title ?>">
                                </div>

                                <div class="form-group mt-3">

                                    <input type="submit" class="btn btn-success" name="submit" value="Save category">
                                </div>
                            </div>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    edit_category();
    ?>

</body>

</html>