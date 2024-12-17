<?php
$title = "Add New Account";
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

                    <input type="hidden" name="token">
                    <div class="mb-3">
                        <label for="" class="mb-2">Image</label>
                        <input type="file" name="image" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">First Name</label>
                        <input name="firstname" value="<?= get_var('firstname') ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Last Name</label>
                        <input name="lastname" value="<?= get_var('lastname') ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="mb-2">Contact</label>
                        <input type="tel" name="contact" value="<?= get_var('contact') ?>" maxlength="11" pattern="[0-9]*" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Email</label>
                        <input name="email" value="<?= get_var('email') ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-4">
                        <label for="" class="mb-2">Password</label>
                        <input name="password" value="<?= get_var('password') ?>" type="password" class="form-control border-secondary">
                    </div>
                    <button type="submit" class="btn btn-dark me-3 px-5">Save</button>
                    <button type="button" class="btn btn-light border-secondary px-5" onclick="window.location.href='<?= ROOT ?>/users'">Cancel</button>
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