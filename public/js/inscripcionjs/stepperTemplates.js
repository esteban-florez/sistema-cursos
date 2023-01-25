import getBackLink from './getBackLink.js'
const generateAmount = (amount, currency) => currency === 'Bs.D.' ? `${amount} ${currency}` : `${currency}${amount}`

const generateDataPair = ({title, data}) => `<li class="list-group-item d-flex justify-content-between">
  <span>${title}</span>
  <span class="font-weight-bold text-break">${data}</span>
</li>`

function onlineTemplate({title, data, amount, currency}) {
  const lowerTitle = title.toLowerCase()
  const isTransfer = title === 'Transferencia' 
  const article = isTransfer ? 'la' : 'el'

  let paymentData = data.reduce((prev, next) => {
    prev += generateDataPair(next)
    return prev
  }, '')
  paymentData += generateDataPair({
    title: 'Monto total: ',
    data: generateAmount(amount, currency),
  }) 

  return `<h3>${title}</h3>
  <h5>Datos: </h5>
  <ul class="list-group">
    ${paymentData}
  </ul>
  <div class="alert alert-info mt-3">
    <i class="fas fa-info-circle fa-lg mr-2"></i>
    <p class="font-weight-normal d-inline">Luego de realizar ${article} ${lowerTitle}, introduzca el número de referencia.</p>
  </div>
  <form id="refForm">
    <label for="refInput">Referencia</label>
    <input autocomplete="off" class="form-control" type="number" placeholder="Ej. ${!isTransfer ? '1234' : '123567890'}" id="refInput" required>
    <div class="d-flex justify-content-between align-items-center mt-3">
      <div>
        <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
        <button type="button" class="btn btn-info" data-stepper="next" id="payNextButton">Confirmar</button>
      </div>
      <a class="btn btn-danger" href="${getBackLink()}">Cancelar</a>
    </div>
  </form>`
}

function cashTemplate({amount, currency }) {
  return `<h3>Pago en Efectivo (${currency})</h3>
  <h5>
    Monto total:  
    <span class="text-success">${generateAmount(amount, currency)}</span>
  </h5>
  <p>¿Desea confirmar su pago?</p>
  <div class="d-flex justify-content-between">
    <div>
      <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
      <button type="button" class="btn btn-info" data-stepper="next" id="payNextButton">Confirmar</button>
    </div>
    <a class="btn btn-danger" href="${getBackLink()}">Cancelar</a>
  </div>`
}

function fillFinalParagraph(type) {
  const onlineText = 'Su inscripción ha sido registrada con éxito. El administrador verificará su pago en los próximos días. Para formalizar su inscripción debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y llevarla hasta la sede de la UPTA en La Victoria.'
  const cashText = 'Su inscripción ha sido registrada con éxito. Ahora debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y después llevarla impresa a la sede de la UPTA en La Victoria para realizar su pago y confirmar su inscripción.'
  
  document.querySelector('#finalParagraph').innerText = 
    (type === 'movil' || type === 'transfer') 
      ? onlineText : cashText
}

export { cashTemplate, fillFinalParagraph, onlineTemplate, }