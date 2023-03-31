'use strict'
const forms = document.querySelectorAll('form.recover')
const accept = document.querySelector('button#send')
const title = document.querySelector('#confirmationModal h4.modal-titles')

forms.forEach(form => form.addEventListener('submit', (e) => {
  e.preventDefault()
  
  accept.onclick = () => e.target.submit()

  $('#confirmationModal').modal()
}))
