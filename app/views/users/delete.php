<?php
$title = "Delete Account";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <form action="" method="POST" class="w-50">
                    <div class="mb-3">
                        <label for="" class="mb-2">First Name</label>
                        <input name="firstname" disabled value="<?= $user->firstname ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Last Name</label>
                        <input name="lastname" disabled value="<?= $user->lastname ?>" type="text" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Contact</label>
                        <input name="contact" disabled value="<?= $user->contact ?>" type="tel" class="form-control border-secondary">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Email</label>
                        <input name="email" disabled value="<?= $user->email ?>" type="email" class="form-control border-secondary">
                    </div>
                    <div class="mb-4">
                        <label for="" class="mb-2">Password</label>
                        <input name="password" disabled value="<?= $user->password ?>" type="password" class="form-control border-secondary">
                    </div>
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit" class="btn btn-danger me-3 px-5">Delete</button>
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