import { update as updateSnake_1, draw as drawSnake_1,
getSnakeHead as getSnakeHead_1, snakeIntersection as snakeIntersection_1 } from './snake.js'

import { update as updateSnake_2, draw as drawSnake_2, getSnakeHead as getSnakeHead_2,
    snakeIntersection as snakeIntersection_2 } from './snake2.js'

import { update as updateFood, draw as drawFood } from './food.js'
import { GRID_HEIGTH, GRID_WIDTH, outsideGrid} from './grid.js'
import { draw as drawBoard } from './board.js'

//const tmp = `repeat(${GRID_SIZE}, 1fr)` 

window.onload = function() {
    gameBoard.style.gridTemplateColumns = `repeat(${GRID_WIDTH}, 1fr)`;
    gameBoard.style.gridTemplateRows = `repeat(${GRID_HEIGTH}, 1fr)`;
};

const SNAKE_SPEED = 10

let lastRenderTime = 0
let redGameOver = false
let blueGameOver = false
const gameBoard = document.getElementById('game-board')


function main(currentTime) {
    if (redGameOver) {
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


    console.log('Render')
    
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
