$(document).ready(
    $("#submit").click(function(){
        $.post($("#register").attr("action"),
               $("#register :input").serializeArray(),
        function(info){
            if (info == 'ok') {
                window.location.href = "profile.php";
            };
            $("#ack").empty();
            $("#ack").html(info);
        });
        $("#register").submit(function(){
            return false;	});
    })
)
