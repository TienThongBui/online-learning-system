<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_function.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</head>
<style>
    body {
        min-height: 100vh;
        width: 100%;
        background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgb(7, 17, 2)), url(../img/home-bg.jpg);
        background-position: center;
        background-size: cover;
        position: relative;
        background-repeat: no-repeat;
    }

    .abtus {
        border-style: solid;
        border-width: 10px;
        border-color: #009970;
        padding: 10px;
        font-size: 20px;
        color: aliceblue;
    }

    .content {
        font-size: 20px;
        color: aliceblue;
    }
</style>
<?php
include "../partitials/header.php";
?>

<body>

    <div class="container d-flex" style="height: 80vh;">

        <div class="row align-items-center justify-content-center">
            <div class="col-md-4">
                <div class="abtus">
                    <h2>About Us</h2>
                    <hr>
                    <p><strong>E-ELO</strong>, a
                        website that gathers all the necessary elements to improve English. The website
                        provides English lectures in video and pdf which are different from regular
                        written lectures, makes it easier for users to study more effectively.</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content">
                    <p> The website
                        provides many lectures at different levels, from basic to advanced, and exercises
                        are also based on those levels, helping users to self-study more effectively. E-Elo's success is
                        recognized by being able to help users improve their
                        English knowledge. The fact that many users can access English lectures and
                        build an English foundation good enough to use in life is a success for the
                        creators of E-Elo. E-Elo hopes to help a little in Vietnam's education system, as
                        well as help users become more fluent in English.</p>
                </div>
            </div>
        </div>

    </div>







    <script>
        const card = document.getElementById("card");
        const moreContent = document.getElementById("moreContent");
        const showMore = document.getElementById("showMore");

        let isShowMore = false;

        showMore.addEventListener('click', () => {
            isShowMore = !isShowMore;

            if (isShowMore) {
                moreContent.style.display = 'block';
                showMore.textContent = 'Show less';
            } else {
                moreContent.style.display = 'none';
                showMore.textContent = 'Show more';
            }
        });
    </script>

</body>

</html>