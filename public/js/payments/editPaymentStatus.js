'use strict'
import detailsModal from './modalTemplate.js'

const triggers = [...document.querySelectorAll('a[data-details]')]
triggers.forEach(trigger => trigger.addEventListener('click', handleTriggerClick))

function handleTriggerClick(e) {
  e.preventDefault()

  let { course, student, payment, date } = JSON.parse(e.target.dataset.details)
  
  const div = document.createElement('div')
  div.innerHTML = detailsModal({ ...payment, course, student, date })
  document.body.append(div)


  const promise = new Promise(res => {
    res('loveu')
  })

  promise.then(msg => {
    console.log(msg)
    $(`#details${payment.id}`).modal()
    $(`#details${payment.id}`).on('hidden.bs.modal', () => {
      div.remove()
    })
  })
}
