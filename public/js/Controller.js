class Controller {
	constructor() {
		this.app = document.querySelector('#app')
		this.init()
	}

	init = () => {
		this.drawGames()
		this.disableArrows()
	}

	disableArrows = () => {
		document.addEventListener('keydown', (e) => {
			if (e.keyCode === 38 || e.keyCode === 40) e.preventDefault()
		})
	}

	drawGames = () => {
		const games = {
			0: {
				'id': 'pjwukuaua19',
				'img': '/img/10.jpeg',
				'title': 'Определенный интеграл',
			},
			1: {
				'id': 'pxfpfedjc20',
				'img': '/img/9.jpeg',
				'title': 'Подбери пару'
			},
			2: {
				'id': 'p26bf1ysk16',
				'img': 	'/img/8.jpeg',
				'title': 'Координаты точек единичной окружности'
			},
			3: {
				'id': 'pw8n57ncj',
				'img': '/img/7.jpeg',
				'title': 'Синус, косинус, тангенс угла от 0 до 180'
			},
			4: {
				'id': 'pg26mrs0318',
				'img': '/img/6.jpeg',
				'title': 'Функции и графики'
			},
			5: {
				'id': 'pq2eubv5520',
				'img': '/img/5.jpeg',
				'title': 'Статистические характеристики ряда'
			},
			6: {
				'id': 'pmrjuqzh521',
				'img': '/img/4.jpeg',
				'title': 'Вероятность события'
			},
			7: {
				'id': 'pbtob7c7215',
				'img': '/img/3.jpeg',
				'title': 'Классификация событий'
			},
			8: {
				'id': 'pd1bikmej01',
				'img': '/img/2.jpeg',
				'title': 'Стереометрические фигуры'
			},
			9: {
				'id': 'pm1wtdjaj15',
				'img': '/img/1.jpeg',
				'title': 'Теория графов'
			}
		}

		Object.keys(games).forEach((item) => {
			let game = games[item]

			this.app.querySelector('.row').innerHTML += `
				<div class="game-box mx-4 mb-5" data-game-id=${game.id}>
					<div class="game-img">
						<img src="${game.img}" ondragstart="return false">
					</div>
					<span class="mt-1 text-center text-wrap">${game.title}</span>
				</div>
			`
		})

		let gameBoxes = document.querySelectorAll('.game-box')

		gameBoxes.forEach((element) => {
			element.addEventListener('click', () => {
				this.openGame(element.getAttribute('data-game-id'), element.querySelector('span').innerHTML)
			})
		})
	}

	openGame = (name, title) => {
		this.app.innerHTML = `
			<div class="d-flex justify-content-between pt-3 mb-2">
				<i class="pt-1 fa fa-backward text-primary back-from-game"></i>
				<h2 class="pt-2 text-center">${title}</h2>
				<i class="pt-1 fa fa-refresh text-primary refresh-game"></i>
			</div>
			<div class="row pb-5">
				<div id="gameFrame">

				</div>
			</div>
		`

		this.app.querySelector('.back-from-game').addEventListener('click', () => {
			let block;

			if (document.body.clientWidth >= 768) {
				block = `
					<div class="container pt-4"><h2>Математические игры</h2></div>
					<div class="row d-flex justify-content-start pt-4"></div>`
			} else {
				block = `
					<div class="container pt-4"><h2>Математические игры</h2></div>
					<div class="row d-flex flex-column flex-center pt-4">`
			}

			this.app.innerHTML = block
			this.drawGames()
		})

		this.app.querySelector('.refresh-game').addEventListener('click', () => {
			this.openGame(name, title)
		})
		new GameController(name)
	}
}

new Controller()
