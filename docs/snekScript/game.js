import {
    update as updateSnake_1, draw as drawSnake_1, redScore,
    getSnakeHead as getSnakeHead_1, snakeIntersection as snakeIntersection_1, onSnake as onSnake_1
} from './snake.js'

import {
    update as updateSnake_2, draw as drawSnake_2, blueScore,
    getSnakeHead as getSnakeHead_2, snakeIntersection as snakeIntersection_2, onSnake as onSnake_2
} from './snake2.js'

import { update as updateFood, draw as drawFood, speed } from './food.js'
import { GRID_HEIGTH, GRID_WIDTH, outsideGrid } from './grid.js'
import { draw as drawBoard, inWater } from './board.js'
import { getCookie, setCookie, getElementByID } from './public.js'


var gameBoard = getElementByID('game-board')
var scores = getElementByID('scores')
var controls = document.getElementById("controls")
if (getCookie('gamemode') !== null) {

    //set gamemode var from cookie
    var gamemode = "";
    gamemode = getCookie("gamemode")
    //set grid size
    window.onload = function () {
        gameBoard.style.gridTemplateColumns = `repeat(${GRID_WIDTH}, 1fr)`;
        gameBoard.style.gridTemplateRows = `repeat(${GRID_HEIGTH}, 1fr)`;

    };


    if (controls !== null) {
        if (gamemode === "multi") {
            controls.innerHTML = `Player 1 = Up,Down,Left,Right & Player 2 = W,A,S,D`
        } else {
            controls.innerHTML = `Player 1 = Up,Down,Left,Right`
        }

    }


    let SNAKE_SPEED = 10

    if (window.location.href.indexOf("index") > -1) {
        if (gamemode === "speed") {
            SNAKE_SPEED = prompt('type snake speed')
        } else {
            SNAKE_SPEED = 7
        }

    }



    let lastRenderTime = 0
    let redGameOver = false
    let blueGameOver = false
    let pauze = false

    function main(currentTime) {

        $(".hamburger,nav").unbind().on("click", function () {
            $(".hamburger").addClass("focus");
            $(".content").toggleClass("show");
            $(".buttons").toggleClass("show")
            $(".buttons").toggleClass("hide")
            pauze = !pauze;
            console.log("sss")
        });
        { //check if a snake is dead
            if (redGameOver) {
                setCookie("highscore", redScore, "1");
                if (confirm('Player 1 lost! press ok to restart')) {
                    window.location = 'gamemode.html'
                } else {
                    window.location = 'gamemode.html'
                }
                return
            }
            if (blueGameOver) {
                setCookie("highscore", blueScore, "1");
                if (confirm('Player 2 lost! press ok to restart')) {
                    window.location = 'gamemode.html'
                } else {
                    window.location = 'gamemode.html'
                }
                return
            }
        }
        console.log(pauze)
        //dont touch this is part of rendering function
        window.requestAnimationFrame(main)
        const secondsSinceLastRender = (currentTime - lastRenderTime) / 1000

        if (pauze) return

        if (secondsSinceLastRender < 1 / SNAKE_SPEED || pauze === true) return
        lastRenderTime = currentTime

        //cals data update and draw functions
        update()
        draw()
        if (gamemode === "faster") {
            SNAKE_SPEED = speed
        }
    }
    //name says it why 2 times i don't know'
    window.requestAnimationFrame(main)



    // update data
    function update() {

        updateSnake_1()
        if (gamemode === "multi") { updateSnake_2() }

        updateFood()
        updateScores(redScore, blueScore)
        checkDeath()

    }
    //draw data to screen
    function draw() {
        //clear old draw data
        gameBoard.innerHTML = ''

        //draw new data
        drawBoard(gameBoard)


        drawSnake_1(gameBoard)
        if (gamemode === "multi") { drawSnake_2(gameBoard) }

        drawFood(gameBoard)
    }

    function checkDeath() {
        redGameOver = snakeIntersection_1() || inWater(getSnakeHead_1()) || ((gamemode === "multi") ? onSnake_1(getSnakeHead_2()) : '');
        if (gamemode === "multi") { blueGameOver = snakeIntersection_2() || inWater(getSnakeHead_2()) || onSnake_2(getSnakeHead_1()) }
    }

    function updateScores(score1, score2) {
        if (getCookie('gamemode') === 'multi') {
            scores.innerHTML = `Player 1 score: ${score1}, Player 2 score: ${score2}`
        } else {
            scores.innerHTML = `Player 1 score: ${score1}`
        }


    }
}

//do i even need to explain?
window.addEventListener('keydown', e => {

    switch (e.key) {
        case 'g':
            window.location = './gamemode.html'
            break
    }
})