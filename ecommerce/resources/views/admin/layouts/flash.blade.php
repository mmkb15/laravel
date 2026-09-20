{{-- Session flash messages. Validation errors are rendered per-page so they
     don't duplicate the inline @error messages already shown under fields. --}}
<div class="ecom-alert-stack">
    <x-alert type="success" :messages="session('success')" />
    <x-alert type="error" :messages="session('error')" />
    <x-alert type="warning" :messages="session('warning')" />
    <x-alert type="info" :messages="session('info')" />
</div>
