'use strict';
import {findSelectedCheckbox, uncheckCheckboxes} from '../utils.js';
import { updateStepperControls, enableNextButton } from './stepperControls.js';
import setSteps from './setSteps.js';
let stepsOptions = {};

const stepperId = Symbol.for('stepperID');

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

let modeChecks = document.querySelectorAll('input[name="modo-pago"]');
let typeChecks = document.querySelectorAll('input[name="tipo-pago"]');
modeChecks = Array.from(modeChecks);
typeChecks = Array.from(typeChecks);

function initStepper() {
  window[stepperId] = new Stepper(document.querySelector('.bs-stepper'), {
    animation: true,
  })
}

document.addEventListener('DOMContentLoaded', initStepper);
document.addEventListener('DOMContentLoaded', () => updateStepperControls());

modeChecks.forEach(checkbox => checkbox.addEventListener('input', () => {
  const selectedCheck = findSelectedCheckbox(modeChecks);
  stepsOptions.mode = selectedCheck.value;

  uncheckCheckboxes(typeChecks);
  document.querySelector('#typeNextButton').setAttribute('disabled', 'disabled');

  enableNextButton('mode');
}));

typeChecks.forEach(checkbox => checkbox.addEventListener('input', () => {
  const selectedCheck = findSelectedCheckbox(typeChecks);
  
  stepsOptions = { 
    ...stepsOptions, 
    ...payTypes[selectedCheck.value],
  };

  setSteps(stepsOptions);
  updateStepperControls('#confirmStep');
  enableNextButton('type');
}));