let logged_in = getCookie('userid')
let multiplayer = false



console.log(getCookie('userid') + " " + multiplayer)

if (logged_in === null) {
    
    multiplayer = false
    setCookie("Multiplayer", multiplayer, 0.25)
    console.log(getCookie('Multiplayer'))
    if(confirm('you are not logged in,\nyou cant choose a game mode and you have 5 min of play time')) {
        window.location = 'index.php'
    }
}


document.getElementById("button-multiplayer").addEventListener("click", setMultiplayer)
document.getElementById("button-singleplayer").addEventListener("click", setSingleplayer)

function setMultiplayer() {
    multiplayer = true
    setCookie("Multiplayer", multiplayer, 0.25)
    window.location = 'index.php'
}
function setSingleplayer() {
    multiplayer = false
    setCookie("Multiplayer", multiplayer, 0.25)
    window.location = 'index.php'
    
}



function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}