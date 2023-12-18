<?php
include("../includes/db_connection.php");

//Pagination dashboard
function get_pagination()
{
    global $conn;
    if (!isset($_GET["category_title"])) {
        if (!isset($_GET["level"])) {

            $query = "select * from lecttuces";
            $result = mysqli_query($conn, $query);
            $num = mysqli_num_rows($result);

            $lecttucesNumbers = 8;
            $totalPages = ceil($num / $lecttucesNumbers);


            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }

            $startLimit = ($page - 1) * $lecttucesNumbers;
            $select = "select * from lecttuces limit $startLimit,$lecttucesNumbers";
            $limit_result = mysqli_query($conn, $select);



            while ($row = mysqli_fetch_assoc($limit_result)) {
                $id = $row['lecttuces_id'];
                $lecttuces_name = $row['lecttuces_name'];
                $video_url = $row['video_url'];
                $lecttuces_desc = $row['lecttuces_discription'];
                $level = $row['level'];
                $category_title = $row['category_title'];


                echo "
                    <div class=' col-md-10 col-lg-5 mt-1'>
                        <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                            <div class='lecttuces'>
                                <div class='lecttuces-preview'>
                                    <h6> Lecture </h6>
                                    <h4> $lecttuces_name </h4>
                                </div>
                                <div class='lecttuces-info'>
                                    <h6> Description </h6>
                                    <p> $lecttuces_desc </p>
                                    <h6> Level </h6>
                                    <p> $level </p>
                                    <h6> Skill </h6>
                                    <p> $category_title </p>
                                </div>
                            </div>
                        </a>
                    </div>

                ";
            }

            echo "<div class='row mt-4 justify-content-center'>
                    <div class='col-5 d-flex justify-content-center'>";

            for ($btn = 1; $btn <= $totalPages; $btn++) {
                echo "

                    <a href='dashboard.php?page=$btn' class='px-2'>
                        <button class='btn btn-outline-info'> $btn </button>
                    </a>
                ";


            }
            echo "
                </div>
            </div>";

        }
    }
}

function get_all_lecttuces()
{
    global $conn;

    // condition to check isset or not
    if (!isset($_GET["category_title"])) {
        if (!isset($_GET["level"])) {

            $query = "select * from lecttuces";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['lecttuces_id'];
                $lecttuces_name = $row['lecttuces_name'];
                $video_url = $row['video_url'];
                $lecttuces_desc = $row['lecttuces_discription'];
                $level = $row['level'];
                $category_title = $row['category_title'];


                echo "
        <div class=' col-md-10 col-lg-5 mt-1'>
            <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                <div class='lecttuces'>
                    <div class='lecttuces-preview'>
                        <h6> Lecture </h6>
                        <h4> $lecttuces_name </h4>
                    </div>
                    <div class='lecttuces-info'>
                        <h6> Description </h6>
                        <p> $lecttuces_desc </p>
                        <h6> Level </h6>
                        <p> $level </p>
                    </div>
                </div>
            </a>
        </div>

        ";
            }


        }
    }
}

function get_video_lecttuces()
{
    global $conn;

    // condition to check isset or not
    if (!isset($_GET["category_title"])) {
        if (!isset($_GET["level"])) {

            $query = "select * from lecttuces where video_url != '';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['lecttuces_id'];
                $lecttuces_name = $row['lecttuces_name'];
                $video_url = $row['video_url'];
                $lecttuces_desc = $row['lecttuces_discription'];
                $level = $row['level'];
                $category_title = $row['category_title'];


                echo "
                <div class=' col-md-10 col-lg-5 mt-1'>
                <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                    <div class='lecttuces'>
                        <div class='lecttuces-preview'>
                            <h6> Lecture </h6>
                            <h4> $lecttuces_name </h4>
                        </div>
                        <div class='lecttuces-info'>
                            <h6> Description </h6>
                            <p> $lecttuces_desc </p>
                            <h6> Level </h6>
                            <p> $level </p>
                            <h6> Skill </h6>
                            <p> $category_title </p>
                        </div>
                    </div>
                </a>
            </div>

        ";
            }


        }
    }
}

function get_pdf_lecttuces()
{
    global $conn;

    // condition to check isset or not
    if (!isset($_GET["category_title"])) {
        if (!isset($_GET["level"])) {

            $query = "select * from lecttuces where pdf_url != '';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['lecttuces_id'];
                $lecttuces_name = $row['lecttuces_name'];
                $pdf_url = $row['pdf_url'];
                $lecttuces_desc = $row['lecttuces_discription'];
                $level = $row['level'];
                $category_title = $row['category_title'];


                echo "
                <div class=' col-md-10 col-lg-5 mt-1'>
                <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                    <div class='lecttuces'>
                        <div class='lecttuces-preview'>
                            <h6> Lecture </h6>
                            <h4> $lecttuces_name </h4>
                        </div>
                        <div class='lecttuces-info'>
                            <h6> Description </h6>
                            <p> $lecttuces_desc </p>
                            <h6> Level </h6>
                            <p> $level </p>
                            <h6> Skill </h6>
                            <p> $category_title </p>
                        </div>
                    </div>
                </a>
            </div>

        ";
            }


        }
    }
}

function get_reading_lecttuces()
{
    global $conn;

    // condition to check isset or not
    if (!isset($_GET["category_title"])) {
        if (!isset($_GET["level"])) {

            $query = "select * from lecttuces where reading_url != '';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['lecttuces_id'];
                $lecttuces_name = $row['lecttuces_name'];
                $pdf_url = $row['pdf_url'];
                $lecttuces_desc = $row['lecttuces_discription'];
                $level = $row['level'];
                $category_title = $row['category_title'];


                echo "
                <div class=' col-md-10 col-lg-5 mt-1'>
                <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                    <div class='lecttuces'>
                        <div class='lecttuces-preview'>
                            <h6> Lecture </h6>
                            <h4> $lecttuces_name </h4>
                        </div>
                        <div class='lecttuces-info'>
                            <h6> Description </h6>
                            <p> $lecttuces_desc </p>
                            <h6> Level </h6>
                            <p> $level </p>
                            <h6> Skill </h6>
                            <p> $category_title </p>
                        </div>
                    </div>
                </a>
            </div>

        ";
            }


        }
    }
}


// lecttuces level
function get_level()
{
    global $conn;
    $query = "select * from level";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["level_id"];
        $level = $row["level"];

        echo "
            <a href='../user/dashboard.php?level=$level' class='nav-link'>$level</a>
        ";
    }
}

// Get category
function get_category()
{
    global $conn;
    $query = "select * from category";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["category_id"];
        $category_title = $row["category_title"];

        echo "
            
                <a href='../user/dashboard.php?category_title=$category_title' class='nav-link'>$category_title</a>
                
           
        
        
        ";
    }
}

// Unique category
function get_uni_category()
{
    global $conn;

    // condition to check isset or not

    if (isset($_GET["category_title"])) {
        $category_title = $_GET['category_title'];
        // if (!isset($_GET["lecttuces_level"])) {

        $query = "select * from lecttuces where category_title = '" . $category_title . "'";
        $result = mysqli_query($conn, $query);
        $num_of_row = mysqli_num_rows($result);
        if ($num_of_row == 0) {
            echo "<p class='text-center text-danger'>There is no lecttuces in this level</p>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['lecttuces_id'];
            $lecttuces_name = $row['lecttuces_name'];
            $video_url = $row['video_url'];
            $lecttuces_desc = $row['lecttuces_discription'];
            $level = $row['level'];
            $category_title = $row['category_title'];

            // $level = $row['level'];
            echo "
            <div class=' col-md-10 col-lg-5 mt-1'>
            <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                <div class='lecttuces'>
                    <div class='lecttuces-preview'>
                        <h6> Lecture </h6>
                        <h4> $lecttuces_name </h4>
                    </div>
                    <div class='lecttuces-info'>
                        <h6> Description </h6>
                        <p> $lecttuces_desc </p>
                        <h6> Level </h6>
                        <p> $level </p>
                        <h6> Skill </h6>
                        <p> $category_title </p>
                    </div>
                </div>
            </a>
        </div>

        ";
        }
        // }
    }
}

// Unique category
function get_uni_level()
{
    global $conn;

    // condition to check isset or not

    if (isset($_GET["level"])) {
        $lecttuces_level = $_GET['level'];
        // if (!isset($_GET["lecttuces_lecttuces_level"])) {

        $query = "select * from lecttuces where level = '" . $lecttuces_level . "'";
        $result = mysqli_query($conn, $query);
        $num_of_row = mysqli_num_rows($result);
        if ($num_of_row == 0) {
            echo "<p class='text-center text-danger'>There is no lecttuces in this level</p>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['lecttuces_id'];
            $lecttuces_name = $row['lecttuces_name'];
            $video_url = $row['video_url'];
            $lecttuces_desc = $row['lecttuces_discription'];
            $level = $row['level'];
            $category_title = $row['category_title'];
            // $level = $row['level'];
            echo "
            <div class=' col-md-10 col-lg-5 mt-1'>
                        <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                            <div class='lecttuces'>
                                <div class='lecttuces-preview'>
                                    <h6> Lecture </h6>
                                    <h4> $lecttuces_name </h4>
                                </div>
                                <div class='lecttuces-info'>
                                    <h6> Description </h6>
                                    <p> $lecttuces_desc </p>
                                    <h6> Level </h6>
                                    <p> $level </p>
                                    <h6> Skill </h6>
                                    <p> $category_title </p>
                                </div>
                            </div>
                        </a>
                    </div>
    
            ";
        }
        // }
    }
}

//Search
function search_lecttuces()
{
    global $conn;

    if (isset($_GET['search_data_lecttuces'])) {
        $search_data_value = $_GET['search_data'];

        $query = "select * from lecttuces where lecttuces_keyword like '%$search_data_value%'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['lecttuces_id'];
            $lecttuces_name = $row['lecttuces_name'];
            $video_url = $row['video_url'];
            $lecttuces_desc = $row['lecttuces_discription'];
            $level = $row['level'];
            $category_title = $row['category_title'];


            echo "
            <div class=' col-md-10 col-lg-5 mt-1'>
                        <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                            <div class='lecttuces'>
                                <div class='lecttuces-preview'>
                                    <h6> Lecture </h6>
                                    <h4> $lecttuces_name </h4>
                                </div>
                                <div class='lecttuces-info'>
                                    <h6> Description </h6>
                                    <p> $lecttuces_desc </p>
                                    <h6> Level </h6>
                                    <p> $level </p>
                                    <h6> Skill </h6>
                                    <p> $category_title </p>
                                </div>
                            </div>
                        </a>
                    </div>
    
            ";
        }

    }
}

function get_uni_lecttuces()
{
    global $conn;

    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $query = "select * from lecttuces where lecttuces_id = '" . $id . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $id = $row['lecttuces_id'];
        $lecttuces_name = $row['lecttuces_name'];
        $pdf_url = $row['pdf_url'];
        $video_url = $row['video_url'];
        $reading_url = $row['reading_url'];
        $lecttuces_desc = $row['lecttuces_discription'];
        $level = $row['level'];
        $category_title = $row['category_title'];

        echo "
            <div class='row d-flex justify-content-center my-4' style='text-decoration: none;'>
                <h3>Lesson: $lecttuces_name </h3>
            </div>
            ";

        if ($video_url !== '' && $level !== 'Beginner-A1' && $level !== 'Beginner-A2') {
            echo "<div class='row d-flex justify-content-center'>
                        <div class='col-md-10'>
                            <audio src='../uploads/$video_url' class='my-4 mx-auto' controls></audio>
                        </div>
                        <div class='col-md-2'>
                            <a href='../user/bookmark.php?id=$id'>
                            <i class='fa-regular fa-bookmark' style='font-size: 30px;'></i>
                            </a>
                        </div>
                </div>";
        } elseif ($video_url !== '') {
            echo "<div class='row d-flex justify-content-center'>
                        <div class='col-md-10'>
                            <video src='../uploads/$video_url' style='width: 100%; height: 100%' controls></video>
                        </div>
                        <div class='col-md-2'>
                            <a href='../user/bookmark.php?id=$id'>
                            <i class='fa-regular fa-bookmark' style='font-size: 30px;'></i>
                            </a>
                        </div>
                </div>";
        } elseif ($pdf_url !== '') {
            echo "
                    <div class='row d-flex justify-content-center' style='text-decoration: none;'>
                        <div class='col-md-10'>
                            <iframe
                                src='../uploads/pdf/$pdf_url'
                                frameBorder='0'
                                scrolling='auto'
                                height='500px'
                                width='100%'
                            ></iframe>
                        </div>    
                        <div class='col-md-2'>
                                <a href='../user/bookmark.php?id=$id'>
                                <i class='fa-regular fa-bookmark' style='font-size: 30px;'></i>
                                </a>
                        </div>
                    </div>";
        } elseif ($reading_url !== '') {
            echo "<div class='row d-flex justify-content-center' style='text-decoration: none;'>
                        <div class='col-md-10'>
                            <div style='width: 100%; height: max-content; border-style: solid;'>$reading_url</div>
                        </div>    
                        <div class='col-md-2'>
                                <a href='../user/bookmark.php?id=$id'>
                                <i class='fa-regular fa-bookmark' style='font-size: 30px;'></i>
                                </a>
                        </div>
                    
                </div>";
        }

        echo "   
            <div class='row mx-2 my-3 p-2' style='background-color: #d3e8f9; border-radius: 15px; max-width: 73em;'>
                <h5>Description:</h5>
                <p style='font-size: 20px;'>
                    $lecttuces_desc
                </p style='font-size: 20px;'>

                <h5>Level:</h5>
                <p style='font-size: 20px;'>
                    $level
                </p style='font-size: 20px;'>
                <h5>Category:</h5>
                <p style='font-size: 20px;'>
                    $category_title
                </p style='font-size: 20px;'>
            </div>
            
        
        ";
    }
}

function get_bookmark()
{
    global $conn;

    $id = $_GET['id'];
    $user_name = $_SESSION["user_username"];
    $user_id = $_SESSION['user_id'];

    $query = "select * from lecttuces where lecttuces_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $lecttuces_name = $row['lecttuces_name'];
    $level = $row['level'];
    $category_title = $row['category_title'];

    $message = "Bookmark is added successfully!";

    $insert = "insert into bookmark (user_id, lecttuces_id, lecttuces_name, level, category_title) 
                values ('$user_id', '$id', '$lecttuces_name', '$level', '$category_title');";
    mysqli_query($conn, $insert);
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href='../user/lecttuces_detail.php?id=$id';
    </script>";
    // header("Location: ../user/lecttuces_detail.php?id=$id");

}




//Next, previous button

function next_btn()
{
    global $conn;

    $id = $_GET['id'];
    $next = $conn->query("select * from lecttuces where lecttuces_id > $id order by lecttuces_id asc");
    if ($row = mysqli_fetch_array($next)) {
        echo "<a href='lecttuces_detail.php?id=$row[lecttuces_id]'>
                                            <button type='button' class='btn btn-outline-primary'>Next</button>
                                    </a>";
    } else {
        echo "";
    }
}

function pre_btn()
{
    global $conn;
    $id = $_GET['id'];
    $previous = $conn->query("select * from lecttuces where lecttuces_id < $id order by lecttuces_id desc");
    if ($row = mysqli_fetch_array($previous)) {
        echo "<a href='lecttuces_detail.php?id=$row[lecttuces_id]'>
                                            <button type='button' class='btn btn-outline-primary'>Previous</button>
                                    </a>";
    } else {
        echo "";
    }
}


//Quick quiz

function quick_quiz()
{
    global $conn;
    $id = $_GET['id'];
    $query = "select * from lecttuces_quiz where lecttuces_id = '$id';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h5> Quick quiz </h5>";
        ?>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="col-5">
                <form action="" method="post">
                    <h5>
                        <?php echo $row['quiz_no'] ?>:<strong>
                            <?php echo $row['quiz_name'] ?>
                        </strong>
                    </h5>

                    <ul class="d-flex justify-content-evenly" style="list-style-type: none;">
                        <li>
                            <label>
                                <input type="radio" name="answer[<?php echo $row['qid'] ?>]" value="<?php echo $row['opt1'] ?>">
                                <span>
                                    <strong>A.</strong>
                                    <?php echo $row['opt1'] ?>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="answer[<?php echo $row['qid'] ?>]" value="<?php echo $row['opt2'] ?>">
                                <span>
                                    <strong>B.</strong>
                                    <?php echo $row['opt2'] ?>
                                </span>
                            </label>
                        </li>
                    </ul>
                    <ul class="d-flex justify-content-evenly" style="list-style-type: none;">
                        <li>
                            <label>
                                <input type="radio" name="answer[<?php echo $row['qid'] ?>]" value="<?php echo $row['opt3'] ?>">
                                <span>
                                    <strong>C.</strong>
                                    <?php echo $row['opt3'] ?>
                                </span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="answer[<?php echo $row['qid'] ?>]" value="<?php echo $row['opt4'] ?>">
                                <span>
                                    <strong>D.</strong>
                                    <?php echo $row['opt4'] ?>
                                </span>
                            </label>
                        </li>
                    </ul>
            </div>
            <?php
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <button type="submit" name="submit" class="form-control btn btn-outline-success">Save answer</button>
            </div>
        </div>
        </form>

        <?php
        if (isset($_POST["submit"])) {
            $correctAnswer = 0;
            $wrongAnswer = 0;
            $idList = join(',', array_map('intval', array_keys($_POST['answer'])));

            $query = "select qid, answer from lecttuces_quiz where qid in($idList)";
            $result = mysqli_query($conn, $query);
            while (list($id, $correct) = mysqli_fetch_row($result)) {
                if ($correct == $_POST['answer'][$id]) {
                    $correctAnswer += 1;

                } else {
                    $wrongAnswer += 1;
                }
            }

            echo "
                 
                    <p class='text-center'> Correct answer: $correctAnswer </p>
                
                 
                    <p class='text-center'> Wrong answer: $wrongAnswer </p>
                
                ";
        }
        ?>

        <?php
    } else {
        echo "";
    }
}

function audio_record()
{
    global $conn;
    $id = $_GET['id'];
    $query = "select * from lecttuces where lecttuces_id = '$id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    $video_url = $row['video_url'];
    if ($video_url != '' && $category_title == 'Speaking') {
        echo '
        <h5> Test your pronuncitaion </h5>
            
                <section class="experiment recordrtc">
                    <h2 class="header">
                        <select class="recording-media">

                            <option value="record-audio">Audio</option>

                        </select>

                    
                        <select class="media-container-format">
                            <option>WebM</option>

                            <option>Gif</option>
                        </select>

                    
                    </h2>

                    
                    
                        <div class="col-md-12">
                        <button><i class="fa-solid fa-microphone"></i></button>
                        <audio controls autoplay muted=false volume=1 style="width: 30em;"></audio>
                    
                        </div>
                    

                </section>
            
        
';
    } else {
        echo '';
    }
}

function writing_check()
{
    global $conn;
    $id = $_GET['id'];
    $query = "select * from lecttuces where lecttuces_id = '$id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    $reading_url = $row['reading_url'];
    if ($reading_url != '') {
        echo '
        <h5> Write your sentence </h5>
            
                <form action="" method="post">
                    <lable for="">Spell check</lable>
                    <textarea type="text" name="query" id="query" class="form-control" cols="5" rows="10"></textarea>
                    <br>
                    <button type="submit" name="spell_check" id="spell_check" class="btn btn-info">Submit</button>
                </form>
';
    } else {
        echo '';
    }

    if (isset($_POST['spell_check'])) {
        $query = $_POST['query'];
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://grammar-and-spellcheck.p.rapidapi.com/grammarandspellcheck",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "query=$query",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: grammar-and-spellcheck.p.rapidapi.com",
                "X-RapidAPI-Key: 5c2541611cmshe5d5988a72000e4p1d379bjsn8f82f999f92f",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $data = json_decode($response, true);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo '<div class="row my-2 p-2">';
            foreach ($data as $repository) {
                echo '<p class="text-center"><strong>Your sentence: </strong> "' . $repository[0]["context"] . '"</p>';
                for ($i = 0; $i < count($repository); $i++) {
                    echo '<br>';
                    echo '<p><strong class="text-warning">The mistake: </strong> "' . $repository[$i]["message"] . '"</p>';
                    echo '<br>';
                    echo '<p><strong class="text-success">Correct suggestion: </strong> "' . $repository[$i]["replacements"][0] . '"</p>';
                }
            }
            echo '</div>';
        }
    }


}


//More leson
function more_lesson()
{
    global $conn;
    $query = "select lecttuces_id, lecttuces_name, lecttuces_discription, level from lecttuces order by rand() limit 4";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['lecttuces_id'];
        $lecttuces_name = $row['lecttuces_name'];
        // $video_url = $row['video_url'];
        $lecttuces_desc = $row['lecttuces_discription'];
        $level = $row['level'];
        // $category_title = $row['category_title'];

        echo "
        <div class=' col-md-10 col-lg-5 mt-1'>
            <a href='../user/lecttuces_detail.php?id=$id' style='text-decoration: none;'>
                <div class='lecttuces'>
                    <div class='lecttuces-preview'>
                        <h6> Lecture </h6>
                        <h4> $lecttuces_name </h4>
                    </div>
                    <div class='lecttuces-info'>
                        <h6> Description </h6>
                        <p> $lecttuces_desc </p>
                        <h6> Level </h6>
                        <p> $level </p>
                    </div>
                </div>
            </a>
        </div>

        ";

    }
}

// Comments

function insert_comments()
{
    global $conn;
    $lecttuces_id = $_GET["id"];

    if (isset($_POST["post_comment"])) {
        $lecctues_id = $_POST['lecttuces_id'];
        $username = $_POST['username'];
        $comment = $_POST['comment'];
        $reply_of = 0;

        $insertComments = "insert into comments (username, comment, lecttuces_id, created_at, reply_of) 
                                values ('$username', '$comment', '$lecttuces_id', NOW(), '$reply_of')";
        mysqli_query($conn, $insertComments);
    }

}

function reply_comments()
{
    global $conn;
    if (isset($_POST["do_reply"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);

        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
        $lecttuces_id = mysqli_real_escape_string($conn, $_POST["lecttuces_id"]);
        $reply_of = mysqli_real_escape_string($conn, $_POST["reply_of"]);

        mysqli_query($conn, "INSERT INTO comments(username, comment, lecttuces_id, created_at, reply_of) VALUES ('" . $username . "', '" . $comment . "', '" . $lecttuces_id . "', NOW(), '" . $reply_of . "')");
        echo ("<meta http-equiv='refresh' content='0'>");
    }
}


// User's profile function

function dashboard_sum()
{
    global $conn;
    if (isset($_GET["dashboard"])) {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_username"];

        $query = "select distinct count(id), username, exam_type, sum(correct_answer), sum(wrong_answer) from exam_results where username = '$user_name'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["count(id)"];
            $username = $row["username"];
            $exam_type = $row["exam_type"];
            $correct_answer = $row["sum(correct_answer)"];
            $wrong_answer = $row["sum(wrong_answer)"];

            echo "
                <h2>Dashboard</h2> 
            ";

            if ($correct_answer > $wrong_answer) {
                echo "
                <div class='row text-center'>
                <h4 class='text-success'> You are very good! Keep going! </h4>
                </div>
                ";
            } elseif ($correct_answer < $wrong_answer) {
                echo "
                <div class='row text-center'>
                <h4 class=''> You are a little bit behind! Try more! </h4>
                </div>
                ";
            } else {
                echo "
                <div class='row text-center'>
                <h4 class='text-warning'> Keep going! Fighting! </h4>
                </div>
                ";
            }

            echo "
                    <div class='col-md-4 p-3 text-center'>
                        <div class='card p-2'>
                            <h4>Total attempts: $id</h4>
                        </div>
                    </div>

                    <div class='col-md-4 p-3 text-center'>
                        <div class='card p-2'>
                            <h4>Correct answer: $correct_answer</h4>
                        </div>
                    </div>

                    <div class='col-md-4 p-3 text-center'>
                        <div class='card p-2'>
                            <h4>Wrong answer: $wrong_answer</h4>
                        </div>
                    </div>
            
            ";

        }
    }
}



function update_user()
{
    global $conn;
    if (isset($_GET["update"])) {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_username"];

        $query = "select * from users where id = '$user_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        // $id = $row["id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $username = $row["username"];
        $email = $row["email"];
        $contact = $row["contact"];

        echo "
        <h2>Update your profile</h2>
        <div class='col-9'> 
            <form action='' method='post' enctype='multipart/form-data'>
                <div class='form-floating mb-3'>
            
                <lable for='firstname'>Firstname</label>
                    <input type='text' id='firstname' class='form-control'
                        placeholder='$firstname' name='firstname' />
                    
                </div>
                <div class='form-floating mb-3'>
                    <lable for='lastname'>Lastname</label>
                    <input type='text' id='lastname' class='form-control'
                        placeholder='$lastname' name='lastname' />
                    
                </div>
                <div class='form-floating mb-3'>
                    <lable for='email'>Email</label>
                    <input type='text' id='email' class='form-control' placeholder='" . $email . "'
                        name='email' />
                    
                </div>
                <div class='form-floating mb-3'>
                    <lable for='contact'>Contact</label>
                    <input type='text' id='contact' class='form-control'
                        placeholder='$contact' name='contact' />
                    
                </div>
                
                <div class='form-floating mb-3'>
                    <lable for='contact'>Picture</label>
                    <input type='file' id='img' class='form-control'
                        name='img' />
                    
                </div>
            
            
                <div class='d-grid'>
                    <button type='submit' name='submit'
                        class='btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2'>Update</button>
                </div>
            </form>
        </div>
    
    ";

        if (isset($_POST["submit"])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $picture = $_FILES['img']['name'];
            $temp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];

            if ($error === 0) {
                $picture_ex = pathinfo($picture, PATHINFO_EXTENSION);
                $picture_ex_lc = strtolower($picture_ex);
                $allowed_exs = array('png', 'jpg');
                if (in_array($picture_ex_lc, $allowed_exs)) {
                    $picture_upload_path = '../user/uploads/' . $picture;
                    move_uploaded_file($temp_name, $picture_upload_path);
                }
            }

            $query = "update users set firstname='$firstname', lastname='$lastname', email='$email', contact='$contact', img='$picture' where id = '$user_id';";
            $result = mysqli_query($conn, $query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
}

//User's bookmark
function user_bookmark()
{
    global $conn;
    if (isset($_GET["bookmark"])) {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_username"];
        $query = 'select distinct user_id, lecttuces_id, lecttuces_name, level, category_title from bookmark where user_id = "' . $user_id . '";';
        $result = mysqli_query($conn, $query);
        // while ($row = mysqli_fetch_array($result)) {
        //     $username = $row['username'];
        //     $exam_type = $row['exam_type'];
        //     $correct_answer = $row['correct_answer'];
        //     $wrong_answer = $row['wrong_answer'];


        if (mysqli_num_rows($result) > 0) {
            echo "
            <h2>Your bookmark</h2>
        <table class='table table-border' style='width:70%'>
            <thead>
                <tr>
                    <th scope='col'>Lecture's ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Level</th>
                    <th scope='col'>Category</th>
                    <th scope='col'>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                    
                    ";

            while ($row = mysqli_fetch_array($result)) {

                $lecttuces_id = $row["lecttuces_id"];
                $lecttuces_name = $row["lecttuces_name"];
                $level = $row["level"];
                $category_title = $row["category_title"];
                echo "
                        <tr>
                                <td>
                                    $lecttuces_id
                                </td>
                                <td>
                                    $lecttuces_name 
                                </td>
                                <td>
                                    $level
                                </td>
                                <td>
                                    $category_title
                                </td>
                                <td>
                                    <a href='delete_bookmark.php?lecttuces_id=$lecttuces_id'><i class='fa-solid fa-trash'></i></a>
                                </td>
                                
                        </tr>";
            }
            echo " 
            </tbody>
        </table>";
        } else {
            echo "<div class='row d-flex justify-content-center'>No Data Found!</div>";
        }
        // }
    }
}

// Delete bookmark
function delete_bookmark()
{
    global $conn;
    $lecttuces_id = $_GET['lecttuces_id'];

    $deleteBookmark = 'delete from bookmark where lecttuces_id = "' . $lecttuces_id . '"; ';
    mysqli_query($conn, $deleteBookmark);
    header('location: ../user/profile.php?bookmark');
}

// User's result
function result_details()
{
    global $conn;
    if (isset($_GET["result"])) {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_username"];
        $query = 'select * from exam_results where username = "' . $user_name . '";';
        $result = mysqli_query($conn, $query);
        // while ($row = mysqli_fetch_array($result)) {
        //     $username = $row['username'];
        //     $exam_type = $row['exam_type'];
        //     $correct_answer = $row['correct_answer'];
        //     $wrong_answer = $row['wrong_answer'];


        if (mysqli_num_rows($result) > 0) {
            echo "
            <h2>Your result</h2>
        <table id='data' class='table table-border' style='width:70%'>
            <thead>
                <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Exam</th>
                    <th scope='col'>Correct answer</th>
                    <th scope='col'>Wrong answer</th>
                    <th scope='col'>Date</th>
                </tr>
            </thead>
            <tbody>
                    
                    ";

            while ($row = mysqli_fetch_array($result)) {
                $username = $row['username'];
                $exam_type = $row['exam_type'];
                $correct_answer = $row['correct_answer'];
                $wrong_answer = $row['wrong_answer'];
                $date = $row['create_at'];
                echo "
                        <tr>
                                <td>
                                    $username
                                </td>
                                <td>
                                    $exam_type 
                                </td>
                                <td>
                                    $correct_answer
                                </td>
                                <td>
                                    $wrong_answer
                                </td>
                                <td>
                                    $date
                                </td>
                        </tr>";
            }
            echo " 
            </tbody>
        </table>";
        } else {
            echo "<div class='row d-flex justify-content-center'>No result was founded!</div>";
        }
        // }
    }
}

function delete_account()
{
    global $conn;

    
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_username"];

        $delete_account = 'delete from users where id = "'.$user_id.'";';
        mysqli_query($conn, $delete_account);
        header("location: homepage.php");
    }


?>