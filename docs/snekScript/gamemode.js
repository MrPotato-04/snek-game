import { getCookie, setCookie } from './game.js'

let logged_in = getCookie('userid')
let gamemode = false

if (logged_in === null) {
    
    gamemode = "single"
    setCookie("gamemode", gamemode, 0.01)
    console.log(getCookie('gamemode'))
    if(confirm('you are not logged in,\nyou cant choose a game mode and you have 5 min of play time')) {
        window.location = 'index.php'
    } else {
        window.location = 'index.php'
    }
}


document.getElementById("button-multiplayer").addEventListener("click", setMultiplayer)
document.getElementById("button-singleplayer").addEventListener("click", setSingleplayer)
document.getElementById("button-speed").addEventListener("click", setModeSpeed)

function setMultiplayer() {
    gamemode = "single"
    setCookie("gamemode", gamemode, 0)
    window.location = 'index.php'
}
function setSingleplayer() {
    gamemode = "multi"
    setCookie("gamemode", gamemode, 0)
    window.location = 'index.php'
    
}

function setModeSpeed() {
    setCookie("gamemode", "speed", 0.1)
    setSingleplayer
}