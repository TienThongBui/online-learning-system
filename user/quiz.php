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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>

    <title>Title</title>
</head>

<body>
    <style>
        .main {
            width: 100%;
            min-height: 70vh;
            margin-top: 4em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .quiz-container {
            width: 40rem;
            height: 30rem;
            background-color: lightgray;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
        }

        .details-container {
            width: 80%;
            height: 4rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .details-container h1 {
            font-size: 1.2rem;
        }

        #coundowntimer {
            display: block;
        }

        .question-container {
            width: 80%;
            height: 8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid darkgray;
            border-radius: 25px;
        }

        .question-container h1 {
            font-size: 30px;
            text-align: center;
            /* margin-left: 100px; */
            /* padding: 3px; */
        }

        .options-container {
            width: 80%;
            height: 12rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
        }

        .options-container span {
            background-color: white;
            width: 45%;
            height: 3rem;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px solid darkgray;
            border-radius: 25px;
        }

        .options-container span label {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s;
            font-weight: 600;
            color: rgb(22, 22, 22);
        }

        input[type="radio"] {
            position: relative;
            font-size: 30px;
            /* display: none; */
        }


        input[type=radio]:checked+label {
            background: paleturquoise;
        }

        .button-container {
            width: 50%;
            height: 3rem;
            display: flex;
            justify-content: center;
        }

        .button-container button {
            width: 8rem;
            height: 2rem;
            border-radius: 10px;
            background: none;
            color: rgb(25, 25, 25);
            font-weight: 600;
            border: 2px solid gray;
            cursor: pointer;
            outline: none;
        }

        .button-container button:hover {
            background-color: rgb(143, 93, 93);
        }

        .modal-container {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            -webkit-animation: fadeIn 1.2s ease-in-out;
            animation: fadeIn 1.2s ease-in-out;
        }

        .modal-content-container {
            height: 20rem;
            width: 25rem;
            background-color: rgb(43, 42, 42);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            border-radius: 25px;
        }

        .modal-content-container h1 {
            font-size: 1.3rem;
            height: 3rem;
            color: lightgray;
            text-align: center;
        }

        .modal-button-container {
            height: 2rem;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-button-container button {
            width: 10rem;
            height: 2rem;
            background: none;
            outline: none;
            border: 1px solid rgb(252, 242, 241);
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            border-radius: 20px;
        }

        .modal-button-container button:hover {
            background-color: rgb(83, 82, 82);
        }
    </style>

    <?php
    include "../partitials/header.php";
    ?>

    <div class="main">
        <div class="quiz-container">
            <div class="details-container">
                <h1>
                    Question:
                    <span id="current_quiz">0</span>
                    /
                    <span id="total_quiz">0</span>
                </h1>

                <h1 class="d-flex ">
                    <span><i class="fa-regular fa-clock"></i></span>
                    &nbsp;
                    <span>
                        <div id="countdowntimer"></div>
                    </span>
                </h1>

            </div>


            <div id="load_questions" class="d-flex justify-content-center flex-wrap"></div>


            <div class="button-container">

                <button type="button" values="Previous" onclick="load_previous();">Previous</button>
                &nbsp;

                <button type="button" values="Previous" onclick="load_next();">Next</button>
            </div>
        </div>
    </div>






    <script type="text/javascript">
        setInterval(function () {
            timer();
        }, 1000);
        function timer() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    if (xmlhttp.responseText == "00:00:01") {
                        window.location = "result.php";
                    }

                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

                }
            };
            xmlhttp.open("GET", "../forajax/load_timer.php", true);
            xmlhttp.send(null);
        }


        function load_total_quiz() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                    document.getElementById("total_quiz").innerHTML = xmlhttp.responseText;

                }
            };
            xmlhttp.open("GET", "../forajax/load_total_quiz.php", true);
            xmlhttp.send(null);
        }

        var questionNo = "1";
        load_questions(questionNo);

        function load_questions(questionNo) {
            document.getElementById("current_quiz").innerHTML = questionNo;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    if (xmlhttp.responseText == "over") {
                        window.location = "../user/result.php";
                    }
                    else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_quiz();
                    }

                }
            };
            xmlhttp.open("GET", "../forajax/load_quiz.php?questionNo=" + questionNo, true);
            xmlhttp.send(null);
        }

        function radioclick(radiovalue, questionNo) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                }
            };
            xmlhttp.open("GET", "../forajax/save_answer_in_session.php?questionNo=" + questionNo + "&value1=" + radiovalue, true);
            xmlhttp.send(null);
        }


        function load_previous() {
            if (questionNo == "1") {
                load_questions(questionNo);
            }
            else {
                questionNo = eval(questionNo) - 1;
                load_questions(questionNo);
            }
        }

        function load_next() {

            questionNo = eval(questionNo) + 1;
            load_questions(questionNo);
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>