'use strict'
const paragraph = document.querySelector('#maxAmount')
const itemSelect = document.querySelector('#itemId')
const typeSelect = document.querySelector('#type')
const itemData = JSON.parse(document.querySelector('#serialized').dataset.items)

$('#itemId').on('change', update)

if (typeSelect) {
  $('#type').on('change', update)
}

function update() {
  const itemId = itemSelect.selectedOptions[0].value
  const operation = typeSelect?.selectedOptions[0].value

  if (!itemId || (typeSelect && operation !== 'Desincorporación')) {
    paragraph.innerHTML = ''
    return
  }

  paragraph.innerHTML = maxAmountTemplate(itemData[itemId])
}

function maxAmountTemplate(text) {
  return `Máximo: <span class="text-success text-bold">${text} unidades</span>`
}
