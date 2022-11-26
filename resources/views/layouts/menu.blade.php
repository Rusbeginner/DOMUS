<!-- need to remove -->
<nav class="mt-2">

    <li class="note-nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <p>Inicio</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-solid fa-users"></i>
            <p>Usuarios</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('tipolubricantes.index') }}" class="nav-link {{ Request::is('tipolubricantes*') ? 'active' : '' }}">
            <i class="nav-icon fa-sharp fa-solid fa-oil-well"></i>
            <p>Tipos de lubricantes</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('lubricantes.index') }}" class="nav-link {{ Request::is('lubricantes*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-oil-can"></i>
            <p>Lubricantes</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('tipoequipos.index') }}" class="nav-link {{ Request::is('tipoequipos*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-truck-plane"></i>
            <p>Tipos de vehículos</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('vehiculos.index') }}" class="nav-link {{ Request::is('vehiculos*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-truck"></i>
            <p>Vehículos del inventario</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('ctrlicenciaoperativas.index') }}" class="nav-link {{ Request::is('ctrlicenciaoperativas*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-route"></i>
            <p>Licencias operativas</p>
        </a>
    </li>


    <li class="note-nav-item">
        <a href="{{ route('chofers.index') }}" class="nav-link {{ Request::is('chofers*') ? 'active' : '' }}">
            <i class="nav-icon fa-regular fa-id-card"></i>
            <p>Choferes profesionales</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('combustibles.index') }}" class="nav-link {{ Request::is('combustibles*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-gas-pump"></i>
            <p>Combustibles</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('tarjetamagneticas.index') }}" class="nav-link {{ Request::is('tarjetamagneticas*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-credit-card"></i>
            <p>Tarjetas magnéticas</p>
        </a>
    </li>


    <li class="note-nav-item">
        <a href="{{ route('aslubricantes.index') }}" class="nav-link {{ Request::is('aslubricantes*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-bottle-droplet"></i>
            <p>Asignación de lubricantes</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('ctrlcombustibles.index') }}" class="nav-link {{ Request::is('ctrlcombustibles*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-industry"></i>
            <p>Control de combustibles</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('ctrlicenciaconducs.index') }}" class="nav-link {{ Request::is('ctrlicenciaconducs*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-hard-drive"></i>
            <p>Licencias de conducción</p>
        </a>
    </li>

    <li class="note-nav-item">
        <a href="{{ route('ctrlicenciacircs.index') }}" class="nav-link {{ Request::is('ctrlicenciacircs*') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-circle-up"></i>
            <p>Licencias de circulación</p>
        </a>
    </li>
</nav>
