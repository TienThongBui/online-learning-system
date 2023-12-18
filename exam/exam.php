<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/login.view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<style>
    .main {
        margin-left: 65px;
        padding: 0px 10px; 
    }    

    #countdowntimer {
        display: block;
    }
</style>
<body>

<?php
    //include '../partitials/side_menu.php';
?>

 <?php
        include 'timer.php';
?>
    <div class="main">
       <div class="container">
            <div class="row">
                <br>
                <div class="col">
                    <div id="current_quiz">0</div>
                    <div>/</div>
                    <div id="total_quiz">0</div>
                </div>

                <div class="row d-flex mt-3">
                    <div class="row">
                        <div class="col-12" id="load_questions">

                        </div>
                    </div>
                </div>

                <div class="row d-flex mt-3">
                    <div class="col">
                        <div class="col text-center">
                            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">
                            &nbsp;
                            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                        </div>
                    </div>
                </div>

            </div>
       </div>
    </div>

<script type="text/javascript">

    function load_total_quiz() 
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200) {
                

                document.getElementById("total_quiz").innerHTML=xmlhttp.responseText;
               
            }
        };
        xmlhttp.open("GET","../forajax/load_total_quiz.php", true);
        xmlhttp.send(null);
    }


    var questionNo="1";
    load_questions(questionNo);

    function load_questions(questionNo)
    {
       document.getElementById("current_quiz").innerHTML=questionNo;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200) {

              if(xmlhttp.responseText=="over")
              {
                window.location="../result/result.php";
              }
              else
              {
                document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                load_total_quiz();
              }

            }
        };
        xmlhttp.open("GET","../forajax/load_quiz.php?questionNo="+questionNo, true);
        xmlhttp.send(null);
    }

    function radioclick(radiovalue, questionNo) 
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            
            }
        };
        xmlhttp.open("GET","../forajax/save_answer_in_session.php?questionNo="+ questionNo + "&value1="+ radiovalue, true);
        xmlhttp.send(null);
    }

    function load_previous()
    {
        if(questionNo == "1")
        {
            load_questions(questionNo);
        }
        else
        {
            questionNo = eval(questionNo) - 1;
            load_questions(questionNo);
        }
    }

    function load_next()
    {
        
        questionNo = eval(questionNo) + 1;
        load_questions(questionNo);
    }
</script>


</body>
</html>