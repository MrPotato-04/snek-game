
export function setSnakeColor() {
    const sliderinput = localStorage.getItem('snake-1-Color')
    return `sepia(100%) hue-rotate(${sliderinput}deg) saturate(244%)`

}
if (document.getElementById('snakeColorSlider') !== null) {
    document.getElementById('snakeColorSlider').addEventListener('input', function () {
        document.getElementById('snakePreview').style.filter = `sepia(100%) hue-rotate(${document.getElementById('snakeColorSlider').value}deg) saturate(244%)`
    }, false);
    $('#submit-color-1').on('click', function () {
        const sliderinput = document.getElementById('snakeColorSlider').value
        localStorage.setItem('snake-1-Color', sliderinput)
        
    })
}



