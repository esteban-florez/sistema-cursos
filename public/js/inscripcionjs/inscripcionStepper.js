'use strict'
import { getSerialized } from '../utils.js'
import { updateStepperControls } from './stepperControls.js'
import setRadioListeners from './setRadioListeners.js'
import initStepper from './initStepper.js'

const hasReservation = Boolean(getSerialized('course').reserv_price)

if (hasReservation) {
  setRadioListeners('mode')
}

setRadioListeners('type')

initStepper()
document.querySelector('.initial').classList.remove('initial')

updateStepperControls()
