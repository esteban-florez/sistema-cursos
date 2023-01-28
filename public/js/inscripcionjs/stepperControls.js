function setControlListener(control) {
  control.onclick = () => {
    const stepperSymbol = Symbol.for('stepper')
    const stepper = window[stepperSymbol]
    stepper[control.dataset.stepper]()
  }
} 
  
function updateStepperControls(parentSelector = 'body') {
  const stepperControls = document.querySelectorAll(`${parentSelector} button[data-stepper]`)
  stepperControls.forEach(control => setControlListener(control))
}

function enableNextButton(idPrefix) {
  const nextButton = document.querySelector(`#${idPrefix}Next`)
  nextButton.removeAttribute('disabled')
}

export { updateStepperControls, enableNextButton }
