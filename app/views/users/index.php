<?php
$title = "Admins";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh - 100px);">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="d-flex justify-content-between mb-3 w-100">
                    <div class="d-flex gap-2">

                        <?php
                        $userCount = 0;

                        if ($users != null) {
                            foreach ($users as $item) {
                                if ($item) {
                                    $userCount++;
                                }
                            }
                        }
                        ?>

                        <div class="fw-bold">Showing:</div>
                        <div class="text-decoration-underline">All (<?= $userCount ?>)</div>
                    </div>
                    <a href="<?= ROOT ?>/users/create" class="text-black text-decoration-none">Add New</a>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Manage</th>
                    </tr>
                    <?php if ($users != null) { ?>
                        <?php foreach ($users as $item) { ?>
                            <tr>
                                <td><img src="<?= ROOT ?>/<?= $item->image ?>" alt="" class="rounded-circle me-3" width="30px" height="30px"><?= $item->firstname ?> <?= $item->lastname ?></td>
                                <td><?= $item->contact ?></td>
                                <td><?= $item->email ?></td>
                                <td>
                                    <a href="<?= ROOT ?>/users/edit/<?= $item->id ?>" class="text-black"><i class="bi bi-pencil-square me-2" title="Edit"></i></a>
                                    <a href="<?= ROOT ?>/users/delete/<?= $item->id ?>" class="text-black"><i class="bi bi-trash" title="Delete"></i></a>
                                </td>
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
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>