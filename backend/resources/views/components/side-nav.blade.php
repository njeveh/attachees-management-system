<nav id="sidenav" class="pb-5">
    <div class="d-flex justify-content-end p-2">
        <button class="btn-close sidenavCollapse"></button>
    </div>
    <div class="sidenav-header">
        <a href="{{ route('welcome.page') }}">
            <img src="/assets/static/logo.png" alt="JKUAT Logo" />
        </a>
        <h3>{{ $heading }}</h3>
        <div style="border-bottom: 1px solid white; width: 80%; margin: 10px auto;"></div>
    </div>

    <ul class="list-unstyled components">
        <p>Menu</p>
        {{ $links }}
    </ul>
</nav>
