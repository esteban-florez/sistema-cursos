import select2 from '../enableSelect2.js'

const triggers = [...document.querySelectorAll('[data-id]')]
triggers.forEach(trigger => trigger.addEventListener('click', handleTrigger))
const form = document.querySelector('#roleModal form')
const select = document.querySelector('#modalRoleSelect')
const options = [...select.options]
const originalUrl = form.getAttribute('action')
const nameSpan = document.querySelector('#userName')

function handleTrigger(e) {
  const trigger = e.target
  const { id, role, name } = trigger.dataset

  const url = originalUrl.replace('__id__', id)

  form.setAttribute('action', url)

  options.forEach(option => option.removeAttribute('selected'))
  options.find(option => option.value === role).setAttribute('selected', '') 
  select2()
  
  nameSpan.innerText = name

  const promise = new Promise(res => {
    res('perdón...')
  })

  promise.then(msg => {
    console.log(msg)

    $('#roleModal').modal()
  })
}