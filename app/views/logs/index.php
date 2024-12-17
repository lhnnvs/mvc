<?php
$title = "Logs";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh);">
    <?php if (empty($_SESSION['USER'])): ?>
        <a href="<?= ROOT ?>/login" class="fw-bold text-black text-decoration-none me-4">Login</a>
    <?php else: ?>
        <div class="bg-white p-4 rounded shadow-sm mb-4">
            <form action="" method="POST">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                        <?php foreach ($errors as $error): ?>
                            <?= $error . "<br>" ?>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close mt-1 py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="note" class="form-label fw-bold">Endorsement Log</label>
                    <textarea class="form-control" name="log" rows="3" placeholder="Write a log note..." required></textarea>
                </div>

                <div class="mb-3">
                    <input name="date" type="hidden" value="<?= date('Y-m-d H:i a'); ?>">
                </div>

                <div class="mb-3">
                    <input name="user" type="hidden" value="<?= $_SESSION['USER']->firstname . ' ' . $_SESSION['USER']->lastname ?>">
                </div>

                <button type="submit" class="btn btn-dark px-5">Submit</button>
            </form>
        </div>
        <div class="bg-white p-4 rounded shadow-sm">
            <div class="overflow-auto w-100" style="max-height: calc(50vh - 30px);">
                <table class="table table-borderless">
                    <thead style="position: sticky; top: 0; z-index: 1;">
                            <tr>
                                <th>Date</th>
                                <th>Log/Note</th>
                                <th>User</th>
                            </tr>
                    </thead>
                    <?php if ($logs != null) { ?>
                        <?php foreach ($logs as $item) { ?>
                            <?php
                            $timezone = new DateTimeZone('Asia/Manila');

                            $date = new DateTime($item->date);
                            $date->setTimezone($timezone);
                            ?>
                            <tr>
                                <td><?= $date->format('M d, Y h:i A') ?></td>
                                <td><?= $item->log ?></td>
                                <td><?= $item->user ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3">
                                <div>No record found.</div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>