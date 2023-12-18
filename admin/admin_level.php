<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Category</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <link src='https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css' rel="stylesheet">
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js'></script>

    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>
<style>
    .main {
        margin-top: 30px;
        padding: 0px 10px;
    }
</style>

<?php
include_once 'partitials/admin_sideMenu.php';
?>

<body>


    <div class="main">
        <h2 class="text-center">Add new level</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add new level</strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="New level" class=form-control-lable>
                                        New level
                                    </label>
                                    <input type="text" id="level" placeholder="Enter exam category" class="form-control"
                                        name="level">
                                </div>

                                <div class="form-group mt-3">

                                    <input type="submit" class="btn btn-success" name="submit" value="Add level">
                                </div>
                            </div>
                            <form>
                    </div>
                </div>
            </div>

            <table id="data" class="table table-border" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from level";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $level_id = $row['level_id'];
                        $level = $row['level'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $level_id ?>
                            </td>
                            <td>
                                <?php echo $level ?>
                            </td>
                            <td>
                                <a href="edit_level.php?id=<?php echo $level_id ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_level.php?id=<?php echo $level_id ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>


    <?php
    add_level();
    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->



    <script>
        new DataTable('#data');
    </script>

</body>

</html>