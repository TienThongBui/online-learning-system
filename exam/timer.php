<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>

    <div class="main">
        <div class="container d-flex justify-content-end">
            <div class="row">
                <div class="col text-right">
                    <div id="countdowntimer">

                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    setInterval(function() {
        timer();
    }, 1000);
    function timer() 
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if(xmlhttp.readyState==4 && xmlhttp.status==200) {
                if(xmlhttp.responseText=="00:00:01") {
                    // window.location = "result.php";
                }

                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                // document.getElementById('countdowntimer').innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../forajax/load_timer.php", true);
        xmlhttp.send(null);
    }
</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>