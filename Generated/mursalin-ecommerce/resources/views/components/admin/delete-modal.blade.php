<div class="modal fade" id="modal-delete-item" tabindex="-1" aria-labelledby="modal-delete-item-label"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-item-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0" id="modal-delete-item-text">

                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <form method="POST" id="modal-delete-item-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const table = document.querySelector('.table-responsive');


    table.addEventListener('click', (e) => {
        const deleteBtn = e.target.closest('.delete-btn')
        if (!deleteBtn) return;

        const deleteForm = document.querySelector('#modal-delete-item-form');
        const modalLabel = document.querySelector('#modal-delete-item-label');
        const modalText = document.querySelector('#modal-delete-item-text');

        const deleteItemName = deleteBtn.dataset.itemName;
        deleteForm.setAttribute("action", deleteBtn.dataset.itemDeleteUrl);
        modalLabel.innerText = `Delete ${deleteItemName}`;
        modalText.innerText = `Are you sure you want to delete ${deleteItemName}?`;

    })

</script>
