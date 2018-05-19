$( document ).ready(function() {
    console.log( "ready!!!!!" );
    $("#info-submitted").on('click', function()
    {
        console.log("Admin typed: " + $('#name').val());
        sendInfoToServer($('#name').val());
    });
    function sendInfoToServer(name){
        $.ajax({
            type : "GET",
            url  : "checkSub.php",            
            dataType : "json",
            data : {"name" : name},            
            success : function(data){
                
                if(!data){
                    alert("Unsuccessful");
                }
                else{
                    alert("successful");
                }
                
                // console.log("In success handler: ");
                // console.log(data);
                // var status = "Thank you! You have successfully deleted the Substitute.";
                //     alert("Thank you! You have successfully deleted the Substitute.");
                //     $("#ans").html(status);
            },
            complete: function(data,status) { 
            //   alert("successfully");
            }

        });
    }
});