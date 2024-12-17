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
    <div class="container d-flex flex-column text-white fs-3 px-5 py-4" style="max-width: 768px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex justify-content-between">
            <a href="<?= ROOT ?>/kiosk" class="text-white"><i class="bi bi-chevron-left"></i></a>
            <div></div>
        </div>
        <div class="d-flex flex-column flex-fill align-items-center justify-content-center px-5">
            <h1 class="fw-bold mb-2" style="font-size: 4rem;"><i>SCAN HERE</i></h1>
            <div class="mb-4">To Access Your Locker!</div>
            <div class="d-flex justify-content-center border rounded-5 bg-white mb-5 p-4 w-50">
                
                <?php
                    include 'phpqrcode/qrlib.php';
                    $text = ROOT."/mobile?id=".$_GET["id"];
                    $path = "qrcodes/";
                    $file = $path.uniqid().".png";
                    QRcode::png($text, $file, 'L', 10, 10);
                    
                    echo "<img src='../".$file."' class='w-100' alt=''>";
                ?>
            </div>
            <button class="btn btn-dark border rounded-pill fs-3 w-75" id="BackButton" onclick="window.location.href='<?= ROOT ?>/kiosk'">Back</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.rawgit.com/neocotic/qrious/master/dist/qrious.min.js"></script>
</body>

</html>