<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error Page</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex min-vh-100" style="background-image: url('../public/assets/images/404-bg.png'); background-size: cover; background-position: center;">
  <div class="d-flex align-items-center justify-content-center ms-5 w-50">
    <div class="text-center text-white ms-5">
      <h1 class="mb-4" style="font-size: 4rem;">404 - error</h1>
      <h2 class="mb-4">PAGE NOT FOUND</h2>
      <p class="text-light mb-5">Unfortunately, the page you were looking for may<br>have been moved, deleted, or never existed.</p>
      <button type="submit" class="btn btn-dark border rounded-pill w-50" onclick="window.location.href='<?= ROOT ?>/home'">Back to home</button>
    </div>
  </div>
</body>

</html>