function myFunction() {
    var body = document.body;
    body.classList.toggle("dark-mode");

    var A_element = document.getElementsByTagName("a");
    for(let i = 0; i < A_element.length; i++) {
        A_element[i].classList.toggle('jekankermoeder');
    }

}


