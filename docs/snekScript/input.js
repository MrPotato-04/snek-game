
let inptutDirection_snake_1 = { x: 0, y: -1}
export var lastInputDirection_snake_1 = 0
var rotation_snake1 = 0
var rotation_snake2 = 0
let inptutDirection_snake_2 = { x: 0, y: -1}
let lastInputDirection_snake_2 = 0



window.addEventListener('keydown', e => {
    
    switch (e.key) {
        case 'ArrowUp':
            if (lastInputDirection_snake_1.y !== 0) break
            inptutDirection_snake_1 = { x: 0, y: -1 }
            rotation_snake1 = 0
            break
        case 'ArrowDown':
            if (lastInputDirection_snake_1.y !== 0) break
            inptutDirection_snake_1 = { x: 0, y: 1 }
            rotation_snake1 = 180
            break
        case 'ArrowRight':
            if (lastInputDirection_snake_1.x !== 0) break
            inptutDirection_snake_1 = { x: 1, y: 0 }
            rotation_snake1 = 90
            break
        case 'ArrowLeft':
            if (lastInputDirection_snake_1.x !== 0) break
            inptutDirection_snake_1 = { x: -1, y: 0 }
            rotation_snake1 = 270
            break
    }
})

window.addEventListener('keydown', e => {
    
    switch (e.key) {
        case 'w':
            if (lastInputDirection_snake_2.y !== 0) break
            inptutDirection_snake_2 = { x: 0, y: -1 }
            rotation_snake2 = 0
            break
        case 's':
            if (lastInputDirection_snake_2.y !== 0) break
            inptutDirection_snake_2 = { x: 0, y: 1 }
            rotation_snake2 = 180
            break
        case 'd':
            if (lastInputDirection_snake_2.x !== 0) break
            inptutDirection_snake_2 = { x: 1, y: 0 }
            rotation_snake2 = 90
            break
        case 'a':
            if (lastInputDirection_snake_2.x !== 0) break
            inptutDirection_snake_2 = { x: -1, y: 0 }
            rotation_snake2 = 270
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
export function getRotation_snake1() {
    return rotation_snake1
}
export function getRotation_snake2() {
    return rotation_snake2
}

export function getLastPos() {
    return lastInputDirection_snake_1
}