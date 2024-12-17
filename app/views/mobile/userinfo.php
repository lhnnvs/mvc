<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information Form</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex bg-dark vh-100">
    <div class="container d-flex flex-column text-white fs-4 p-4" style="max-width: 480px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex justify-content-between mb-5">
            <a href="<?= ROOT ?>/mobile" class="text-white"><i class="bi bi-arrow-left"></i></a>
            <div></div>
        </div>
        <form method="POST" action="<?= ROOT ?>/mobile/terms" class="px-2">
            <h2 class="fw-bold mb-5">Enter your name and your phone number:</h2>
            <div class="mb-4">
                <label class="text-light fs-6">NAME</label>
                <input type="text" name="name" class="form-control fs-4" id="userName" placeholder="Name" required>
            </div>
            <div class="mb-5">
                <label class="text-light fs-6">PHONE NUMBER</label>
                <input type="tel" name="phone" class="form-control fs-4" id="userPhone" placeholder="Phone number" required inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </div>
            <input type="hidden" name="id" value="<?= $user->id; ?>" />
            <button type="submit" class="btn btn-dark border fs-4 w-100" id="proceedButton">PROCEED</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('proceedButton').addEventListener('click', function() {
            const userName = document.getElementById('userName').value;
            const userPhone = document.getElementById('userPhone').value;

            if (userName && userPhone) {

                // window.location.href = `<?= ROOT ?>/mobile/terms?name=${encodeURIComponent(userName)}&phone=${encodeURIComponent(userPhone)}`;
            } else {
                alert('Please fill in both fields.');
            }
        });
    </script>

</body>

</html>