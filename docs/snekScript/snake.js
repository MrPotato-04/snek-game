import { getInputDirection_snake1, getRotation } from "./input.js"
import { GRID_HEIGTH, GRID_WIDTH } from "./grid.js"
import { getCookie } from "./game.js"

let multiplayer = getCookie("Multiplayer")

export var redScore = 0;


console.log("SNAKE.JS " + multiplayer)
if (multiplayer) {
    var startPos = 3
} else {
    var startPos = 2
}

const snakeBody = [{ x: Math.floor(GRID_WIDTH / startPos), y: Math.floor(GRID_HEIGTH / 2), skin: "snake_1", rot: 0 }]
let snakeSkinRotation = [{ x: 0, y: 0}]
let newSegments = 3
let missCounter = 0

export function update() {
    addSegments()
    const inputDirection = getInputDirection_snake1()
    for (let i = snakeBody.length - 2; i >= 0; i--) {
        snakeBody[i + 1] = { ...snakeBody[i] }
        // snakeSkinRotation[i + 1] = { ...snakeSkinRotation[i] }
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
        // snakeSkinRotation[0].x = inputDirection.x
        // snakeSkinRotation[0].y = inputDirection.y
    }






}

export function draw(gameBoard) {
    var rotation = getRotation()
    let direction = "up"
    const inputDirection = getInputDirection_snake1()
    console.log(rotation)
    snakeBody.forEach((segment, index) => {
        const snakeElement = document.createElement('div')
        snakeElement.style.gridRowStart = segment.y
        snakeElement.style.gridColumnStart = segment.x
        // console.log(snakeBody[index])
        snakeBody[0].rot = rotation
        if (index === snakeBody.length - 1) {
            snakeBody[index].rot = snakeBody[index - 1].rot
        }

        switch (snakeBody[index].rot) {
            case 0:
                direction = "up"
                break;
            case 180:
                direction = "down"
                break;
            case 270:
                direction = "left"
                break;
            case 90:
                direction = "right"
                break;
        }
        
        if (index === snakeBody.length - 1) {
            snakeBody[index].rot = snakeBody[index - 1].rot
        }
        if (index === 0) {
            snakeBody[0].skin = "snake_1_head_" + direction

        } else if (index === snakeBody.length - 1) {
            snakeBody[index].skin = "snake_1_tail_" + direction
        } else if (newSegments > 10) {

        }else {
            let body = "snake_1_body"
            let curve = "snake_1_curve"
            // if (inputDirection.x === 1 && snakeBody[index - 1].y !== snakeBody[index + 1].y ) {
                
            //     snakeBody[index].skin = curve + "_tr"
            //     // console.log("sssssssssssssssssssssssss")
            // } else if (inputDirection.x === -1 && snakeBody[index - 1].y === snakeBody[index].y) {
            //     snakeBody[index].skin = body + "_hor"	
            // } else if (inputDirection.y === 1 && snakeBody[index - 1].x === snakeBody[index].x) {
            //     snakeBody[index].skin = body + "_ver"	
            // } else if (inputDirection.y === -1 && snakeBody[index - 1].x === snakeBody[index].x) {
            //     snakeBody[index].skin = body + "_ver"	
            // } else 
            if (inputDirection.x === 1 && snakeBody[index - 1].y === snakeBody[index].y) {
                snakeBody[index].skin = body + "_hor"
            } else if (inputDirection.x === -1 && snakeBody[index - 1].y === snakeBody[index].y) {
                snakeBody[index].skin = body + "_hor"	
            } else if (inputDirection.y === 1 && snakeBody[index - 1].x === snakeBody[index].x) {
                snakeBody[index].skin = body + "_ver"	
            } else if (inputDirection.y === -1 && snakeBody[index - 1].x === snakeBody[index].x) {
                snakeBody[index].skin = body + "_ver"	
            }
        }
        console.log(snakeBody)
        snakeElement.classList.add(snakeBody[index].skin)
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

export function snakeMiss (pos) {
    console.log(missCounter)
    console.log(equalPositions(snakeBody[0], pos))
    if (equalPositions(snakeBody[0], pos)) {
        missCounter = 0 
    }

    if (getDistance(snakeBody[0].x, snakeBody[0].y, pos.x, pos.y ) < 3) {
        if (missCounter <= 2) {
            console.log("in range" + getDistance(snakeBody[0].x, snakeBody[0].y, pos.x, pos.y ))
            missCounter++
        } else {
            missCounter = 0
            return true
        }
        
    }

    if (equalPositions(snakeBody[0], pos)) {
        missCounter = 0 
    }
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

//fuck you i did the math 🖕🖕🖕🖕🖕🖕🖕🖕🖕🖕🖕
function getDistance(x1, y1, x2, y2){
    let y = x2 - x1;
    let x = y2 - y1;
    
    return Math.sqrt(x * x + y * y);
}