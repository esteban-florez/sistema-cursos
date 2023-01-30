const form = document.querySelector('#areaForm')
const select = document.querySelector('#areaId')
const url = form.dataset.url
const optionsUrl = form.dataset.options

form.addEventListener('submit', (e) => {
  e.preventDefault()
  const body = new FormData(form)
  
  fetch(url, {
    method: 'POST',
    body,
  })
    .then(res => {
      if (res.ok) {
        $('#newAreaModal').modal('hide')

        return fetch(optionsUrl)
      }
    })
    .then(res => res.json())
    .then(data => updateOptions(data))
    .catch(err => console.log(err))
})

function updateOptions(options) {
  const def = document.createElement('option')
  def.innerText = 'Seleccionar...'
  def.setAttribute('value', '')

  const newOptions = options.map(({id, name}) => {
    const option = document.createElement('option')
    option.setAttribute('value', id)
    option.innerText = name
    return option
  })

  newOptions.unshift(def)
  select.replaceChildren()
  newOptions.forEach(opt => select.append(opt))
}