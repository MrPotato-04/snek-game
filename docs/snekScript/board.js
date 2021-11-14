import { GRID_HEIGTH, GRID_WIDTH } from './grid.js'
var chunkNr = [1]


for (let j = 2; j <= GRID_WIDTH-1; j++) {
    for (let i = 2; i <= (GRID_HEIGTH-1); i++) {
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
            if(GRID_WIDTH === GRID_WIDTH + 1){

            }else {chunk.classList.add(`chunk${chunkNr[index]}`)}
            gameBoard.appendChild(chunk)
            index++
        }
        if (j === GRID_WIDTH) {
            index = 1
        }
    }
}
function createRandObject() {

}

//for test
function getDistance(x1, y1, x2, y2){
    let y = x2 - x1;
    let x = y2 - y1;
    
    return Math.sqrt(x * x + y * y);
}