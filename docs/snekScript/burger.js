$(".hamburger,nav").on("click",function () {
    $(".hamburger").toggleClass("focus");
    $(".content").toggleClass("show");
    $(".buttons").toggleClass("show")
    $(".buttons").toggleClass("hide")
});