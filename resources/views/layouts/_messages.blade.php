@if (session()->has('message'))
<div class="alert alert-info">
    {{ session()->get('message') }}
</div>
@endif