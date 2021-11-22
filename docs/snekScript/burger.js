
$(".hamburger,nav").unbind().on("click",function () {
    
    $(".hamburger").addClass("focus");
    $(".content").toggleClass("show");
    $(".buttons").toggleClass("show")
    $(".buttons").toggleClass("hide")
});