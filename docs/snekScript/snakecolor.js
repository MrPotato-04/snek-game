
export function setSnakeColor(snakeNr) {
    const sliderinput = localStorage.getItem(`snake-${snakeNr}-Color`)
    return `sepia(100%) hue-rotate(${sliderinput}deg) saturate(244%)`

}
if (document.getElementById('snake-1-ColorSlider') !== null) {
    document.getElementById('snake-1-ColorSlider').addEventListener('input', function () {
        document.getElementById('snake-1-Preview').style.filter = `sepia(100%) hue-rotate(${document.getElementById('snake-1-ColorSlider').value}deg) saturate(244%)`
    }, false);
    $('#submit-color-1').on('click', function () {
        const sliderinput = document.getElementById('snake-1-ColorSlider').value
        localStorage.setItem(`snake-1-Color`, sliderinput)
        
    })
}
if (document.getElementById('snake-2-ColorSlider') !== null) {
    document.getElementById('snake-2-ColorSlider').addEventListener('input', function () {
        document.getElementById('snake-2-Preview').style.filter = `sepia(100%) hue-rotate(${document.getElementById('snake-2-ColorSlider').value}deg) saturate(244%)`
    }, false);
    $('#submit-color-2').on('click', function () {
        const sliderinput = document.getElementById('snake-2-ColorSlider').value
        localStorage.setItem(`snake-2-Color`, sliderinput)
        
    })
}


