function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
     var kkr_link_word_kkr_wit = document.getElementsByTagName("a");
    console.log(kkr_link_word_kkr_wit)
    for(let i = 0; i < kkr_link_word_kkr_wit.length; i++) {
        kkr_link_word_kkr_wit[i].classList.toggle('jekankermoeder');
    }



}


