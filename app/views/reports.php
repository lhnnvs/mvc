<?php
$title = "Reports";
include PATH . "partials/sidebar.php";
?>

<div class="px-4 overflow-auto" style="max-height: calc(100vh - 100px);">
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white rounded shadow-sm mb-4 p-4">
                <form method="GET" class="d-flex justify-content-between w-100">
                    <?php $dateValue = isset($_GET['date']) ? strval($_GET['date']) : ""; ?>
                    <input type="month" name="date" class="form-control border-secondary" value="<?php echo $dateValue; ?>" style="width: 200px;">
                    <button type="submit" class="btn btn-dark me-3 px-5">Search</button>
                </form>
            </div>
            <div class="bg-white rounded shadow-sm mb-4 p-4">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Rents</th>
                            <th>Total Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $totalRent = 0;
                                $totalProfit = 0;
                                if ($summary != null) {
                                    foreach ($summary as $sum) {
                                        $totalRent = $totalRent + ($sum->total_rents);
                                        $totalProfit = $totalProfit + ($sum->total_hours * $sum->price);
                                    }
                                }
                            ?>
                            <td><?php echo $dateValue; ?></td>
                            <td><?php echo $totalRent; ?></td>
                            <td>P<?php echo $totalProfit; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                                <td><?= $item->locker_id ?></td>
                                <td><?= $item->name ?></td>
                                <td><?= $item->contact ?></td>
                                <td><?= $item->size ?></td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->price*$item->hours ?></td>
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

</body>

</html>