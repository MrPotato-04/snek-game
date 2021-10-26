import { GRID_HEIGTH, GRID_WIDTH } from './grid.js'

export function draw(gameBoard) {
   for (let j = 1; j <= GRID_WIDTH; j++) {
        for (let i = 1; i <= (GRID_HEIGTH); i++) {
            const chunk = document.createElement('div')
            chunk.style.gridRowStart = i
            chunk.style.gridColumnStart = j
            chunk.classList.add('chunk')
            gameBoard.appendChild(chunk)
            
        }
   }
    
}
