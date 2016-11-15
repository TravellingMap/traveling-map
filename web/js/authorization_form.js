$(document).ready(
    $("#submitv").click(function(){
        $.post($("#authorization").attr("action"),
               $("#authorization :input").serializeArray(),
        function(info){
            if (info == 'ok') {
                 window.location.href = "profile.html";
            };
            $("#ackv").empty();
            $("#ackv").html(info);
        });
        $("#authorization").submit(function(){
            return false;	});
    })
)