
<li class="nav-item">
    <a href="{{ route('costumers.index') }}" class="nav-link {{ Request::is('costumers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Costumers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('avions.index') }}" class="nav-link {{ Request::is('avions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Avions</p>
    </a>
</li>
