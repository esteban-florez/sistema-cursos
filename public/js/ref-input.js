'use strict'
const select = document.querySelector('[name="type"]')
const ref = document.querySelector('[name="ref"]')
const textAddon = document.querySelector('.input-group-text')

function update() {
  const value = select.selectedOptions[0].value

  if (value.startsWith('Efectivo') || value.length === 0) {
    ref.setAttribute('disabled', 'disabled')
  } else {
    ref.removeAttribute('disabled')
  }

  if (textAddon) {
    if (value === 'Efectivo ($)') {
      textAddon.innerText = '$'
    } else {
      textAddon.innerText = 'Bs.D.'
    }
  }
}

$('[name="type"]').on('change', update)

update()