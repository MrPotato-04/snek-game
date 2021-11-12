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
import { getCookie, setCookie, getElementByID } from './public.js'

let demoOver = getCookie("demo")

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
        console.log(demoOver)
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
            SNAKE_SPEED = 10
        }

    }
    // demo timer
    var timeleft = (60 * 5);
    var downloadTimer = setInterval(function () {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
        }
        if (getElementByID("progressBar")) {
            getElementByID("progressBar").value = (60 * 5) - timeleft;
        }

        timeleft -= 1;
    }, 1000);



    let lastRenderTime = 0
    let redGameOver = false
    let blueGameOver = false


    function main(currentTime) {
        { //check if a snake is dead
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
        }
        //dont touch this is part of rendering function
        window.requestAnimationFrame(main)
        const secondsSinceLastRender = (currentTime - lastRenderTime) / 1000
        if (secondsSinceLastRender < 1 / SNAKE_SPEED) return
        lastRenderTime = currentTime

        //cals data update and draw functions
        update()
        draw()


        let userid = getCookie('userid')
        if (userid === null) {
            if (timeleft === 0) {
                console.log("time's up")
                setCookie("demo", true, 200)
                if (confirm("Demo time is up")) {
                    window.location = "./../accountSystem/login/index.php"
                } else {
                    window.location = "./../accountSystem/login/index.php"
                }

            }
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

        redGameOver = outsideGrid(getSnakeHead_1()) || snakeIntersection_1()
        blueGameOver = outsideGrid(getSnakeHead_2()) || snakeIntersection_2()
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
            window.location = './gamemode.php'
            break
    }
})

// unused but dont delete YET...
function setScore(score1, score2) {
    if (score1 < score2) return score2
    if (score2 < score1) return score1
}