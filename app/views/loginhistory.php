<?php
$title = "Login History";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh - 100px);">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="d-flex justify-content-between mb-1 w-100">
                    <div class="d-flex gap-2">

                        <?php
                        $accountCount = 0;

                        if ($loginhistory != null) {
                            foreach ($loginhistory as $item) {
                                if ($item) {
                                    $accountCount++;
                                }
                            }
                        }
                        ?>

                        <div class="fw-bold">Showing:</div>
                        <div class="text-decoration-underline">All (<?= $accountCount ?>)</div>
                    </div>
                </div>
                <div class="overflow-auto w-100" style="max-height: calc(75vh);">
                    <table class="table table-borderless">
                        <thead style="position: sticky; top: 0; z-index: 1;">
                            <tr>
                                <th>Account</th>
                                <th>Last Seen</th>
                                <th>Login Time</th>
                                <th>IP Address</th>
                                <th>Device</th>
                            </tr>
                        </thead>
                        <?php if ($loginhistory != null) { ?>
                            <?php foreach ($loginhistory as $item) { ?>
                                <?php
                                $timezone = new DateTimeZone('Asia/Manila');

                                $date = new DateTime($item->login);
                                $date->setTimezone($timezone);
                                ?>
                                <tr>
                                    <td><?= $item->account ?></td>
                                    <td><?= time_ago($item->lastseen) ?></td>
                                    <td><?= $date->format('M d, Y h:i A') ?></td>
                                    <td><?= $item->ip ?></td>
                                    <td width="300"><?= $item->device ?></td>
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