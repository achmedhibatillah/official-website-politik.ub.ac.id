@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->get('error'))
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    {{ session()->get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif