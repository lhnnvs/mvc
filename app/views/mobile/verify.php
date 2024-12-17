<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIN Entry</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .digit {
            width: 3rem;
            font-size: 4rem;
        }

        .col-4 {
            display: flex;
            justify-content: center;
        }

        .keypad button {
            height: 4rem;
            width: 8rem;
            margin: 0.5rem;
            font-size: 2rem;
            font-weight: bold;
            border-radius: 3rem;
        }
    </style>
</head>

<body class="d-flex flex-column bg-dark vh-100">
    <div class="container d-flex flex-column flex-fill text-white fs-4 pt-4 px-4" style="max-width: 480px; background-image: url('../assets/images/bg.jpg'); background-size: cover;">
        <div class="d-flex justify-content-between">
            <a href="<?= ROOT ?>/mobile/home" class="text-white"><i class="bi bi-chevron-left"></i></a>
            <div></div>
        </div>
        <div class="d-flex flex-fill align-items-center justify-content-center text-center">
            <div class="d-flex flex-column align-items-center">
                <div>Enter 6-digit PIN:</div>
                <div class="d-flex mb-4">
                    <div class="d-flex ms-5" id="pinDisplay">
                        <div class="digit" id="digit1">_</div>
                        <div class="digit" id="digit2">_</div>
                        <div class="digit" id="digit3">_</div>
                        <div class="digit" id="digit4">_</div>
                        <div class="digit" id="digit5">_</div>
                        <div class="digit" id="digit6">_</div>
                    </div>
                    <button class="bg-transparent border-0 me-4 text-light" id="toggleButton" onclick="toggleShow()">
                        <i class="bi bi-eye-fill" id="eyeIcon"></i>
                    </button>
                </div>
                <button class="btn btn-light fw-bold fs-4 w-75" id="confirmButton" onclick="window.location.href='<?= ROOT ?>/mobile/terminate'">Confirm</button>
            </div>
        </div>
    </div>
    <div class="d-flex flex-fill">
        <div class="container d-flex align-items-center bg-white px-5 px-4" style="max-width: 480px;">
            <div class="keypad d-flex flex-wrap justify-content-center mx-auto" style="max-width:480px;">
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(1)">1</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(2)">2</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(3)">3</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(4)">4</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(5)">5</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(6)">6</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(7)">7</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(8)">8</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(9)">9</button></div>
                <div class="col-4"></div>
                <div class="col-4"><button class="btn btn-light" onclick="addDigit(0)">0</button></div>
                <div class="col-4"><button class="btn btn-light" onclick="removeDigit()">&#x232B;</button></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let pin = "";
        let isShowing = false;

        function updateDisplay() {
            for (let i = 1; i <= 6; i++) {
                document.getElementById(`digit${i}`).innerText = isShowing ? (pin[i - 1] || "_") : (pin[i - 1] ? "*" : "_");
            }
        }

        function toggleShow() {
            isShowing = !isShowing;
            document.getElementById('eyeIcon').className = isShowing ? 'bi bi-eye-slash-fill' : 'bi bi-eye-fill';
            updateDisplay();
        }

        function addDigit(digit) {
            if (pin.length < 6) {
                pin += digit;
                updateDisplay();
            }
        }

        function removeDigit() {
            pin = pin.slice(0, -1);
            updateDisplay();
        }

        function confirmPin() {
            if (pin.length === 6) {
                alert("PIN confirmed!");
                window.location.href = "<?= ROOT ?>/mobile/terminate";
            } else {
                alert("Please enter a 6-digit PIN.");
            }
        }

        document.getElementById('confirmButton').onclick = confirmPin;
    </script>
</body>

</html>