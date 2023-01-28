import { onlineTemplate, cashTemplate } from './stepperTemplates.js'
import getCredentials from './getCredentials.js'
import formatAmount from './formatAmount.js'

function setSteps({ type, mode, amount }) {
  const onlineTypes = ['Pago Móvil', 'Transferencia']

  const templateData = {
    type,
    mode,
    amount: formatAmount(amount, type),
  }
  
  let confirmStepTemplate

  if (onlineTypes.includes(type)) {
    templateData.data = getCredentials(type) 
    confirmStepTemplate = onlineTemplate(templateData)
  } else {
    confirmStepTemplate = cashTemplate(templateData)
  }

  document.querySelector('#confirmStep .callout').innerHTML = confirmStepTemplate
}

export default setSteps