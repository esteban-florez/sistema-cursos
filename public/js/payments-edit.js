const select = document.querySelector('[name="type"]')
const ref = document.querySelector('[name="ref"]')
const textAddon = document.querySelector('.input-group-text')

function update() {
  const value = select.selectedOptions[0].value

  if (value.startsWith('Efectivo')) {
    ref.setAttribute('disabled', 'disabled')
  } else {
    ref.removeAttribute('disabled')
  }

  if (value === 'Efectivo ($)') {
    textAddon.innerText = '$'
  } else {
    textAddon.innerText = 'Bs.D.'
  }
}

select.addEventListener('change', update)
update()