import { getCookie, setCookie } from './game.js'

let logged_in = getCookie('userid')
let multiplayer = false



console.log(getCookie('userid') + " " + multiplayer)

if (logged_in === null) {
    
    multiplayer = false
    setCookie("Multiplayer", multiplayer, 0.25)
    console.log(getCookie('Multiplayer'))
    if(alert('you are not logged in,\nyou cant choose a game mode and you have 5 min of play time')) {
        window.location = 'index.php'
    }
}


document.getElementById("button-multiplayer").addEventListener("click", setMultiplayer)
document.getElementById("button-singleplayer").addEventListener("click", setSingleplayer)

function setMultiplayer() {
    multiplayer = true
    setCookie("Multiplayer", multiplayer, 0)
    window.location = 'index.php'
}
function setSingleplayer() {
    multiplayer = false
    setCookie("Multiplayer", multiplayer, 0)
    window.location = 'index.php'
    
}
