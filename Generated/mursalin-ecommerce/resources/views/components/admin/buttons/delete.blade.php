@props(['itemName', 'itemDeleteUrl'])

<button type="button" class="delete-btn btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-item"
    data-item-name = "{{ $itemName }}" data-item-delete-url = "{{ $itemDeleteUrl }}">
    <i class="bi bi-trash"> </i>
</button>
