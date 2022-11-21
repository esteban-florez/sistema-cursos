<div class="d-md-flex gap-2 py-sm-2 breadcrumbs" :section="$section">
    @if ($section=='Clubs')
        <a href="{{route('club.create')}}">Crear Clubs</a>
        <a href="{{route('club.index')}}">Listado de Clubs</a>
    @elseif ($section=='Clubs')
        <a href="#">Crear Clubs</a>
        <a href="#">Listado de Clubs</a>
    @endif
</div>