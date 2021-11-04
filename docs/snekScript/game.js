import {
    update as updateSnake_1, draw as drawSnake_1, redScore,
    getSnakeHead as getSnakeHead_1, snakeIntersection as snakeIntersection_1
} from './snake.js'

import {
    update as updateSnake_2, draw as drawSnake_2, blueScore,
    getSnakeHead as getSnakeHead_2, snakeIntersection as snakeIntersection_2
} from './snake2.js'

import { update as updateFood, draw as drawFood } from './food.js'
import { GRID_HEIGTH, GRID_WIDTH, outsideGrid } from './grid.js'
import { draw as drawBoard } from './board.js'


//const tmp = `repeat(${GRID_SIZE}, 1fr)` 
var multiplayer = false;

multiplayer = getCookie("Multiplayer")

window.onload = function () {
    gameBoard.style.gridTemplateColumns = `repeat(${GRID_WIDTH}, 1fr)`;
    gameBoard.style.gridTemplateRows = `repeat(${GRID_HEIGTH}, 1fr)`;
    console.log(multiplayer)

};

const scores = document.getElementById('scores');

const SNAKE_SPEED = 3

// let blueScore = 0;
// let redScore = 0;

var timeleft = (60*5);
var downloadTimer = setInterval(function () {
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
    }
    if (document.getElementById("progressBar")) {
        document.getElementById("progressBar").value = (60*5) - timeleft;
    }

    timeleft -= 1;
}, 1000);



let lastRenderTime = 0
let redGameOver = false
let blueGameOver = false
const gameBoard = document.getElementById('game-board')

window.addEventListener('keydown', e => {

    switch (e.key) {
        case 'g':
            window.location = './gamemode.php'
            break
    }
})

//check if gameboard is pressent
function main(currentTime) {
    if (redGameOver) {
        setCookie("highscore", redScore, "1");
        if (confirm('Red lost! press ok to restart')) {
            window.location = 'highscore.php'
        } else {
            window.location = 'highscore.php'
        }
        return
    }
    if (blueGameOver) {
        setCookie("highscore", blueScore, "1");
        if (confirm('Blue lost! press ok to restart')) {
            window.location = 'highscore.php'
        } else {
            window.location = 'highscore.php'
        }
        return
    }

    window.requestAnimationFrame(main)
    const secondsSinceLastRender = (currentTime - lastRenderTime) / 1000
    if (secondsSinceLastRender < 1 / SNAKE_SPEED) return


    // console.log('Render')

    lastRenderTime = currentTime


    update()
    draw()

    if (timeleft === 0) {
        console.log("nigga")
        setCookie("demoExpire", true, 20)
        if(confirm("Demo time is up")){
            window.location = "./../accountSystem/login/index.php"
        } else {
            window.location = "./../accountSystem/login/index.php"
        }
        
    }
}

window.requestAnimationFrame(main)

function update() {
    updateSnake_1()
    if (multiplayer) { updateSnake_2() }
    updateFood()
    checkDeath()
    updateScores(redScore, blueScore)


}

function draw() {
    gameBoard.innerHTML = ''
    drawBoard(gameBoard)
    drawSnake_1(gameBoard)
    if (multiplayer) { drawSnake_2(gameBoard) }
    drawFood(gameBoard)
}

function checkDeath() {

    redGameOver = outsideGrid(getSnakeHead_1()) || snakeIntersection_1()
    blueGameOver = outsideGrid(getSnakeHead_2()) || snakeIntersection_2()
}
function updateScores(score1, score2) {
    scores.innerHTML = `Red score: ${score1}, Blue score: ${score2}`

}

export function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
export function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}