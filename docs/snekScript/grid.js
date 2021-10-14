export const GRID_HEIGTH = 25
export const GRID_WIDTH = 54


export function randomGridPosition() {
    return {
        x: Math.floor(Math.random() * GRID_WIDTH + 1),
        y: Math.floor(Math.random() * GRID_HEIGTH + 1)
    }
}

export function outsideGrid(position) {
    return (
        position.x < 1 || position.x > GRID_WIDTH ||
        position.y < 1 || position.y > GRID_HEIGTH
    )
}