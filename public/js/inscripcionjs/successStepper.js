import { fillFinalParagraph } from './stepperTemplates.js'
import initStepper from './initStepper.js'

let stepperId = Symbol.for('stepperID')

document.addEventListener('DOMContentLoaded', () => {
  initStepper(stepperId) 
  window[stepperId].to(3)
})

fillFinalParagraph(enrolledType)