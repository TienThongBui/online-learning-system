<?php
require_once '../includes/config_session.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Navbar</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/header.css">
</head>

<body>

  <div class="topnav" id="topnav">
    <nav class="navbar navbar-expand-sm py-2" style="background-color:  #d3e8f9;">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">
          <h4>E-Elo</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Home</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                <span class="nav-text">Lesson</span>
              </a>

              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../user/video_lecttuces.php">Video</a></li>
                <li><a class="dropdown-item" href="../user/pdf_lecttuces.php">PDF</a></li>
                <li><a class="dropdown-item" href="../user/reading_lecttuces.php">Reading</a></li>

              </ul>
            </li> -->

            <!-- <li class="nav-item">
              <a class="nav-link" href="select_exam.php">Quiz</a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" href="../user/abtus.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../user/contact.php">Contact</a>
            </li>

            <?php if (isset($_SESSION["user_id"])): ?>
              <?php echo '
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                        <span class="nav-text">' . $_SESSION["user_username"] . ' </span>
                      </a>
                  
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php?dashboard">Profile</a></li>
                        <li><a class="dropdown-item" href="../includes/logout.inc.php">Logout</a></li>
                      </ul>
                    </li>'
              ; ?>
            <?php endif ?>
          </ul>

          <form class="d-flex" action="search_lecttuces.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search..." name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_lecttuces">
          </form>

        </div>
      </div>
    </nav>
  </div>



</body>

</html>