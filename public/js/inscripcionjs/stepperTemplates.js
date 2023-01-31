import getBackLink from './getBackLink.js'

const generateDataPair = ({title, data}) => `<li class="list-group-item d-flex justify-content-between">
  <span>${title}</span>
  <span class="font-weight-bold text-break">${data}</span>
</li>`

function onlineTemplate({type, mode, data, amount}) {
  const lowerType = type.toLowerCase()
  const isTransfer = type === 'Transferencia' 
  const article = isTransfer ? 'la' : 'el'

  data.push({
    title: mode === 'Un solo pago' ? 'Monto total: ' : 'Monto de reservación: ',
    data: amount,
  })

  let paymentData = data.reduce((prev, next) => prev.concat(generateDataPair(next)), '')

  return `<h3>${type}</h3>
  <h5>Datos: </h5>
  <ul class="list-group">
    ${paymentData}
  </ul>
  <div class="alert alert-info mt-3">
    <i class="fas fa-info-circle fa-lg mr-2"></i>
    <p class="font-weight-normal d-inline">Luego de realizar ${article} ${lowerType}, introduzca el número de referencia.</p>
  </div>
    <label>Referencia</label>
    <input autocomplete="off" class="form-control" type="number" name="ref" placeholder="Ej. ${!isTransfer ? '1234' : '123567890'}" required>
    <div class="d-flex justify-content-between align-items-center mt-3">
      <div>
        <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
        <button type="submit" class="btn btn-info">Confirmar</button>
      </div>
      <a class="btn btn-danger" href="${getBackLink()}">Cancelar</a>
    </div>`
}

function cashTemplate({ amount, type, mode }) {
  return `<h3>Pago en ${type}</h3>
  <h5>
    ${mode === 'Un solo pago' ? 'Monto total: ' : 'Monto de reservación: '}
    <span class="text-success">${amount}</span>
  </h5>
  <p>¿Desea confirmar su pago?</p>
  <div class="d-flex justify-content-between">
    <div>
      <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
      <button type="submit" class="btn btn-info">Confirmar</button>
    </div>
    <a class="btn btn-danger" href="${getBackLink()}">Cancelar</a>
  </div>`
}

export { cashTemplate, onlineTemplate, }