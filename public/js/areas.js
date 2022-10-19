const check = document.querySelector('#isPnfCheckbox');
const pnfInput = document.querySelector('#pnfNameInput')
check.addEventListener('input', updatePnfInput)
    
function updatePnfInput() {
  if(check.checked) {
    pnfInput.removeAttribute('disabled')
  } else {
    pnfInput.setAttribute('disabled', 'disabled')
  }
}