$(document).ready(function(){
    $("#test").submit(function(e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "http://localhost/php/checks/check_delete.php", 
            data: $(this).serialize(),
            success:function(){
                let url = "../index.php";
                $(location).attr('href',url);  
            }
        });
    });
});

