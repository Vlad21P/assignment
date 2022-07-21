$(document).ready(function(){
    $("#test2").submit(function(e) { //submit on FORM (one form) , not on button + preventDEF
        e.preventDefault();
        var mainData = {
            sku : $("#sku").val(),
            name : $("#name").val(),
            price : $("#price").val()
        };
        if($("#productType").val() == "DVD"){
            var data = Object.assign(mainData, {size : $("#size").val()});
            $.ajax({
                type: "POST",
                url: "http://localhost/php/checks/check_add.php", 
                data: data,
                success:function(){
                    let url = "../index.php";
                    $(location).attr('href',url);  
                }
            });
        } else if($("#productType").val() == "Book"){
            var data = Object.assign(mainData, {weight : $("#weight").val()});
            $.ajax({
                type: "POST",
                url: "http://localhost/php/checks/check_add.php", 
                data: data,
                success:function(){
                    let url = "../index.php";
                    $(location).attr('href',url);  
                }
            });
        } else if($("#productType").val() == "Furniture") {
            var data = Object.assign(mainData, {
                height : $("#height").val(),
                width : $("#width").val(),
                length : $("#length").val()
            });
            $.ajax({
                type: "POST",
                url: "http://localhost/php/checks/check_add.php", 
                data: data,
                success:function(){
                    let url = "../index.php";
                    $(location).attr('href',url);  
                }
            });
        } else {
            $("#error").html("please, select the product type & fill the inputs");
        }
    });
});