$(document).ready(function(){
    $('#mycarousel').carousel( { interval: 5000 } );
    $("#carouselButton").click(function(){
        if ($("#carouselButton").children("span").hasClass('fa-pause')) {
            $("#mycarousel").carousel('pause');
            $("#carouselButton").children("span").removeClass('fa-pause');
            $("#carouselButton").children("span").addClass('fa-play');
        }
        else if ($("#carouselButton").children("span").hasClass('fa-play')){
            $("#mycarousel").carousel('cycle');
            $("#carouselButton").children("span").removeClass('fa-play');
            $("#carouselButton").children("span").addClass('fa-pause');                    
        }
    });
});

$("#loginB").click(function(){
    $('#loginModal').modal('show')
});
$("#cancelB1").click(function(){
    $('#loginModal').modal('hide')
});
$("#cancelB2").click(function(){
    $('#loginModal').modal('hide')
});


$("#reserveid").click(function(){
    $('#reservationModal').modal('show')
});
$("#cancelB3").click(function(){
    $('#reservationModal').modal('hide')
});
$("#cancelB4").click(function(){
    $('#reservationModal').modal('hide')
});