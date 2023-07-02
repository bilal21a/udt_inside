<li>
    <a class="{{ request()->is('home*') ? 'active' : '' }}" href="{{ route('home') }}">
        <i data-acorn-icon="dashboard-1" class="d-inline-block"></i>
        <span class="label">Dashboard</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
        <i data-acorn-icon="user" class="d-inline-block"></i>
        <span class="label">Customers</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('serviceprovider*') ? 'active' : '' }}" href="{{ route('serviceprovider.index') }}">
        <i data-acorn-icon="user" class="d-inline-block"></i>
        <span class="label">Service Providers</span>
    </a>
</li>
