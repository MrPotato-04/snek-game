
import { onSnake as onSnake_1, expandSnake as expandSnake_1, snakeMiss} from './snake.js'
import { onSnake as onSnake_2, expandSnake as expandSnake_2 } from './snake2.js'

import { randomGridPosition } from './grid.js'

let food = getRandomFoodPosition()
const EXPANSION_RATE = 1

export function update() {
    if (snakeMiss(food) === true) {
        console.log("miss")
        food = getRandomFoodPosition()
    }

    if (onSnake_1(food)) {
        expandSnake_1(EXPANSION_RATE)
        food = getRandomFoodPosition()
    }
    if (onSnake_2(food)) {
        expandSnake_2(EXPANSION_RATE)
        food = getRandomFoodPosition()
    }

}

export function draw(gameBoard) {
    const foodElement = document.createElement('div')
    foodElement.style.gridRowStart = food.y
    foodElement.style.gridColumnStart = food.x
    foodElement.classList.add('food')
    gameBoard.appendChild(foodElement)
    
}

function getRandomFoodPosition(){
    let newFoodPosition
    while (newFoodPosition == null || onSnake_1(newFoodPosition) || onSnake_2(newFoodPosition)) {
        newFoodPosition = randomGridPosition()
    }
    return newFoodPosition
}

