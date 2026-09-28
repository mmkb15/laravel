<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Confirm Delete</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
    <div class="modal-body">Are you sure you want to delete this record?</div>
    <div class="modal-footer"><button type="button" class="tf-button style-2" data-bs-dismiss="modal">Cancel</button>
      <form id="deleteModalForm" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="tf-button" type="submit">Delete</button></form>
    </div>
  </div></div>
</div>
<?php $__env->startSection('script'); ?>
<script>
document.querySelectorAll('.js-delete').forEach(function(button){
    button.addEventListener('click',function(){
        document.getElementById('deleteModalForm').action=this.dataset.action;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/partials/delete-modal.blade.php ENDPATH**/ ?>