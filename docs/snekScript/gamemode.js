import { getCookie, setCookie, getElementByID } from './public.js'

let logged_in = getCookie('userid')
let gamemode = false

var gamemodeText = ""

if (logged_in === null) {

    // gamemode = "single"
    // setCookie("gamemode", gamemode, 0.01)
    console.log(getCookie('gamemode'))
    alert('you are not logged in,\nyou cant choose a game mode and you have 5 min of play time')
}

$(".hamburger,nav").click(function () {
    $(".hamburger").toggleClass("focus");
    $(".content").toggleClass("show");
    $(".buttons").toggleClass("show")
    $(".buttons").toggleClass("hide")
});

if (logged_in !== null) {
    getElementByID("button-multiplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    });
    getElementByID("button-speed").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('User ', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    })
        getElementByID("button-singleplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    })
}
if (getCookie('demo') !== null) {
    getElementByID("button-singleplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    })
}
function setGamemode(game) {
    setCookie("gamemode", game, 0)
    window.location = 'index.php'
}

getElementByID("button-login").addEventListener("click", function () {
    window.location = './../accountSystem/login/index.php'
})


