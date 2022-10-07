import { finalTemplate, onlineTemplate, cashTemplate } from './stepperTemplates.js';
import TEST_VALUES from './testValues.js'; 

const pricesPerMode = {
  unico: TEST_VALUES.price,
  cuotas: TEST_VALUES.inscription,
}

const dataPerType = {
  'Pago Móvil': TEST_VALUES.pagoMovilData,
  'Transferencia': TEST_VALUES.transferenciaData,
}

function setSteps(stepsOptions) {
  const { mode, type, title } = stepsOptions;

  let templateData = {
    ...stepsOptions,
    amount: pricesPerMode[mode],
  };

  let confirmStepTemplate;
  const finalStepTemplate = finalTemplate(type);
  
  if (stepsOptions.type === 'online') {
    templateData.data = dataPerType[title];
    confirmStepTemplate = onlineTemplate(templateData);
  } else {
    confirmStepTemplate = cashTemplate(templateData);
  }

  document.querySelector('#confirmStep').innerHTML = confirmStepTemplate;
  document.querySelector('#finalStep').innerHTML = finalStepTemplate;
}

export default setSteps;