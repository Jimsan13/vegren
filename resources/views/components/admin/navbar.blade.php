<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom navbar-custom">
    <div class="container-fluid">
        <button class="btn btn-success" id="sidebarToggle">Menu</button>
        <div class="ms-auto d-flex align-items-center">
            <div class="header-top-right me-3">
                <p class="mb-0">
                    <i class="bi bi-person-fill"></i> {{ Auth::user()->name ?? 'Invitado' }}
                    <br>
                    <i class="bi bi-calendar-check"></i> {{ date('d/m/Y') }}
                </p>
            </div>
        </div>
    </div>
</nav>