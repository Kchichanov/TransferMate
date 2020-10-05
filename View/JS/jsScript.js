$(document).ready(function(){


    $("#startBtn").click(function() {

        var start="start";

        $.post("Helper.php",{

            start: start 

        },function(data,status){
    
            
            $("#startBtn").hide();

            var obj = jQuery.parseJSON(data);
            var dropdown=$("#dropdown");
            $.each(obj,function(index,value){
                
                dropdown.append($("<option />").val(value).text(value));
    
            });

            $("#srchForm").css("visibility","visible");
        
            
        })
        
      });


    $("form").submit(function(event){

    event.preventDefault();

    var value = $("#dropdown").val();

    $.post("Helper.php",{

        value : value
    },function(data,status){


        var obj = jQuery.parseJSON(data);

        $("#result").append(obj);
        $("#srchForm").hide();
        $("#result").css("visibility","visible");
    
        
    })
    


});
    













})