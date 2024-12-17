<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Lockers</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            color: white;
            text-decoration: none;
            font-size: 2rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .box.disabled {
            pointer-events: none;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .available {
            background-color: #28a745;
        }

        .occupied {
            background-color: #dc3545;
        }

        .unavailable {
            background-color: #6c757d;
        }
    </style>
</head>

<body class="d-flex bg-dark vh-100">
    <div class="container d-flex flex-column justify-content-center text-center text-white fs-3 px-5 py-4" style="max-width: 768px; background-image: url('assets/images/bg.jpg'); background-size: cover;">
        <h1 class="fw-bold mb-5">Available Lockers</h1>
        <div class="px-5">
            <div class="row g-4 mb-4">
                <?php if (count($lockers) > 0) { 
                 foreach ($lockers as $locker) { ?>
                    <div class="col-6">
                        <a href="<?= ROOT ?>/kiosk/rent?locker=<?= $locker->id ?>&size=<?= $locker->size ?>&price=<?= $locker->price ?>" class="box  <?= getLockerClass($locker->status) ?>" style="height: 15rem;">
                            <?= str_pad($locker->locker, 3, '0', STR_PAD_LEFT) ?>
                            <?php echo "<br>".$locker->size; ?>
                        </a>
                    </div>
                <?php }
                } else {
                    echo "<div class='col-12'>No lockers found.</div>";
                } ?>
            </div>

        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>/../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
function getLockerClass($status)
{
    switch (strtolower($status)) {
        case 'available':
            return 'available';
        case 'occupied':
            return 'occupied disabled';
        case 'unavailable':
            return 'unavailable disabled';
        default:
            return '';
    }
}
?>
