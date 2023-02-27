<x-layout.main title="Cambiar contraseña">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/change-password.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/newPassword.js') }}"></script>
  @endpush

  <section class="container-fluid">
    <div class="password-box mt-3">
      <div class="card password-card">
        <div class="card-body">
          <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <x-input-group type="password" name="password_current" id="passwordCurrent" placeholder="Ingresa la contraseña actual..." required>
              Contraseña Actual:
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </x-slot>
            </x-input-group>
            <hr>
            <x-password-tooltip />
            <x-input-group type="password" name="password" id="password" placeholder="Ingresa nueva contraseña..." required>
              Nueva contraseña:
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </x-slot>
            </x-input-group>
            @error('password')
              <p class="text-danger">{{ ucfirst($message) }}</p>
            @enderror
            <x-input-group type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Confirma nueva contraseña..." required>
              Confirma la nueva contraseña:
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </x-slot>
            </x-input-group>
            <div class="d-flex justify-content-between align-items-center">
              <x-button color="danger" icon="times" :url="route('users.show', $user)">
                Cancelar
              </x-button>
              <x-button color="success" type="submit" icon="check">Aceptar</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>
