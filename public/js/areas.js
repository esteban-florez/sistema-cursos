const check = document.querySelector('#isPNFCheckbox')
const pnfInput = document.querySelector('#pnfNameInput')
check.addEventListener('input', updatePNFInput)
    
function updatePNFInput() {
  if(check.checked) {
    pnfInput.removeAttribute('disabled')
  } else {
    pnfInput.setAttribute('disabled', 'disabled')
  }
}