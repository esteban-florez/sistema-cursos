<section class="card px-3 py-2 mb-1" :section="$section">
    <div class="d-sm-flex justify-content-between align-items-center">
        <h1>{{ $slot }}</h1>
        <x-layout.breadcrumbs section="{{ $section }}"/>
    </div>
</section>