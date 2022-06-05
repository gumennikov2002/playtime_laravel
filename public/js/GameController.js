class GameController {
    constructor(id) {
        this.gameFrame = document.getElementById('gameFrame')
        this.runGame(id)
    }

    runGame = (gameId) => {
        this.gameFrame.innerHTML = `
            <div style="${document.body.clientWidth >= 768 ? 'width:608px;height:608px' : 'width: 250px; height:250px'}">
                <iframe id="frame" style="border:none; position:absolute; clip:rect(${document.body.clientWidth >= 768 ? '20px,608px,608px,10px' : '20px,250px,250px,10px'});" src="https://learningapps.org/show.php?id=${gameId}" width="608" height="608" scrolling="no"></iframe>
            </div>
            `
    }
}
