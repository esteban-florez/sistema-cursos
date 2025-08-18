const email = document.querySelector('#email')
const password = document.querySelector('#password')

const radios = document.querySelectorAll('[name="creds"]')

const passwords = {
  admin: 'Admin20.',
  instructor: 'Teacher20.',
  estudiante: 'Password20.'
}

radios.forEach(radio => {
  radio.addEventListener('click', () => {
    email.value = `${radio.id}@example.com`
    password.value = passwords[radio.id]
  })
})

email.addEventListener('input', clearRadios)
password.addEventListener('input', clearRadios)

function clearRadios() {
  radios.forEach(radio => radio.checked = false)
}

$('#info-modal')?.modal()
