import { GRID_HEIGTH, GRID_WIDTH } from './grid.js'


var chunkNr = [1]

var waterArray = [0]
//grass
for (let j = 1; j <= GRID_WIDTH; j++) {
    for (let i = 1; i <= (GRID_HEIGTH); i++) {
        var RandomNumber1 = Math.floor(Math.random() * 4) + 1;
        var waterChance = Math.floor(Math.random() * 15) + 1;
        if (i === GRID_HEIGTH || i === 1 || j === GRID_WIDTH || j === 1) { chunkNr.push(0); waterArray.push(" ") }
        else { chunkNr.push(RandomNumber1); waterArray.push(waterChance) }

    }
}

export function draw(gameBoard) {
    let index = 1
    for (let x = 0; x < GRID_WIDTH; x++) {
        for (let y = 0; y < (GRID_HEIGTH); y++) {
            var RandomNumber = Math.floor(Math.random() * 4) + 1;
            const chunk = document.createElement('div')
            chunk.style.gridRowStart = y + 1
            chunk.style.gridColumnStart = x + 1
            chunk.id = x * GRID_HEIGTH + y
            if (waterArray[index] === 3) {
                chunk.classList.add(`water`)
            } else {
                chunk.classList.add(`chunk${chunkNr[index]}`)
            }
            
            //}
            gameBoard.appendChild(chunk)
            index++
        }
        if (x === GRID_WIDTH) {
            index = 1
        }
    }
}
function createRandObject() {

}

//for test
function getDistance(x1, y1, x2, y2) {
    let y = x2 - x1;
    let x = y2 - y1;

    return Math.sqrt(x * x + y * y);
}




// if (i === 1 || i === GRID_HEIGTH) {
            //     if (i === GRID_HEIGTH || i === 1) {
            //         if (i === 1) {
            //             chunk.classList.add(`chunkBorder4`)
            //         } else {
            //             chunk.classList.add(`chunkBorder1`)
            //         }
            //     }
            // } else if (1 === 2 + 1) {

            // }else {