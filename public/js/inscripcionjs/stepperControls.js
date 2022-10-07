const setControlListener = control => control.onclick = () => {
  const stepperId = Symbol.for('stepperID');
  const stepper = window[stepperId];
  stepper[control.dataset.stepper]()
}
  
function updateStepperControls(parentSelector = 'body') {
  const stepperControls = document.querySelectorAll(`${parentSelector} button[data-stepper]`);
  stepperControls.forEach(control => setControlListener(control));
}

function enableNextButton(idPrefix) {
  const nextButton = document.querySelector(`#${idPrefix}NextButton`);
  nextButton.removeAttribute('disabled');
}

export { updateStepperControls, enableNextButton };