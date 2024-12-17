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
            <div class="fw-bold me-2">Retrieve</div>
            <div></div>
        </div>
        <div class="d-flex flex-fill flex-column align-items-center justify-content-center text-center px-5">
            <img src="../assets/images/terminate.png" class="mb-2">
            <h4 class="fw-bold mb-3">This will end your rent.<br>Are you sure?</h4>
            <div class="text-light fs-6 mb-4">Make sure to retrieve all items<br>before closing</div>
            <button class="btn btn-danger rounded text-white fs-4 mb-3 w-100" onclick="window.location.href='<?= ROOT ?>/mobile/expired'">Confirm</button>
            <button class="btn btn-secondary bg-dark rounded text-white fs-4 w-100" onclick="window.location.href='<?= ROOT ?>/mobile/home'">Back to safety</button>
        </div>
    </div>
</body>

</html>