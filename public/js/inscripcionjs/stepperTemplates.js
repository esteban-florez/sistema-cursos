const generateAmount = (amount, currency) => currency === 'Bs.D.' ? `${amount} ${currency}` : `${currency}${amount}`;
const generateAmountDescription = payMode => payMode === 'cuotas' ? 'Monto de inscripción: ' : 'Monto total: ';

const generateDataPair = ({title, data}) => `<li class="list-group-item d-flex justify-content-between">
  <span>${title}</span>
  <span class="font-weight-bold text-break">${data}</span>
</li>`;

function onlineTemplate({title, data, mode, amount, currency}) {
  const lowerTitle = title.toLowerCase();
  const article = title === 'Transferencia' ? 'la' : 'el';
  let paymentData = data.reduce((prev, next) => {
    prev += generateDataPair(next);
    return prev;
  }, '');
  paymentData += generateDataPair({
    title: generateAmountDescription(mode),
    data: generateAmount(amount, currency),
  }); 

  return `<h3>${title}</h3>
  <h5>Datos: </h5>
  <ul class="list-group">
    ${paymentData}
  </ul>
  <div class="alert alert-info mt-3">
    <i class="fas fa-info-circle fa-lg mr-2"></i>
    <p class="font-weight-normal d-inline">Luego de realizar ${article} ${lowerTitle}, introduzca el número de referencia.</p>
  </div>
  <form>
    <label for="refInput">Referencia</label>
    <input class="form-control" type="number" placeholder="Ingrese la referencia..." id="refInput">
    <div class="d-flex justify-content-between align-items-center mt-3">
      <div>
        <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
        <button type="button" class="btn btn-info" data-stepper="next" id="payNextButton">Confirmar</button>
      </div>
      <button type="button" class="btn btn-danger" data-stepper="reset">Cancelar</button>
    </div>
  </form>`;
}

function cashTemplate({amount, currency, mode}) {
  return `<h3>Pago en Efectivo (${currency})</h3>
  <h5>
    ${generateAmountDescription(mode)} 
    <span class="text-success">${generateAmount(amount, currency)}</span>
  </h5>
  <p>¿Desea confirmar su pago?</p>
  <div class="d-flex justify-content-between">
    <div>
      <button type="button" class="btn btn-secondary" data-stepper="previous">Volver</button>
      <button type="button" class="btn btn-info" data-stepper="next">Confirmar</button>
    </div>
    <button type="button" class="btn btn-danger" data-stepper="reset">Cancelar</button>
  </div>`
}

function finalTemplate(type) {
  const onlineText = 'Su inscripción ha sido registrada con éxito. El administrador verificará su pago en los próximos días.';
  const cashText = 'Su inscripción ha sido registrada con éxito. Diríjase a la sede de la UPTA en La Victoria para consignar su pago y confirmar su inscripción.';
  
  return `<h3>Inscripción finalizada</h3>
<div class="alert alert-success mt-3">
  <i class="fas fa-info-circle fa-lg mr-2"></i>
  <p class="font-weight-normal d-inline">${type === 'online' ? onlineText : cashText}</p>
</div>
<a class="text-primary" href="pagos-user.html" type="button">Ir a mis pagos</a>`;
}

export { cashTemplate, finalTemplate, onlineTemplate, };