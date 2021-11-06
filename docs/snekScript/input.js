
let inptutDirection_snake_1 = { x: 0, y: -1}
export var lastInputDirection_snake_1 = 0
var rotation = 0
let inptutDirection_snake_2 = { x: 0, y: 0}
let lastInputDirection_snake_2 = 0
console.log('no')


window.addEventListener('keydown', e => {
    
    switch (e.key) {
        case 'ArrowUp':
            if (lastInputDirection_snake_1.y !== 0) break
            inptutDirection_snake_1 = { x: 0, y: -1 }
            rotation = 0
            break
        case 'ArrowDown':
            if (lastInputDirection_snake_1.y !== 0) break
            inptutDirection_snake_1 = { x: 0, y: 1 }
            rotation = 180
            break
        case 'ArrowRight':
            if (lastInputDirection_snake_1.x !== 0) break
            inptutDirection_snake_1 = { x: 1, y: 0 }
            rotation = 90
            break
        case 'ArrowLeft':
            if (lastInputDirection_snake_1.x !== 0) break
            inptutDirection_snake_1 = { x: -1, y: 0 }
            rotation = 270
            break
    }
})

window.addEventListener('keydown', e => {
    
    switch (e.key) {
        case 'w':
            if (lastInputDirection_snake_2.y !== 0) break
            inptutDirection_snake_2 = { x: 0, y: -1 }
            break
        case 's':
            if (lastInputDirection_snake_2.y !== 0) break
            inptutDirection_snake_2 = { x: 0, y: 1 }
            break
        case 'd':
            if (lastInputDirection_snake_2.x !== 0) break
            inptutDirection_snake_2 = { x: 1, y: 0 }
            break
        case 'a':
            if (lastInputDirection_snake_2.x !== 0) break
            inptutDirection_snake_2 = { x: -1, y: 0 }
            break
    }
})

export function getInputDirection_snake1() {
    lastInputDirection_snake_1 = inptutDirection_snake_1
    return inptutDirection_snake_1
}
export function getInputDirection_snake2() {
    lastInputDirection_snake_2 = inptutDirection_snake_2
    return inptutDirection_snake_2
}
export function getRotation() {
    return rotation
}
export function getLastPos() {
    return lastInputDirection_snake_1
}