$(document).ready(function(){
    $("#live_search").keyup(function(){
        var input = $(this).val();
        // alert (input);
        if(input != ""){
            $.ajax({
                url: "../user/searchTest.php",
                method: "POST",
                data: {input:input},

                success:function(data){
                    $("#searchResult").html(data);
                }
            });
        }else{
            $("#searchResult").css("display","none");
        }
    });
});