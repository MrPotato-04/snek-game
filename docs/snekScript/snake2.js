import { getInputDirection_snake2, getRotation_snake2 } from "./input.js"
import { GRID_HEIGTH, GRID_WIDTH } from "./grid.js"
import { setSnakeColor } from './snakecolor.js'

export let blueScore = 0;


var startPos = 3


const snakeBody = [{ x: Math.floor(GRID_WIDTH / startPos) * 2, y: Math.floor(GRID_HEIGTH / 2), skin: "snake_2", rot: 0 },
{ x: Math.floor(GRID_WIDTH / startPos) * 2, y: Math.floor(GRID_HEIGTH / 2 + 1), skin: "snake_2", rot: 0 }]

let newSegments = 1
let missCounter = 0

export function update() {
    addSegments()
    const inputDirection = getInputDirection_snake2()
    for (let i = snakeBody.length - 2; i >= 0; i--) {
        snakeBody[i + 1] = { ...snakeBody[i] }
        // snakeSkinRotation[i + 1] = { ...snakeSkinRotation[i] }
    }


    //  checks if snake out of bounds for infinite loop
    // if (snakeBody[0].x === GRID_WIDTH && inputDirection.x === 1) {
    //     snakeBody[0].x = 1
    // } else if (snakeBody[0].x === 1 && inputDirection.x === -1) {
    //     snakeBody[0].x = GRID_WIDTH
    // } else if (snakeBody[0].y === GRID_HEIGTH && inputDirection.y === 1) {
    //     snakeBody[0].y = 1
    // } else if (snakeBody[0].y === 1 && inputDirection.y === -1) {
    //     snakeBody[0].y = GRID_HEIGTH
    // }
    // sets direction of snake
    //else {
        snakeBody[0].x += inputDirection.x
        snakeBody[0].y += inputDirection.y
        // snakeSkinRotation[0].x = inputDirection.x
        // snakeSkinRotation[0].y = inputDirection.y
   // }






}

export function draw(gameBoard) {
    var rotation = getRotation_snake2()
    let direction = "up"
    const inputDirection = getInputDirection_snake2()
    snakeBody.forEach((segment, index) => {
        const snakeElement = document.createElement('div')
        snakeElement.style.gridRowStart = segment.y
        snakeElement.style.gridColumnStart = segment.x
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
            // snakeBody[index].rot = snakeBody[index - 1].rot
        }
        if (index === 0) {
            snakeBody[0].skin = "snake_2_head_" + direction

        } else if (index === snakeBody.length - 1) {
            snakeBody[index].skin = "snake_2_tail_" + direction
        }else  {
            let body = "snake_2_body"
            let curve = "snake_2_curve"

            if ((inputDirection.x === 1 || inputDirection.x === -1) && snakeBody[index - 1].y === snakeBody[index].y) {
                if (snakeBody[index - 1].rot !== snakeBody[index].rot) {
                    
                    if(snakeBody[index - 1].rot === 90 && snakeBody[index].rot === 0) {
                        snakeBody[index].skin = curve + "_rd"
                    } else if (snakeBody[index - 1].rot === 270 && snakeBody[index].rot === 0) {
                        snakeBody[index].skin = curve + "_dl"
                    } else if (snakeBody[index - 1].rot === 270 && snakeBody[index].rot === 180) {
                        snakeBody[index].skin = curve + "_lt"
                    } else if (snakeBody[index - 1].rot === 90 && snakeBody[index].rot === 180) {
                        snakeBody[index].skin = curve + "_tr"
                    }
                    
                } else {
                    snakeBody[index].skin = body + "_hor"
                }
            } else if ((inputDirection.y === 1 || inputDirection.y === -1) && snakeBody[index - 1].x === snakeBody[index].x) {
                if (snakeBody[index - 1].rot !== snakeBody[index].rot) {
                    console.log(snakeBody[index-1].rot+" "+snakeBody[index].rot)
                    
                    if(snakeBody[index - 1].rot === 180 && snakeBody[index].rot === 270) {
                        snakeBody[index].skin = curve + "_rd"
                    } else if (snakeBody[index - 1].rot === 180 && snakeBody[index].rot === 90) {
                        snakeBody[index].skin = curve + "_dl"
                    } else if (snakeBody[index - 1].rot === 0 && snakeBody[index].rot === 90) {
                        snakeBody[index].skin = curve + "_lt"
                    } else if (snakeBody[index - 1].rot === 0 && snakeBody[index].rot === 270) {
                        snakeBody[index].skin = curve + "_tr"
                    } else {
                        console. log("error")
                    }
                    
                } else {
                    snakeBody[index].skin = body + "_ver"
                }
            } 
        }
        snakeElement.classList.add(snakeBody[index].skin)
        snakeElement.style.filter = setSnakeColor(2)
        gameBoard.appendChild(snakeElement)

    })
}

export function expandSnake(amount) {
    newSegments += amount;
    blueScore++;
}
export function onSnake(position, { ignoreHead = false } = {}) {
    return snakeBody.some((segment, index) => {
        if (ignoreHead && index === 0) return false
        return equalPositions(segment, position)
    })
}

export function snakeMiss_snake2 (pos) {
    if (equalPositions(snakeBody[0], pos)) {
        missCounter = 0 
    }

    if (getDistance(snakeBody[0].x, snakeBody[0].y, pos.x, pos.y ) < 3) {
        if (missCounter <= 2) {
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
        //snakeSkinRotation.push({ ...snakeSkinRotation[snakeSkinRotation.length - 1] })
    }
    newSegments = 0
}

//fuck you i did the math 🖕🖕🖕🖕🖕🖕🖕🖕🖕🖕🖕
function getDistance(x1, y1, x2, y2){
    let y = x2 - x1;
    let x = y2 - y1;
    
    return Math.sqrt(x * x + y * y);
}