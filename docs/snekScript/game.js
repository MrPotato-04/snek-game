import { update as updateSnake_1, draw as drawSnake_1, redScore,
getSnakeHead as getSnakeHead_1, snakeIntersection as snakeIntersection_1 } from './snake.js'

import { update as updateSnake_2, draw as drawSnake_2, blueScore,
    getSnakeHead as getSnakeHead_2, snakeIntersection as snakeIntersection_2 } from './snake2.js'

import { update as updateFood, draw as drawFood } from './food.js'
import { GRID_HEIGTH, GRID_WIDTH, outsideGrid} from './grid.js'
import { draw as drawBoard } from './board.js'

//const tmp = `repeat(${GRID_SIZE}, 1fr)` 

window.onload = function() {
    gameBoard.style.gridTemplateColumns = `repeat(${GRID_WIDTH}, 1fr)`;
    gameBoard.style.gridTemplateRows = `repeat(${GRID_HEIGTH}, 1fr)`;
    console.log(multiplayer)
    
};

const scores = document.getElementById('scores');

const SNAKE_SPEED = 10

// let blueScore = 0;
// let redScore = 0;

let multiplayer = false
let lastRenderTime = 0
let redGameOver = false
let blueGameOver = false
const gameBoard = document.getElementById('game-board')



//check if gameboard is pressent
function main(currentTime) {
    if (redGameOver) {
        // sendHighscore(redScore)
        setCookie("highscore", redScore, "1");
        if (confirm('Red lost! press ok to restart')) {
            window.location = ''
        }
        return
    }
    if (blueGameOver) {
        if (confirm('Blue lost! press ok to restart')) {
            window.location = ''
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
}

window.requestAnimationFrame(main)

function update() {
        updateSnake_1()
        updateSnake_2()
        updateFood()
        checkDeath()
        updateScores(redScore, blueScore)

        
}

function draw() {
        gameBoard.innerHTML = ''
        drawBoard(gameBoard)
        drawSnake_1(gameBoard)
        drawSnake_2(gameBoard)
        drawFood(gameBoard)
}

function checkDeath() {

        redGameOver = outsideGrid(getSnakeHead_1()) || snakeIntersection_1()
        blueGameOver = outsideGrid(getSnakeHead_2()) || snakeIntersection_2()
}
function updateScores(score1, score2) {
        scores.innerHTML = `Red score: ${score1}, Blue score: ${score2}`
        
}
function sendHighscore(str) {
        if (str == "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","./../highscore.php?score="+str,true);
        xmlhttp.send();
    } 
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
