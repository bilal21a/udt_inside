@if (session('alert') != null)
    <div class="alert alert-{{ session('alert')['type'] }}" role="alert">{{ session('alert')['message'] }}</div>
@endif
