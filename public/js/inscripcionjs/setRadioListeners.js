import { enableNextButton, updateStepperControls  } from './stepperControls.js'
import { fillCategory, fillAmount } from './hiddenInputs.js'
import setSteps from './setSteps.js'
import getAmount from './getAmount.js'

let stepsOptions = {}

export default function setRadioListeners(name) {
  const radios = [...document.querySelectorAll(`input[name="${name}"]`)]

  radios.forEach(radio => 
    radio.addEventListener('input', handleRadioInput.bind(null, radios, name))
  )
}

function handleRadioInput(radios, name) {
  const selected = radios.find(radio => radio.checked === true)

  stepsOptions = {
    ...stepsOptions,
    [name]: selected.value,
  }

  if (name === 'mode') {
    fillCategory(selected.value)
  }

  if (name === 'type') {
    const amount = getAmount(stepsOptions)
    fillAmount(amount)
    stepsOptions.amount = amount
    setSteps(stepsOptions)
  }

  updateStepperControls('#confirmStep')
  enableNextButton(`${name}Step`)
}