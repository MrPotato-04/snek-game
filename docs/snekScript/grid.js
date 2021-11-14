export const GRID_HEIGTH = 20 //25
export const GRID_WIDTH = 44 //54


export function randomGridPosition() {
    return {
        x: Math.floor(Math.random() * (GRID_WIDTH-1) + 1),
        y: Math.floor(Math.random() * (GRID_HEIGTH-1) + 1)
    }
}

export function outsideGrid(position) {
    return (
        position.x < 2 || position.x > GRID_WIDTH-1 ||
        position.y < 2 || position.y > GRID_HEIGTH-1
    )
}