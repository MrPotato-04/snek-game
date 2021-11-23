import { GRID_HEIGTH, GRID_WIDTH } from './grid.js'


var chunkNr = [1]

var waterArray = [0]
//grass
for (let j = 1; j <= GRID_WIDTH; j++) {
    for (let i = 1; i <= (GRID_HEIGTH); i++) {
        var RandomNumber1 = Math.floor(Math.random() * 4) + 1;
        var waterChance = Math.floor(Math.random() * 30) + 1;
        if (i === GRID_HEIGTH || i === 1 || j === GRID_WIDTH || j === 1) { chunkNr.push(0); waterArray.push(" ") }
        else { chunkNr.push(RandomNumber1); waterArray.push(waterChance) }

    }
}
var RandomNumber = [0]
var RandomNumber2 = [0]
for (let j = 0; j <= (GRID_WIDTH - 1); j++) {
    for (let i = 0; i <= (GRID_HEIGTH - 1); i++) {
        var RandomNumberTMP = Math.floor(Math.random() * 25) + 1;
        var RandomNumber2TMP = Math.floor(Math.random() * 25) + 1;
        
        RandomNumber.push(RandomNumberTMP)
        RandomNumber2.push(RandomNumber2TMP)
    }
}


export function draw(gameBoard) {
    let index = 1
    let portalcount = 0
    for (let x = 0; x < GRID_WIDTH; x++) {
        for (let y = 0; y < (GRID_HEIGTH); y++) {
            
            const chunk = document.createElement('div')
            chunk.style.gridRowStart = y + 1
            chunk.style.gridColumnStart = x + 1
            chunk.id = x * GRID_HEIGTH + y
            if (y === 0 || y === GRID_HEIGTH - 1) {
                // if (y === GRID_HEIGTH || y === 0) {
                if (RandomNumber[index] === 2 && portalcount < 1 && x != 0 && x != GRID_WIDTH && y !== GRID_HEIGTH - 1) {
                    chunk.classList.add(`portal`)
                    portalcount++
                } else {
                    if (y === 0 && x === 0) {
                        chunk.classList.add(`chunkCorner1`)
                        chunk.classList.add(`waterBorder`)
                    } else if (y === 0 && x === (GRID_WIDTH - 1)) {
                        chunk.classList.add(`chunkCorner2`)
                        chunk.classList.add(`waterBorder`)
                    }else if (y === 0) {
                        chunk.classList.add(`chunkBorder4`)
                        chunk.classList.add(`waterBorder`)
                    } else {
                        chunk.classList.add(`chunkBorder1`)
                        chunk.classList.add(`waterBorder`)
                    }
                }
                // }
            } else if (x === 0 || x === GRID_WIDTH - 1) {
                if (x === 0) {
                    chunk.classList.add(`chunkBorder3`)
                    chunk.classList.add(`waterBorder`)
                } else if (x=== 0 && 1){

                }else {
                    chunk.classList.add(`chunkBorder2`)
                    chunk.classList.add(`waterBorder`)
                }
            } else {
                if (waterArray[index] === 3) {
                    chunk.classList.add(`water2`)
                } else {
                    chunk.classList.add(`chunk${chunkNr[index]}`)
                }
            }


            gameBoard.appendChild(chunk)
            index++
        }
        //if (x === GRID_WIDTH) {
        //index = 1
        //}
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

export function inWater(pos) {
    //console.log(objectPos.x * GRID_HEIGTH + objectPos.y)

    let tmp = ""
    let tmpClass = ""
    let tmpPos = (pos.x - 1) * GRID_HEIGTH + (pos.y - 1)
    if (document.getElementById(`${tmpPos}`) !== null) {
        tmp = document.getElementById(`${tmpPos}`).className
    }
    if (tmp === "water" || tmp === "water2" || tmp.endsWith("waterBorder")) {
        return true
    } else { return false }
}
export function onPortal(pos) {
    //console.log(objectPos.x * GRID_HEIGTH + objectPos.y)

    let tmp = ""
    let tmpPos = (pos.x - 1) * GRID_HEIGTH + (pos.y - 1)
    if (document.getElementById(`${tmpPos}`) !== null) {
        tmp = document.getElementById(`${tmpPos}`).className
    }
    if (tmp === "portal" || tmp === "portal2") {
        return true
    } else { return false }
}

function getX(index) {
    return Math.floor(index / GRID_HEIGTH) + 1
}
function getY(index) {
    return index % GRID_HEIGTH + 1
}





