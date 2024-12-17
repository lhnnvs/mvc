<?php
$title = "Dashboard";
include "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh);">
    <div class="row g-3 mb-4">
        <?php
        $occupiedCount = 0;

        if ($lockers != null) {
            foreach ($lockers as $item) {
                if ($item->status == 'Occupied') {
                    $occupiedCount++;
                }
            }
        }
        ?>
        <div class="col-3">
            <div class="bg-white p-4 rounded shadow-sm">
                <div>Active Rentals</div>
                <div class="fs-1 fw-bold"><?= $occupiedCount ?></div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p-4 rounded shadow-sm">
                <div>Profit</div>
                <div class="fs-1 fw-bold">-</div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p-4 rounded shadow-sm">
                <div>Total Rentals Today</div>
                <div class="fs-1 fw-bold">-</div>
            </div>
        </div>

        <div class="col-3">
            <div class="bg-white p-4 rounded shadow-sm">
                <div>Suggested</div>
                <div class="fs-1 fw-bold">-</div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6">
            <div class="bg-white py-4 ps-4 rounded shadow-sm">
                <div class="mb-2">Lockers</div>
                <div class="d-flex">
                    <div class="overflow-auto w-100" style="max-height: calc(25vh + 20px);">
                        <table class="table table-borderless">
                            <thead style="position: sticky; top: 0; z-index: 1;">
                            <tr>
                                <th>Locker</th>
                                <th>Size</th>
                                <th>Status</th>
                                <th>Access</th>
                            </tr>
                            </thead>
                            <?php if ($lockers != null) { ?>
                                <?php foreach ($lockers as $item) { ?>
                                    <tr>
                                        <td><?= $item->locker ?></td>
                                        <td><?= $item->size ?></td>
                                        <td class="<?= ($item->status == 'Available') ? 'text-success' : (($item->status == 'Occupied') ? 'text-danger' : '') ?>"><?= $item->status ?></td>
                                        <td><?= $item->access ?></td>
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

                    <?php
                    $availableCount = 0;
                    $unavailableCount = 0;
                    $occupiedCount = 0;

                    if ($lockers != null) {
                        foreach ($lockers as $item) {
                            if ($item->status == 'Available') {
                                $availableCount++;
                            } elseif ($item->status == 'Unavailable') {
                                $unavailableCount++;
                            } elseif ($item->status == 'Occupied') {
                                $occupiedCount++;
                            }
                        }
                    }
                    ?>

                    <div class="d-flex justify-content-center w-50">
                        <div>
                            <div class="mb-2">
                                <div>Available</div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="legend-dot bg-success"></div>
                                    <span class="fs-4 fw-bold"><?= $availableCount ?></span>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div>Unavailable</div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="legend-dot bg-secondary"></div>
                                    <span class="fs-4 fw-bold"><?= $unavailableCount ?></span>
                                </div>
                            </div>
                            <div>
                                <div>Occupied</div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="legend-dot bg-danger"></div>
                                    <span class="fs-4 fw-bold"><?= $occupiedCount ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="bg-white p-4 rounded shadow-sm">
                <div class="mb-3">Usage</div>
                <div class="overflow-auto" style="max-height: calc(25vh + 10px);">
                    <canvas id="usageChart" height="108"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white rounded shadow-sm mb-4 p-4">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Locker</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Size</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>Hours</th>
                            <th>Date</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($reports != null) { ?>
                            <?php foreach ($reports as $item) { ?>
                                <tr>
                                    <td><?= $item->locker ?></td>
                                    <td><?= $item->firstname . " " . $item->lastname ?></td>
                                    <td><?= $item->contact ?></td>
                                    <td><?= $item->size ?></td>
                                    <td><?= $item->price ?></td>
                                    <td><?= $item->price * $item->hours ?></td>
                                    <td><?= $item->hours ?></td>
                                    <td><?= $item->date ?></td>
                                    <td><?= $item->start ?></td>
                                    <td><?= $item->end ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="10">
                                    <div>No record found.</div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    const today = new Date();
    const weekLabels = [];

    for (let i = 0; i < 14; i++) {
        let labelDate = new Date(today);
        labelDate.setDate(today.getDate() - (13 - i));
        const date = labelDate.getDate();
        const month = labelDate.toLocaleString('en-US', {
            month: 'short'
        });
        weekLabels.push(`${month} ${date}`);
    }

    var ctx = document.getElementById('usageChart').getContext('2d');
    var usageChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: weekLabels,
            datasets: [{
                data: [3, 5, 3, 4, 5, 9, 4, 5, 4, 5, 4, 5, 5, 3],
                borderColor: '#343a40',
                fill: false,
                borderWidth: 2.5,
                pointBackgroundColor: 'white'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>

</body>

</html>