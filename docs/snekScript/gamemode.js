import { getCookie, setCookie, getElementByID } from './public.js'

let logged_in = getCookie('userid')
let gamemode = false

var gamemodeText = ""

if (logged_in === null) {

    // gamemode = "single"
    // setCookie("gamemode", gamemode, 0.01)
    $(document).ready(function () {
        $('#loginstatus').html("<p>you are not logged in you have 5 min to play</p>");

    })
}
if (getCookie('demo') !== null) {
    window.location = '/snek-game/accountSystem/login/index.php '
} else if (logged_in !== null) {
    getElementByID("button-multiplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
        $(this).toggleClass('active')
    });
    getElementByID("button-speed").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('User ', '').toLocaleLowerCase()
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
} else {
        getElementByID("button-login").addEventListener("click", function () {
            window.location = '/snek-game/accountSystem/login/index.php'
        })
        getElementByID("button-singleplayer").addEventListener("click", function () {
            gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
            setGamemode(gamemodeText);
            $(this).toggleClass('active')
        })
    
}
getElementByID("start").addEventListener("click", function () {
    window.location = 'index.php '
})



function setGamemode(game) {
    //var buttons = $(`input[id*=${game}]`);  
    //buttons.css('background-color','black')
    $('.active').toggleClass('active')
    setCookie("gamemode", game, 0)
}


