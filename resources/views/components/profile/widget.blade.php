@props(['name', 'role', 'image', 'courseCount', 'clubCount', 'noseCount'])

<div class="card card-widget widget-user card-profile mb-3 mx-2">
  <div class="widget-user-header bg-primary">
    <h3 class="widget-user-username">{{ $name }}</h3>
    <h5 class="widget-user-desc">{{ $role }}</h5>
  </div>
  <div class="widget-user-image">
    <img class="img-circle elevation-2 profile-img img-cover"
    src="{{ asset($image) }}"
    alt="User Avatar">
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-6 border-right">
        <div class="description-block">
          <h5 class="m-0 text-truncate">Cursos</h5>
          <p class="profile-number badge badge-dark m-0 mt-2">{{ $courseCount }}</p>
        </div>
      </div>
      <div class="col-6">
        <div class="description-block">
          <h5 class="m-0 text-truncate">Clubes</h5>
          <p class="profile-number badge badge-dark m-0 mt-2">{{ $clubCount }}</p>
        </div>
      </div>
    </div>
  </div>
</div>