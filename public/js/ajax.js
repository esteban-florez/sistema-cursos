import select2 from './enableSelect2.js'
const form = document.querySelector('#areaForm')
const select = document.querySelector('#areaId')
const url = form.dataset.url
const optionsUrl = form.dataset.options
const pnf = document.querySelector('#pnfId')
const name = document.querySelector('#areaName');

form.addEventListener('submit', (e) => {
  e.preventDefault()
  const body = new FormData(form)
  
  fetch(url, {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
    },
    body,
  })
    .then(res => {
      if (res.ok) {
        $('#newAreaModal').modal('hide')
        pnf.selectedIndex = 0
        name.value = ''
        return fetch(optionsUrl)
      }
    })
    .then(res => res.json())
    .then(data => updateOptions(data))
    .catch(error => console.log(error))
})

function updateOptions(data) {
  console.log(data)
  const def = document.createElement('option')
  def.innerText = 'Seleccionar...'
  def.setAttribute('value', '')

  const newOptions = data.map(({id, name}) => {
    const option = document.createElement('option')
    option.setAttribute('value', id)
    option.innerText = name
    return option
  })

  newOptions.unshift(def)
  select.replaceChildren()
  newOptions.forEach(opt => select.append(opt))
  select2()
}
