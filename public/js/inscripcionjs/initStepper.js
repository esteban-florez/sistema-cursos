export default function initStepper(stepperId) {
  window[stepperId] = new Stepper(document.querySelector('.bs-stepper'))
  document.querySelector('.initial').classList.remove('initial')
}
