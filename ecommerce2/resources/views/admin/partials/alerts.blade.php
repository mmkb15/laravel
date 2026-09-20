@if(session('success'))
<div class="block-available mb-20">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="block-not-available mb-20">{{ session('error') }}</div>
@endif
@if($errors->any())
<div class="block-not-available mb-20">
    <strong>Please fix the following:</strong>
    <ul class="mt-5">
        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul>
</div>
@endif
