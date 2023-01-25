'use strict'
import { findSelectedCheckbox } from '../utils.js'
import { updateStepperControls, enableNextButton } from './stepperControls.js'
import setSteps from './setSteps.js'
import initStepper from './initStepper.js'

let stepsOptions = {}

const stepperId = Symbol.for('stepperID')

const payTypes = {
  'pago-movil': {
    type: 'online',
    title: 'Pago Móvil',
    currency: 'Bs.D.',
  },
  transferencia: {
    type: 'online',
    title: 'Transferencia',
    currency: 'Bs.D.',
  },
  bolivares: {
    type: 'cash',
    currency: 'Bs.D.',
  },
  dolares: {
    type: 'cash',
    currency: '$',
  },
}

const typeChecks = [...document.querySelectorAll('input[name="tipo-pago"]')]

typeChecks.forEach(checkbox => checkbox.addEventListener('input', () => {
  const selectedCheck = findSelectedCheckbox(typeChecks)
  
  stepsOptions = { 
    ...stepsOptions, 
    ...payTypes[selectedCheck.value],
  }

  setSteps(stepsOptions)
  updateStepperControls('#confirmStep')
  enableNextButton('type')
}))

initStepper(stepperId)
updateStepperControls()
