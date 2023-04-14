export default function initStepper() {
  const stepperSymbol = Symbol.for('stepper')

  window[stepperSymbol] = new Stepper(document.querySelector('.bs-stepper'), {
    animation: true,
  })

  return window[stepperSymbol]
}
