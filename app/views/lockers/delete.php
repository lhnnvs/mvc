<?php
$title = "Delete Locker";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <form action="" method="POST" class="w-50">
                    <div class="mb-3">
                        <label for="" class="mb-2">Locker</label>
                        <input name="locker" disabled value="<?= $locker->locker ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Size</label>
                        <input name="size" disabled value="<?= $locker->size ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Dimension</label>
                        <input name="dimension" disabled value="<?= $locker->dimension ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Price</label>
                        <input name="price" disabled value="<?= $locker->price ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Status</label>
                        <input name="status" disabled value="<?= $locker->status ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-4">
                        <label for="" class="mb-2">Access</label>
                        <input name="access" disabled value="<?= $locker->access ?>" type="text" class="form-control border-secondary">
                    </div>
                    <input type="hidden" name="id" value="<?= $locker->id ?>">
                    <button type="submit" class="btn btn-danger me-3 px-5">Delete</button>
                    <button type="button" class="btn btn-light border-secondary px-5" onclick="window.location.href='<?= ROOT ?>/lockers'">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    function validateInput(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>
</body>

</html>