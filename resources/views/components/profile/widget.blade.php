@props(['user'])

<div class="card card-widget widget-user card-profile mb-3 mx-2">
  <div class="widget-user-header bg-primary">
    <h3 class="widget-user-username">{{ $user->full_name }}</h3>
    <h5 class="widget-user-desc">{{ $user->role }}</h5>
  </div>
  <div class="widget-user-image">
    <img class="img-circle elevation-2 profile-img img-cover"
    src="{{ asset($user->image) }}"
    alt="User Avatar">
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-6 border-right">
        <div class="description-block">
          <h5 class="m-0 text-truncate">Cursos</h5>
          @can('role', 'Estudiante')
          <p class="profile-number badge badge-dark m-0 mt-2">
            {{ $user->enrollments()->count() }}
          </p>    
          @elsecan('role', 'Instructor')
          <p class="profile-number badge badge-dark m-0 mt-2">
            {{ $user->dictatedCourses()->count() }}
          </p>    
          @endcan
        </div>
      </div>
      <div class="col-6">
        <div class="description-block">
          <h5 class="m-0 text-truncate">Clubes</h5>
          @can('role', 'Estudiante')
          <p class="profile-number badge badge-dark m-0 mt-2">
            {{ $user->memberships()->count() }}
          </p>    
          @elsecan('role', 'Instructor')
          <p class="profile-number badge badge-dark m-0 mt-2">
            {{ $user->dictatedClubs()->count() }}
          </p>    
          @endcan
        </div>
      </div>
      @can('users.image.update', $user)
        <div class="col-12 mt-3">
          <x-button class="btn-block w-100" data-toggle="modal" data-target="#profileImgModal" icon="image">
            Cambiar imagen de perfil
          </x-button>
        </div>
      @endcan
    </div>
  </div>
</div>