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
    <title>Admin Video Lecttuce</title>
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
        <h2>User Management</h2>
        <br>
        <div class="container">
            <div class="over-flow-x:auto">
            <table id="data" class="table table-border" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from users";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $username = $row["username"];
                            $email = $row["email"];
                            $contact = $row["contact"];
                        ?>
                        <tr>
                            <td>
                                <?php echo $id ?>
                            </td>
                            <td>
                                <?php echo $firstname ?>
                            </td>
                            <td>
                                <?php echo $lastname ?>
                            </td>
                            <td>
                                <?php echo $username ?>
                            </td>
                            <td>
                                <?php echo $email ?>
                            </td>
                            <td>
                                <?php echo $contact ?>
                            </td>
                            <td>
                                <a href="delete_user.php?id=<?php echo $id ?>"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
                </div>
        </div>
    </div>


    <?php
    add_video_lecttuce();
    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>


    <script>
        new DataTable('#data');
    </script>

</body>

</html>