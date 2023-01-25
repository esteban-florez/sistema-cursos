import { onlineTemplate, cashTemplate } from './stepperTemplates.js'
import getCredentials from './getCredentials.js'
import getPrices from './getPrices.js'

const credentials = getCredentials()

const dataPerType = {
  'Pago Móvil': credentials.movil,
  'Transferencia': credentials.transfer,
}

function setSteps(stepsOptions) {
  const { title, currency } = stepsOptions
  let templateData = {
    ...stepsOptions,
    amount: getPrices(currency),
  }

  let confirmStepTemplate
  
  if (stepsOptions.type === 'online') {
    templateData.data = dataPerType[title]
    confirmStepTemplate = onlineTemplate(templateData)
  } else {
    confirmStepTemplate = cashTemplate(templateData)
  }

  document.querySelector('#confirmStep').innerHTML = confirmStepTemplate

  // TODO -> mejorar esto si es posible
  setTimeout(() => {
    const refForm = document.querySelector('#refForm')
    const next = document.querySelector('#payNextButton')

    if(refForm !== null) {
      refForm.addEventListener('submit', (e) => {
        e.preventDefault()
        next.click()
      })
    }

    next.onclick = e => sendForm(e, stepsOptions)
  }, 0)
  
}

function sendForm(_, stepsOptions) {
  const { type, currency } = stepsOptions
  const refInput = document.querySelector('#refInput')
  const trueRefInput = document.querySelector('input[name="ref"]')
  const typeInput = document.querySelector('input[name="type"]')
  const amountInput = document.querySelector('input[name="amount"]')
  const button = document.querySelector('button[type="submit"]')
  const payType = getPayType(stepsOptions)
  const amount = getPrices(currency)

  if (type === 'online') {
    trueRefInput.setAttribute('value', refInput.value)
  }

  typeInput.setAttribute('value', payType)
  amountInput.setAttribute('value', amount)

  button.click()
}

function getPayType({type, currency, title}) {
  const types = {
    // TODO -> hay que reworkear esto para que sea menos enredado e lleno de cosas innecesarias
    cash: {
      $: 'Efectivo ($)',
      'Bs.D.': 'Efectivo (Bs.D.)',
    },
    online: {
      'Pago Móvil': 'Pago Móvil',
      'Transferencia': 'Transferencia',
    },
  }

  return types[type][currency] ?? types[type][title]
}

export default setSteps