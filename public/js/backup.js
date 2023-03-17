'use strict'
const forms = document.querySelectorAll('form.recover')
const button = document.querySelector('button#upload')
const input = document.querySelector('input#backup')
const label = document.querySelector('#backupLabel')
const accept = document.querySelector('button#send')
const title = document.querySelector('#confirmationModal h4.modal-titles')

forms.forEach(form => form.addEventListener('submit', (e) => {
  e.preventDefault()
  
  accept.onclick = () => e.target.submit()

  $('#confirmationModal').modal()
}))

input.addEventListener('change', () => {
  label.innerText = input.files[0].name
  button.removeAttribute('disabled')
})
