<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renting Process</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex bg-dark vh-100">
    <div class="container d-flex flex-column flex-fill text-white fs-3 px-5 py-4" style="max-width: 768px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex justify-content-between">
            <a href="<?= ROOT ?>/kiosk" class="text-white"><i class="bi bi-chevron-left"></i></a>
            <div id="currentTime"></div>
        </div>
        <div class="d-flex flex-fill align-items-center justify-content-center px-5">
            <form method="POST"action="<?= ROOT ?>/kiosk/gcash" class="w-100">
            <!--<div class="w-100">-->
                <div class="text-center mb-4">
                    <h1 class="fw-bold border-bottom pb-5">
                        
                        <?php
                        
                        if (isset($_GET['locker'], $_GET['size'], $_GET['price'])) {
                            $locker = htmlspecialchars($_GET['locker']);
                            $size = htmlspecialchars($_GET['size']);
                            $price = htmlspecialchars($_GET['price']);
                            echo "LOCKER {$locker}";
                        } else {
                            echo "LOCKER";
                        }
                        
                        ?>
                    </h1>
                </div>

                <div class="d-flex justify-content-between mb-5 w-100">
                    <div class="fw-bold" id="sizeDisplay"><?= isset($size) ? ucfirst($size) : 'Size' ?></div>
                    <div class="fw-bold" id="amountDisplay">P<?= isset($price) ? $price : '0' ?></div>
                </div>

                <div class="mb-5">
                    <input type="hidden" name="locker_id" value="<?= $locker; ?>" />
                    <input type="hidden" name="price" value="<?= $price; ?>" />
                    <label for="timeSelect" class="text-start text-light mb-2">Select a time</label>
                    <select name="hours" class="rounded p-2 w-100" id="timeSelect">
                        <option value="" disabled selected>Select time</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> Hour<?= $i > 1 ? 's' : '' ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="text-start text-light mb-2">Payment method</label>
                    <div class="fw-bold">GCash</div>
                    <input type="hidden" name="payment" value="GCash" />
                </div>

                <button type="submit" class="btn btn-dark border rounded-pill fs-3 w-100" id="payButton" disabled>PAY NOW</button>
            </form>
            <!--</div>-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            const basePrice = parseFloat("<?= isset($price) ? $price : '0' ?>");
            const amountDisplay = $('#amountDisplay');
            const payButton = $('#payButton');
            const currentTimeDisplay = $('#currentTime');
            const timeSelect = $('#timeSelect');
            
            function updateCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                const minutes = String(now.getMinutes()).padStart(2, '0');

                const ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12;

                const formattedTime = `${hours}:${minutes} ${ampm}`;
                currentTimeDisplay.text(formattedTime);
                
                const currentHour = now.getHours();
                const maxHours = Math.max(0, 20 - currentHour);

                timeSelect.find('option').each(function() {
                    const optionValue = parseInt($(this).val());
                    if (optionValue > maxHours) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            }

            setInterval(updateCurrentTime, 60000);

            updateCurrentTime();

            function updatePayButtonState() {
                const selectedHours = parseInt($('#timeSelect').val());
                const isTimeSelected = !isNaN(selectedHours);
                payButton.prop('disabled', !isTimeSelected);
            }

            $('#timeSelect').on('change', function() {
                const selectedHours = parseInt($(this).val());
                const totalPrice = (basePrice * selectedHours);
                amountDisplay.text(`P${totalPrice}`);

                updatePayButtonState();
            });

            payButton.on('click', function() {
                const selectedHours = parseInt($('#timeSelect').val());
                const totalPrice = (basePrice * selectedHours);

                window.location.href = "<?= ROOT ?>/kiosk/gcash";
            });
        });
    </script>

</body>

</html>
