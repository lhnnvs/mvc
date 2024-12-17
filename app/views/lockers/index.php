<?php
$title = "Lockers";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh - 100px);">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="d-flex justify-content-between mb-3 w-100">
                    <div class="d-flex gap-2">

                        <?php
                        $lockerCount = 0;

                        if ($lockers != null) {
                            foreach ($lockers as $item) {
                                if ($item) {
                                    $lockerCount++;
                                }
                            }
                        }
                        ?>

                        <div class="fw-bold">Showing:</div>
                        <div class="text-decoration-underline">All (<?= $lockerCount ?>)</div>
                    </div>
                    <a href="<?= ROOT ?>/lockers/create" class="text-black text-decoration-none">Add New</a>
                </div>
                <table class="table table-borderless">
                    <tr>
                        <th>Locker</th>
                        <th>Size</th>
                        <th>Dimension</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Access</th>
                        <th>Manage</th>
                    </tr>
                    <?php if ($lockers != null) { ?>
                        <?php foreach ($lockers as $item) { ?>
                            <tr>
                                <td><?= $item->locker ?></td>
                                <td><?= $item->size ?></td>
                                <td><?= $item->dimension ?></td>
                                <td><?= $item->price ?></td>
                                <td class="<?= ($item->status == 'Available') ? 'text-success' : (($item->status == 'Occupied') ? 'text-danger' : '') ?>"><?= $item->status ?></td>
                                <td><?= $item->access ?></td>
                                <td>
                                    <a href="<?= ROOT ?>/lockers/edit/<?= $item->id ?>" class="text-black"><i class="bi bi-pencil-square me-2" title="Edit"></i></a>
                                    <a href="<?= ROOT ?>/lockers/delete/<?= $item->id ?>" class="text-black"><i class="bi bi-trash" title="Delete"></i></a>
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