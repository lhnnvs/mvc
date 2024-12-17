<?php
$title = "Add New Locker";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <form action="" method="POST" enctype="multipart/form-data" class="w-50">

                    <?php if (!empty($errors)): ?>

                        <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                            <?php foreach ($errors as $error): ?>
                                <?= $error . "<br>" ?>
                            <?php endforeach; ?>

                            <button type="button" class="btn-close mt-1 py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="" class="mb-2">Locker</label>
                        <input name="locker" value="<?= get_var('locker') ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Size</label>
                        <select name="size" class="form-control border-secondary">
                            <option value=""></option>
                            <option <?= get_select('size', 'Small') ?> value="Small">Small</option>
                            <option <?= get_select('size', 'Medium') ?> value="Medium">Medium</option>
                            <option <?= get_select('size', 'Large') ?> value="Large">Large</option>
                            <option <?= get_select('size', 'Custom') ?> value="Custom">Custom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Dimension</label>
                        <input name="dimension" value="<?= get_var('dimension') ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="mb-2">Price</label>
                        <input name="price" value="<?= get_var('price') ?>" type="number" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Status</label>
                        <select name="status" class="form-control border-secondary">
                            <option value=""></option>
                            <option <?= get_select('status', 'Available') ?> value="Available">Available</option>
                            <option <?= get_select('status', 'Unavailable') ?> value="Unavailable">Unavailable</option>
                            <option <?= get_select('status', 'Occupied') ?> value="Occupied">Occupied</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Access</label>
                        <select name="access" class="form-control border-secondary">
                            <option value=""></option>
                            <option <?= get_select('access', 'Locked') ?> value="Locked">Locked</option>
                            <option <?= get_select('access', 'Unlocked') ?> value="Unlocked">Unlocked</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark me-3 px-5">Save</button>
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