export default function initStepper(stepperId) {
  window[stepperId] = new Stepper(document.querySelector('.bs-stepper'), {
    animation: true,
  })
}