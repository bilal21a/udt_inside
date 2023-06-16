@if (session('alert') != null)
    <div class="alert alert-{{ session('alert')['message'] }}" role="alert">{{ session('alert')['message'] }}</div>
@endif
