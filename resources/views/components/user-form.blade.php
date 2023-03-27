@props(['pnfs', 'areas', 'action', 'edit' => false, 'role' => null, 'user' => null])

@push('js')
  <script defer src="{{ asset('js/user-form.js') }}"></script>
@endpush

@php
  $backUrl = $edit 
    ? route('users.show', $user) 
    : route('users.index');
@endphp

<x-select2/>
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @if ($edit)
    @method('PUT')
  @endif
  @csrf
  @if (!$edit)
    <div class="container-fluid">
      <h2 class="mb-0">Datos de usuario</h2>
      <p>
        Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
      </p>
      <div class="row">
        <div class="col-12 col-md-4">
          <x-image-input :image="$user->image ?? null" profile/>
        </div>
        <div class="col-md-8">
          <x-password-tooltip/>
          <x-field type="email" name="email" id="email" placeholder="email@ejemplo.com" value="{{ old('email') ?? '' }}" minlength="6" maxlength="50" required>
            Correo Electrónico:
          </x-field>
          <x-field type="password" name="password" id="password" placeholder="Escriba la contraseña..." minlength="8" maxlength="20" :required>
            Contraseña:
          </x-field>
          <x-field type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Confirme la contraseña..." minlength="8" maxlength="20" :required>
            Confirmar contraseña:
          </x-field>
        </div>
      </div>
    </div>
    <hr>
  @endif
  <div class="container-fluid">
    <h2>Datos personales</h2>
    <div class="row">
      <div class="col-md-6">
        <x-field type="text" name="first_name" id="firstName" placeholder="Ej. Esteban" value="{{ old('first_name') ?? $user->first_name ?? '' }}" minlength="3" maxlength="20" required>
          Primer nombre: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="second_name" id="secondName" placeholder="Ej. Andrés" value="{{ old('second_name') ?? $user->second_name ?? '' }}" minlength="3" maxlength="20">
          Segundo nombre: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="first_lastname" id="firstLastname" placeholder="Ej. Florez" value="{{ old('first_lastname') ?? $user->first_lastname ?? '' }}" minlength="3" maxlength="20" required>
          Primer apellido: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="second_lastname" id="secondLastname" placeholder="Ej. Hernández" value="{{ old('second_lastname') ?? $user->second_lastname ?? '' }}" minlength="3" maxlength="20">
          Segundo apellido: 
        </x-field>
      </div>
      <div class="col-md-4">
        <x-input-group type="number" name="ci" id="ci" placeholder="Ej. 12345678" value="{{ old('ci') ?? $user->ci ?? '' }}" minlength="6" maxlength="10" validNumber required>
          Cédula:
          <x-slot name="prepend">
            <select class="form-control" name="ci_type" required>
              <option value="V">V-</option>
              <option value="E">E-</option>
            </select>
          </x-slot>
          @error('ci')
            <p class="text-danger">{{ ucfirst($message) }}</p>
          @enderror
          @error('ci_type')
            <p class="text-danger">{{ ucfirst($message) }}</p>
          @enderror
        </x-input-group>
      </div>
      <div class="col-md-4">
        <x-field type="date" name="birth" id="birth" value="{{ old('birth') ?? ($edit ? $user->birth->format(DV) : '') }}" max="{{ now()->subDay()->format(DV) }}" required>
          Fecha de nacimiento:
        </x-field>
      </div>
      <div class="col-md-4">
        <x-field type="number" name="phone" id="phone" placeholder="Ej. 04128970019" value="{{ old('phone') ?? $user->phone ?? '' }}" maxlength="11" validNumber required>
          Número de Teléfono: 
        </x-field>
      </div>
      <div class="col-12">
        <x-textarea name="address" id="address" placeholder="Ej. Calle 5 de marzo N°40-11, Santa Cruz, Aragua." :content="old('address') ?? $user->address ?? ''" minlength="6" maxlength="100" required>
          Dirección
        </x-textarea>
      </div>
      @if ($edit)
        @if ($user->role === 'Instructor')
          <div class="col-md-6">
            <x-select name="gender" id="gender" :options="genders()->pairs()" :selected="old('gender') ?? $user->gender ?? null" required>
              Sexo:
            </x-select>
          </div>
          <div class="col-md-6">
            <x-field type="number" name="phone" id="phone" placeholder="Ej. 04128970019" value="{{ old('phone') ?? $user->phone ?? '' }}" maxlength="11" validNumber required>
              Número de Teléfono: 
            </x-field>
          </div>
          <div class="col-md-6">
            <x-select name="area_id" id="areaId" :options="$areas" :selected="old('area_id') ?? $user->area_id ?? null" required>
              Área de Formación:
              @can('create', App\Models\Area::class)
                <x-slot name="extra">
                  <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#createAreaModal">Crear nueva área de formación</a>
                </x-slot>
              @endcan
            </x-select>
          </div>
          <div class="col-md-6">
            <x-field name="degree" id="degree" placeholder="Ej. Ing. en Informática" value="{{ old('degree') ?? $user->degree ?? '' }}" required>
              Titulación:
            </x-field>
          </div>
        @elseif ($user->role === 'Estudiante')
          <div class="col-md-4">
            <x-select name="gender" id="gender" :options="genders()->pairs()" :selected="old('gender') ?? $user->gender ?? null" required>
              Sexo:
            </x-select>
          </div>
          <div class="col-md-4">
            <x-field type="number" name="phone" id="phone" placeholder="Ej. 04128970019" value="{{ old('phone') ?? $user->phone ?? '' }}" maxlength="11" validNumber required>
              Número de Teléfono: 
            </x-field>
          </div>
          <div class="col-md-4">
            <x-select name="grade" id="grade" :options="grades()->pairs()" :selected="old('grade') ?? null" required>
              Grado de Instrucción:
            </x-select>
          </div>
        @endif
      @else
        <div class="col-md-6">
          <x-select name="role" id="role" :options="roles()->pairs()" :selected="old('role') ?? $user->role ?? $role ?? null" required>
            Rol:
          </x-select>
        </div>
        <div class="col-md-6">
          <x-select name="grade" id="grade" :options="grades()->pairs()" :selected="old('grade') ?? $user->grade ?? null" required>
            Grado de Instrucción:
          </x-select>
        </div>
        <div class="col-md-6">
          <x-select name="area_id" id="areaId" :options="$areas" :selected="old('area_id') ?? $user->area_id ?? null" required>
            Área de Formación:
            <x-slot name="extra">
              <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#createAreaModal">Crear nueva área de formación</a>
            </x-slot>
          </x-select>
        </div>
        <div class="col-md-6">
          <x-field name="degree" id="degree" placeholder="Ej. Ing. en Informática" value="{{ old('degree') ?? $user->degree ?? '' }}" required>
            Titulación:
          </x-field>
        </div>
      @endif
    </div>
  </div>
  <div class="d-flex justify-content-between mx-2">
    <x-button :url="$backUrl" color="secondary" icon="times">
      Volver
    </x-button>
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </div>
</form>
@can('create', App\Models\Area::class)
  <x-area.create-modal :pnfs="$pnfs" ajax/>
@endcan