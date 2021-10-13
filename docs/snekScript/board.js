import { GRID_SIZE } from './grid.js'

export function draw(gameBoard) {
   for (let j = 1; j <= GRID_SIZE; j++) {
        for (let i = 1; i <= (GRID_SIZE); i++) {
            const chunk = document.createElement('div')
            chunk.style.gridRowStart = i
            chunk.style.gridColumnStart = j
            chunk.classList.add('chunk')
            gameBoard.appendChild(chunk)
            
        }
   }
    
}
