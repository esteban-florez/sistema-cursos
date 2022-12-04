<x-modal id="infoModal">
  <x-slot name="header">
    <h4 class="modal-title">Contáctanos</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <h5>Redes Sociales: </h5>
  <ul class="d-flex list-unstyled">
    <li class="mr-3">
      <a href="#">
        <i class="fab fa-facebook"></i>
        Facebook
      </a>
    </li>
    <li class="mr-3">
      <a href="#">
        <i class="fab fa-twitter"></i>
        Twitter
      </a>
    </li>
    <li class="mr-3">
      <a href="#">
        <i class="fab fa-instagram"></i>
        Instagram
      </a>
    </li>
  </ul>
  <h5>Contacto: </h5>
  <p>04XX-XXX-XXXX - correoupta@example.com</p>
  <x-slot name="footer">
    <span class="float-left">UPTA "Federico Brito Figueroa" | 2022</span>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
  </x-slot>
</x-modal>