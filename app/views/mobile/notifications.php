<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex text-white bg-dark vh-100">
    <div class="container d-flex flex-column align-items-center fs-4 p-4" style="max-width: 480px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex align-itmes-center justify-content-between w-100">
            <a href="<?= ROOT ?>/mobile/home" class="text-white"><i class="bi bi-arrow-left"></i></a>
            <div class="fw-bold">Notifications</div>
            <div></div>
        </div>
        <div class="d-flex flex-fill flex-column align-items-center justify-content-center text-center">
            <img src="../assets/images/notifications.png" class="mb-3">
            <h2 class="fw-bold mb-2">No notifications yet</h2>
            <div class="text-light fs-6">Your notification will appear here<br>once you’ve received them.</div>
        </div>
    </div>
</body>

</html>