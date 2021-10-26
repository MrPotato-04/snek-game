import { getInputDirection_snake2 } from "./input.js"
import { GRID_HEIGTH, GRID_WIDTH } from "./grid.js"



const snakeBody = [{ x: Math.floor(GRID_WIDTH / 3 * 2), y: Math.floor(GRID_HEIGTH / 2) }]
let newSegments = 0


export function update() {
    addSegments()
    const inputDirection = getInputDirection_snake2()
    for (let i = snakeBody.length - 2; i >= 0; i-- ) {
        snakeBody[i + 1] = { ...snakeBody[i] }
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
    }
    
    

        

    
}

export function draw(gameBoard) {
    snakeBody.forEach(segment => {
        const snakeElement = document.createElement('div')
        snakeElement.style.gridRowStart = segment.y
        snakeElement.style.gridColumnStart = segment.x
        snakeElement.classList.add('snake_2')
        gameBoard.appendChild(snakeElement)
        
    })
}

export function expandSnake(amount) {
    newSegments += amount
}
export function onSnake(position, { ignoreHead = false } = { }) {
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
    for (let i = 0; i < newSegments; i ++) {
        snakeBody.push({ ...snakeBody[snakeBody.length - 1] })
    }
    newSegments = 0
}