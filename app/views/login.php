<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex min-vh-100" style="background-color: #333;">
  <div class="d-flex flex-column align-items-center text-center text-white fs-3 p-5 w-100" style="background-image: url('assets/images/blocks.jpg'); background-size: cover;">
    <div class="mb-5">Welcome to</div>
    <img src="assets/images/logo.png" class="mb-3">
    <div class="mb-5">SmartBox™</div>
    <p class="text-light fs-6 mt-3 mb-5 w-75">SmartBox™, an innovative solution that allows users to rent lockers through an online platform, enabling secure and convenient<br>access to their belongings.</p>
    <div class="d-flex text-light fs-6 gap-3" style="position: absolute; bottom: 2rem; left: 18%;">
      <div>SmartBox™</div>
      <div>|</div>
      <div>Locker System</div>
    </div>
  </div>

  <div class="d-flex justify-content-center bg-white fs-5 p-5 w-100">
    <form action="" method="POST" class="w-75">
      <h3 class="fw-bold text-center my-5 pb-5">Sign in</h3>
      <div class="d-flex flex-column mb-4">
        <label for="" class="fw-bold mb-2">Email</label>
        <input type="text" class="form-control border-secondary p-2" name="email" placeholder="Enter your email address" value="<?= get_var('email') ?>">
      </div>
      <div class="d-flex flex-column mb-4">
        <label for="" class="fw-bold mb-2">Password</label>
        <input type="password" class="form-control border-secondary p-2" name="password" placeholder="Enter your password">
      </div>

      <?php if (!empty($errors)): ?>

        <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
          <?php foreach ($errors as $error): ?>
            <?= $error . "<br>" ?>
          <?php endforeach; ?>

          <button type="button" class="btn-close mt-1 py-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php endif; ?>

      <div class="d-flex mt-5 px-5">
        <button type="submit" class="btn btn-dark rounded-pill me-5 w-100">Sign In</button>
        <button type="button" class="btn btn-light border-secondary rounded-pill w-100" onclick="window.location.href='<?= ROOT ?>/signup'">Sign Up</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>