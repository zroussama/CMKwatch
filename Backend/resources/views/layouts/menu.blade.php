
<li class="nav-item">
    <a href="{{ route('connections.index') }}" class="nav-link {{ Request::is('connections*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Connections</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('connections.index') }}" class="nav-link {{ Request::is('connections*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Connections</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('voitures.index') }}" class="nav-link {{ Request::is('voitures*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Voitures</p>
    </a>
</li>
