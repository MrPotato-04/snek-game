import { GRID_HEIGTH, GRID_WIDTH } from './grid.js'
var chunkNr = [1]


for (let j = 1; j <= GRID_WIDTH; j++) {
    for (let i = 1; i <= (GRID_HEIGTH); i++) {
        var RandomNumber1 = Math.floor(Math.random() * 4) + 1;
        chunkNr.push(RandomNumber1)
    }
}

export function draw(gameBoard) {
    let index = 1
    for (let j = 1; j <= GRID_WIDTH; j++) {
        for (let i = 1; i <= (GRID_HEIGTH); i++) {
            const chunk = document.createElement('div')
            chunk.style.gridRowStart = i
            chunk.style.gridColumnStart = j
            chunk.classList.add(`chunk${chunkNr[index]}`)
            gameBoard.appendChild(chunk)
            index++
        }
        if (j === GRID_WIDTH) {
            index = 1
        }
    }
}