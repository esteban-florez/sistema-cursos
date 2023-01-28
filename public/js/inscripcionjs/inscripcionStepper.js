'use strict'
import { getSerialized } from '../utils.js'
import { updateStepperControls } from './stepperControls.js'
import setRadioListeners from './setRadioListeners.js'
import initStepper from './initStepper.js'

const stepperSymbol = Symbol.for('stepper')
const hasReservation = Boolean(getSerialized('course').reserv_price)

if (hasReservation) {
  setRadioListeners('mode')
}

setRadioListeners('type')

initStepper(stepperSymbol)
document.querySelector('.initial').classList.remove('initial')

updateStepperControls()
