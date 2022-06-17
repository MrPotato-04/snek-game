import { getCookie, setCookie, getElementByID } from './public.js'

let gamemode = false

var gamemodeText = ""

getElementByID("button-multiplayer").addEventListener("click", function () {
    gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
    setGamemode(gamemodeText);
    $(this).toggleClass('active')
});
getElementByID("button-speed").addEventListener("click", function () {
    gamemodeText = this.innerText.replace('Custom', '').toLocaleLowerCase()
    setGamemode(gamemodeText);
    $(this).toggleClass('active')
});
getElementByID("button-singleplayer").addEventListener("click", function () {
    gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
    setGamemode(gamemodeText);
    $(this).toggleClass('active')
});
getElementByID("button-faster").addEventListener("click", function () {
    gamemodeText = "faster"
    setGamemode(gamemodeText);
    $(this).toggleClass('active')
});

getElementByID("start").addEventListener("click", function () {
    window.location = 'index.html'
})



function setGamemode(game) {
    //var buttons = $(`input[id*=${game}]`);  
    //buttons.css('background-color','black')
    $('.active').toggleClass('active')
    setCookie("gamemode", game, 0)
}


