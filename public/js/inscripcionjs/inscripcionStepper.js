'use strict';
import { findSelectedCheckbox } from '../utils.js';
import { updateStepperControls, enableNextButton } from './stepperControls.js';
import { fillFinalParagraph } from './stepperTemplates.js';
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

let typeChecks = document.querySelectorAll('input[name="tipo-pago"]');
typeChecks = Array.from(typeChecks);

function initStepper(enrolledType) {
  window[stepperId] = new Stepper(document.querySelector('.bs-stepper'), {
    animation: true,
  })

  if(enrolledType !== 'null') {
    fillFinalParagraph(enrolledType);
    window[stepperId].to(3); 
  }
}

document.addEventListener('DOMContentLoaded', () => initStepper(enrolledType));
document.addEventListener('DOMContentLoaded', () => updateStepperControls());

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