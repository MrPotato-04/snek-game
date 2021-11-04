import { getInputDirection_snake1 } from "./input.js"
import { GRID_HEIGTH, GRID_WIDTH } from "./grid.js"
import { getCookie } from "./game.js"

let multiplayer = getCookie("Multiplayer")

export var redScore = 0;


console.log("SNAKE.JS "+ multiplayer)
if (multiplayer) { 
    var startPos = 3
} else {
    var startPos = 2
}
console.log(startPos)
const snakeBody = [{ x: Math.floor(GRID_WIDTH / startPos), y: Math.floor(GRID_HEIGTH / 2) }]
const snakeSkinRotation = [{ x: 0, y: 0 }]
let newSegments = 2


export function update() {
    addSegments()
    const inputDirection = getInputDirection_snake1()
    for (let i = snakeBody.length - 2; i >= 0; i--) {
        snakeBody[i + 1] = { ...snakeBody[i] }
        snakeSkinRotation[i + 1] = { ...snakeSkinRotation[i] }
    }


    //  checks if snake out of bounds for infinite loop
    if (snakeBody[0].x === GRID_WIDTH && inputDirection.x === 1) {
        snakeBody[0].x = 1
    } else if (snakeBody[0].x === 1 && inputDirection.x === -1) {
        snakeBody[0].x = GRID_WIDTH
    } else if (snakeBody[0].y === GRID_HEIGTH && inputDirection.y === 1) {
        snakeBody[0].y = 1
    } else if (snakeBody[0].y === 1 && inputDirection.y === -1) {
        snakeBody[0].y = GRID_HEIGTH
    }
    // sets direction of snake
    else {
        snakeBody[0].x += inputDirection.x
        snakeBody[0].y += inputDirection.y
        snakeSkinRotation[0].x = inputDirection.x
        snakeSkinRotation[0].y = inputDirection.y
    }






}

export function draw(gameBoard) {

    const inputDirection = getInputDirection_snake1()
    let direction = "up"

    snakeBody.forEach((segment, index) => {
        const snakeElement = document.createElement('div')
        snakeElement.style.gridRowStart = segment.y
        snakeElement.style.gridColumnStart = segment.x
        

        switch (snakeSkinRotation[index].y) {
            case -1:
                direction = "up"
                break;
            case 1:
                direction = "down"
                break;
        }
        switch (snakeSkinRotation[index].x) {
            case -1:
                direction = "left"
                break;
            case 1:
                direction = "right"
                break;
        }
        
        
        if (index === 0) {
            snakeElement.classList.add('snake_1_head_'+direction)

        } else if(index === snakeBody.length - 1) {
            let tailDir = 'up'
            if (direction=== 'up' ) {
                switch (snakeSkinRotation[index - 1].x) {
                    case -1:
                        

                }
                tailDir = 'up'
            }
            if (direction === 'down') {
                tailDir = 'down'
            }
            if (direction === 'left') {
                    tailDir = 'left';
            }
            if (direction==='right') {
                tailDir = 'right'
            }
            
            snakeElement.classList.add('snake_1_tail_'+tailDir)
        } else {
            let bodyDir = 'hor'
            if (direction === "up" || direction === "down") {
                bodyDir = 'ver'
            } else {
                bodyDir = 'hor'
            }
            snakeElement.classList.add('snake_1_body_'+bodyDir)
        }
        
        gameBoard.appendChild(snakeElement)


    })
}

export function expandSnake(amount) {
    newSegments += amount;
    redScore++;
}
export function onSnake(position, { ignoreHead = false } = {}) {
    return snakeBody.some((segment, index) => {
        if (ignoreHead && index === 0) return false
        return equalPositions(segment, position)
    })
}

export function getSnakeHead() {
    return snakeBody[0] //snake head
}

export function snakeIntersection() {
    return onSnake(snakeBody[0], { ignoreHead: true })
}

function equalPositions(pos1, pos2) {
    return pos1.x === pos2.x && pos1.y === pos2.y
}

function addSegments() {
    for (let i = 0; i < newSegments; i++) {
        snakeBody.push({ ...snakeBody[snakeBody.length - 1] })
        snakeSkinRotation.push({ ...snakeSkinRotation[snakeSkinRotation.length - 1] })
    }
    newSegments = 0
}