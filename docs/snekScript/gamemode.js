import { getCookie, setCookie, getElementByID} from './public.js'

let logged_in = getCookie('userid')
let gamemode = false

var gamemodeText = ""

if (logged_in === null) {

    // gamemode = "single"
    // setCookie("gamemode", gamemode, 0.01)
    $(document).ready(function(){
        
        alert("you are not logged in you have 5 min to play")
    })
}

if (logged_in !== null) {
    getElementByID("button-multiplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    });
    getElementByID("button-speed").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('User ', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    });
    getElementByID("button-singleplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    });
    getElementByID("button-faster").addEventListener("click", function () {
        gamemodeText = "faster"
        setGamemode(gamemodeText);
    });
} else {
    getElementByID("button-login").addEventListener("click", function () {
        window.location = '/snek-game/accountSystem/login/index.php'
    })
    getElementByID("button-singleplayer").addEventListener("click", function () {
        gamemodeText = this.innerText.replace('player', '').toLocaleLowerCase()
        setGamemode(gamemodeText);
    })
    if (getCookie('demo')!== null) {
        window.location = '/snek-game/accountSystem/login/index.php '
    }
}
getElementByID("start").addEventListener("click", function () {
    window.location = 'index.php '
})



function setGamemode(game) {
    setCookie("gamemode", game, 0)
}


