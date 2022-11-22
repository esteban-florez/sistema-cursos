import { finalTemplate, onlineTemplate, cashTemplate } from './stepperTemplates.js';
import TEST_VALUES from './testValues.js';

const dataPerType = {
  'Pago Móvil': TEST_VALUES.pagoMovilData,
  'Transferencia': TEST_VALUES.transferenciaData,
}

function setSteps(stepsOptions) {
  const { type, title } = stepsOptions;

  let templateData = {
    ...stepsOptions,
    amount: TEST_VALUES.price,
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