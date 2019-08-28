$(document).ready(function(){
    $(".remove").click(function(){
        $id = $(this).val();
        $.ajax({
            url:"functions/removetask.php",
            type :"post",
            data : { id: $id},
            success: function(status){
                  $("#row"+$id+"").remove();
            }
        });
    });
});