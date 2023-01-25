const detailsModal = ({id, courseName, studentName, amount, date, ref, type, status}) => `<div id="details${id}" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h4 class="modal-title">Detalles del pago</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span class="text-white">&times</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Curso: </h5>
          <h6 class="text-truncate m-0">${courseName}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Estudiante: </h5>
          <h6 class="text-truncate m-0">${studentName}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Monto: </h5>
          <h6 class="text-truncate m-0">${amount}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Fecha: </h5>
          <h6 class="text-truncate m-0">${date}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Referencia: </h5>
          <h6 class="text-truncate m-0">${ref}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Tipo: </h5>
          <h6 class="text-truncate m-0">${type}</h6>
        </li>
        <li class="list-group-item">
          <h5 class="mb-0 h6 text-muted">Estado: </h5>
          <h6 class="text-truncate m-0">${status}</h6>
        </li>
      </ul>
      <button type="button" class="btn btn-primary mt-3 ml-1" data-dismiss="modal">
        <span>Aceptar</span>
      </button>
      </div>
    </div>
  </div>
</div>`

export default detailsModal