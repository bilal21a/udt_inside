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
<li>
    <a class="{{ request()->is('vehicle_make*') ? 'active' : '' }}" href="{{ route('vehicle_make.index') }}">
        <i data-acorn-icon="car" class="d-inline-block"></i>
        <span class="label">Vehicle Make</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('vehicle_modal*') ? 'active' : '' }}" href="{{ route('vehicle_modal.index') }}">
        <i data-acorn-icon="car" class="d-inline-block"></i>
        <span class="label">Vehicle Modals</span>
    </a>
</li>
