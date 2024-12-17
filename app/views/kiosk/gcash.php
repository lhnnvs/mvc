<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex bg-dark vh-100">
    <div class="container d-flex flex-column text-white px-5 py-4" style="max-width: 768px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex justify-content-between">
            <a href="<?= ROOT ?>/kiosk/rent?locker=1&size=medium&price=50" class="text-white fs-3"><i class="bi bi-chevron-left"></i></a>
            <div></div>
        </div>
        <form method="GET" action="<?= ROOT ?>/kiosk/setpin" class="d-flex flex-fill flex-column align-items-center justify-content-center px-5">
            <img src="../assets/images/gcash.png" class="mb-4 w-75" alt="GCash Logo">
            <h1 class="fw-bold mb-5">SCAN TO PAY HERE</h1>
            <div class="d-flex justify-content-center rounded-5 bg-white mb-5 p-4 w-50">
                <canvas class="w-100" id="qr-code"></canvas>
            </div>
            <input type="hidden" name="report_id" value="<?php echo $report; ?>" />
            <button type="submit" class="btn btn-dark border rounded-pill fs-3 w-75" id="setButton">SET YOUR 6-DIGIT PIN</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.rawgit.com/neocotic/qrious/master/dist/qrious.min.js"></script>
    <script>
        const qr = new QRious({
            element: document.getElementById('qr-code'),
            size: 400,
        });

        function generateRandomData() {
            return Math.random().toString(36).substring(2, 15);
        }

        qr.value = generateRandomData();
    </script>
</body>

</html>