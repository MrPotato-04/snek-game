
import { onSnake as onSnake_1, expandSnake as expandSnake_1, snakeMiss_snake1 } from './snake.js'
import { onSnake as onSnake_2, expandSnake as expandSnake_2, snakeMiss_snake2 } from './snake2.js'

import { randomGridPosition, outsideGrid, GRID_HEIGTH } from './grid.js'

let food = getRandomFoodPosition()
const EXPANSION_RATE = 1
var frankChance = 69;
var foodclass = "food"
export var speed = 10

export function update() {
    if (snakeMiss_snake1(food) === true || snakeMiss_snake2(food) === true) {
        console.log("miss")
        food = getRandomFoodPosition()
    }

    if (onSnake_1(food)) {
        expandSnake_1(EXPANSION_RATE)
        speed++
        food = getRandomFoodPosition()
    }
    if (onSnake_2(food)) {
        expandSnake_2(EXPANSION_RATE)
        speed++
        food = getRandomFoodPosition()
    }

}

export function draw(gameBoard) {
    const foodElement = document.createElement('div')
    foodElement.style.gridRowStart = food.y
    foodElement.style.gridColumnStart = food.x
    foodElement.classList.add(foodclass)
    
    gameBoard.appendChild(foodElement)
    
}

function getRandomFoodPosition(){
    if ((Math.floor(Math.random() * 100) + 1) === frankChance) {
        foodclass = 'frank';
    }  else {
        foodclass = 'food'
    }

    let newFoodPosition
    while (newFoodPosition == null || onSnake_1(newFoodPosition) || onSnake_2(newFoodPosition) || outsideGrid(newFoodPosition) || foodInWater(newFoodPosition, newFoodPosition.x * GRID_HEIGTH + newFoodPosition.y)) {
        newFoodPosition = randomGridPosition()
    }
    return newFoodPosition
}
function foodInWater(foodPos, pos){
    if (foodPos.x * GRID_HEIGTH + foodPos.y === pos) {
        let tmp = ""
        if (document.getElementById(`${pos}`) !== null) {
            tmp = document.getElementById(`${pos}`).className
        }
        if ( tmp === "water") {
            return true
        } else {return false}
    } else return false
}
