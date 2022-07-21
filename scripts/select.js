$(document).ready(function(){
    $("select#productType").val("...").change(function(){
        let type = $("select#productType").val();
        if(type == "DVD") {
            $("div#DVD").show();
            $("div#Book").hide();
            $("div#Furniture").hide();
        } else if (type == "Book") {
            $("div#Book").show();
            $("div#DVD").hide();
            $("div#Furniture").hide();
        } else {
            $("div#Furniture").show();
            $("div#Book").hide();
            $("div#DVD").hide();
        }
    });
 });

