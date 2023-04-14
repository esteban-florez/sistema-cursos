'use strict'
const time = document.querySelector('#time')
const date = document.querySelector('#date')

const monthNames = [
	'enero',
	'febrero',
	'marzo',
	'abril',
	'mayo',
	'junio',
	'julio',
	'agosto',
	'septiembre',
	'octubre',
	'noviembre',
	'diciembre',
]

const appendZero = (num) => {
	let str = `${num}`
	return str.length < 2 ? str = `0${str}` : str
}

const updateDate = () => {
	const currentTime = new Date()
	const day = currentTime.getDate()
	const month = currentTime.getMonth()
	const year = currentTime.getFullYear()

	date.innerHTML = `${day} de ${monthNames[month]} del ${year}` 
}

const updateTime = () => {
	const currentTime = new Date()

	let hours = currentTime.getHours()
	let minutes = currentTime.getMinutes()
	let stamp = 'AM'

	if (hours > 12) {
		hours -= 12
		stamp = 'PM'
	}

	time.innerHTML = `${appendZero(hours)}:${appendZero(minutes)} ${stamp}`
}

setInterval(updateTime, 1000)
setInterval(updateDate, 60000)

updateDate()
updateTime()