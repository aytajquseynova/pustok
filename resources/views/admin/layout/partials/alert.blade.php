@if(session()->has('error'))
<div class="mt-3 alert alert-danger">
    {{ session('error') }}
</div>
@endif