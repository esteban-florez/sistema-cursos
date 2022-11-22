import { finalTemplate, onlineTemplate, cashTemplate } from './stepperTemplates.js';
import TEST_VALUES from './testValues.js';

const dataPerType = {
  'Pago Móvil': TEST_VALUES.pagoMovilData,
  'Transferencia': TEST_VALUES.transferenciaData,
}

function setSteps(stepsOptions) {
  const { type, title, currency } = stepsOptions;

  let templateData = {
    ...stepsOptions,
    amount: currency === '$' ? TEST_VALUES.priceDollars : TEST_VALUES.priceBs,
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

  // TODO -> mejorar esto si es posible
  setTimeout(() => {
    const refForm = document.querySelector('#refForm');
    const next = document.querySelector('#payNextButton');

    if(refForm !== null) {
      refForm.addEventListener('submit', (e) => {
        e.preventDefault();
        next.click();
      });
    }

    next.addEventListener('click', e => sendForm(e, stepsOptions));
  }, 0);
  
}

function sendForm(e, stepsOptions) {
  const { type, currency, title } = stepsOptions;
  const refInput = document.querySelector('#refInput');
  const trueRefInput = document.querySelector('input[name="ref"]');
  const typeInput = document.querySelector('input[name="type"]');
  const button = document.querySelector('button[type="submit"]');
  const payType = getPayType(stepsOptions);

  if (type === 'online') {
    trueRefInput.setAttribute('value', refInput.value);
  }

  typeInput.setAttribute('value', payType);

  button.click();
}

function getPayType({type, currency, title}) {
  const types = {
    cash: {
      $: 'dollars',
      'Bs.D.': 'bs',
    },
    online: {
      'Pago Móvil': 'movil',
      'Transferencia': 'transfer',
    },
  }

  return types[type][currency] ?? types[type][title];
}

export default setSteps;