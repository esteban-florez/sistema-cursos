@props(['type', 'pnfs' => null, 'areas' => null, 'image' => false, 'action', 'user' => null, 'edit' => false])

@php
  if(isset($user)) {
    $gender = $user->getRawOriginal('gender');
    $phone = (int) $user->phone;
  }
  $back = $type === 'instructor' ? 'instructors.index' : 'students.index' ; 
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @if ($edit)
    @method('PUT')
  @endif
  @csrf
  <div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-0">Datos de usuario</h2>
  </div>
  <p>
    Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
  </p>
  <div class="container-fluid">
    <div class="row">
      @if ($image)
        <div class="col-12 col-md-4">
          <x-image-input :image="$user->image ?? null" profile/>
        </div>
        <div class="col-md-8">
          <x-field type="email" name="email" id="email" placeholder="email@ejemplo.com" value="{{ old('email') ?? $user->email ?? '' }}" required>
            Correo Electrónico:
          </x-field>
          <x-field type="password" name="password" id="password" placeholder="Escriba la contraseña..." required>
            Contraseña:
          </x-field>
          <x-field type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Confirme la contraseña..." required>
            Confirmar contraseña:
          </x-field>
        </div>
      @else
        <div class="col-md-4">
          <x-field type="email" name="email" id="email" placeholder="email@ejemplo.com" value="{{ old('email') ?? $user->email ?? '' }}" required>
            Correo Electrónico:
          </x-field>
        </div>
        <div class="col-md-4">
          <x-field type="password" name="password" id="password" placeholder="Escriba la contraseña..." required>
            Contraseña:
          </x-field>
        </div>
        <div class="col-md-4">
          <x-field type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Confirme la contraseña..." required>
            Confirmar contraseña:
          </x-field>
        </div>
      @endif
      </div>
    </div>
    <hr>
    <h2>Datos personales</h2>
    <div class="row">
      @if($type === 'instructor')
      <div class="col-md-6">
        <x-field type="text" name="name" id="name" placeholder="Ej. Esteban" value="{{ old('name') ?? $user->name ?? '' }}" required>
          Nombre: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="lastname" id="lastname" placeholder="Ej. Florez" value="{{ old('lastname') ?? $user->lastname ?? '' }}" required>
          Apellido: 
        </x-field>
      </div>
      @else
      <div class="col-md-6">
        <x-field type="text" name="first_name" id="firstName" placeholder="Ej. Esteban" value="{{ old('first_name') ?? $user->first_name ?? '' }}" required>
          Primer nombre: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="second_name" id="secondName" placeholder="Ej. Andrés" value="{{ old('second_name') ?? $user->second_name ?? '' }}">
          Segundo nombre: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="first_lastname" id="firstLastname" placeholder="Ej. Florez" value="{{ old('first_lastname') ?? $user->first_lastname ?? '' }}" required>
          Primer apellido: 
        </x-field>
      </div>
      <div class="col-md-6">
        <x-field type="text" name="second_lastname" id="secondLastname" placeholder="Ej. Hernández" value="{{ old('second_lastname') ?? $user->second_lastname ?? '' }}">
          Segundo apellido: 
        </x-field>
      </div>
      @endif
      <div class="col-md-6">
        <label for="ci">
          <i class="fas fa-asterisk text-danger mr-1"></i>
          Cédula: 
        </label>
        <div class="d-flex ci-wrapper">
          <select class="form-control w-25" name="ci_type" required>
            <option value="V">V-</option>
            <option value="E">E-</option>
          </select>
          <input autocomplete="off" class="form-control" type="number" name="ci" placeholder="12345678" id="ci" value="{{ old('ci') ?? $user->ci ?? '' }}" required>
        </div>
      </div>
      <div class="col-md-6">
        <x-field type="date" name="birth" id="birth" value="{{ old('birth') ?? $user->birth ?? '' }}" required>
          Fecha de nacimiento:
        </x-field>
      </div>
      <div class="{{ $type === 'student' ? 'col-md-4' : 'col-md-6' }}">
        <x-select name="gender" id="gender" :options="genders()->pairs()" :selected="old('gender') ?? $gender ?? null" default required>
          Sexo:
        </x-select>
      </div>
      <div class="{{ $type === 'student' ? 'col-md-4' : 'col-md-6' }}">
        <x-field type="number" name="phone" id="phone" placeholder="04128970019" value="{{ old('phone') ?? $phone ?? '' }}" required>
          Número de Teléfono: 
        </x-field>
      </div>
      @if ($type === 'student')
      <div class="col-md-4">
        <x-select name="grade" id="grade" :options="grades()->pairs()" :selected="old('grade') ?? $user->grade ?? null" default required>
          Grado de Instrucción:
        </x-select>
      </div>
      @else
      <div class="col-md-6">
        <x-field type="text" name="degree" id="degree" placeholder="Ej. Ing. en Informática" value="{{ old('degree') ?? $user->degree ?? '' }}" required>
          Titulación:
        </x-field>
      </div>
      <div class="col-md-6">
        <x-select name="area_id" id="areaId" :options="$areas" :selected="old('area_id') ?? $user->area_id ?? null" required>
          Área de Formación:
          <x-slot name="extra">
            <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#newAreaModal">Crear nueva área de formación</a>
          </x-slot>
        </x-select>
      </div>
      @endif
      <div class="col-12">
        <x-textarea name="address" id="address" placeholder="Ej. Calle 5 de marzo N°40-11, Santa Cruz, Aragua." :content="old('address') ?? $user->address ?? ''" required>
          Dirección
        </x-textarea>
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <x-button :url="route($back)" color="secondary" icon="times">
        Volver
      </x-button>
      <x-button type="submit" color="success" icon="check">
        Aceptar
      </x-button>
    </div>
  </div>
</form>
@if ($type === 'instructor')
<x-area.new id="newAreaModal" :pnfs="$pnfs"/>
@endif