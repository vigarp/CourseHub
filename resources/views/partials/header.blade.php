<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('courses.index') }}">
            <span class="bg-primary text-white rounded px-2 py-1 fs-6">
                <i class="bi bi-mortarboard-fill"></i>
            </span>
            <span>Course<span class="text-primary">Hub</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.index') && !request('category') ? 'active fw-semibold' : '' }}" href="{{ route('courses.index') }}">
                        <i class="bi bi-house-door me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('category') ? 'active fw-semibold' : '' }}" href="{{ route('courses.index') }}#katalog">
                        <i class="bi bi-grid me-1"></i> Katalog Kursus
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2 small">
                <a href="javascript:void(0)" class="text-light text-opacity-75 text-decoration-none disabled" tabindex="-1" aria-disabled="true">
                    Login
                </a>
                <span class="text-secondary">|</span>
                <a href="javascript:void(0)" class="text-light text-opacity-75 text-decoration-none disabled" tabindex="-1" aria-disabled="true">
                    Register
                </a>
            </div>
        </div>
    </div>
</nav>
