getData()
  .then((events) => {
    initializeTimetable(events)
  })

async function getData() {
  try {
    const url = document.querySelector('[data-url]').dataset.url
    const res = await fetch(url)
    return await res.json()
  } catch (error) {
    console.log({error})
  }
}

function initializeTimetable(events) {
  if (events.length < 1) {
    return
  }

  document.querySelector('.empty-container').remove()

  const tt = new Timetable()

  tt.useTwelveHour()
  tt.setScope(6, 18)
  
  tt.addLocations(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'])

  events.forEach(event => {
    const { id, name, start_hour, end_hour, days: daysString } = event
    const days = daysString.split(',')
    const color = getRandomColor()
    const options = {
      class: color,
      url: `http://127.0.0.1:8000/enrollments/${id}`,
    }

    days.forEach(
      day => tt.addEvent(name, day, new Date(start_hour), new Date(end_hour), options)
    )
  })

  const renderer = new Timetable.Renderer(tt)
  renderer.draw('.timetable')
}

let colors = ['red', 'blue', 'orange', 'violet', 'gray', 'green', 'yellow'];
function getRandomColor() {
  if (colors.length < 1) {
    colors = ['red', 'blue', 'orange', 'violet', 'gray', 'green', 'yellow']
  }
  const index = Math.floor(Math.random() * colors.length - 1)
  const [ color ] = colors.splice(index, 1)
  return color
}
