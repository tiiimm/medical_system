<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Certificate</title>
    <style>
        @page {
            margin-top: 0.5in;
            margin-right: 1in;
            margin-bottom: 1in;
            margin-left: 1in;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1;
        }
        .certificate {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <?php $image_path = '/assets/img/zppsu-logo.png'; ?>
        <img src="{{ public_path() . $image_path }}" alt="Logo 1" width="60">
        <p>Republic of the Philippines<br>
            <strong>ZAMBOANGA PENINSULA POLYTECHNIC STATE UNIVERSITY</strong><br>
            Region IX, Western Mindanao<br>
            R.T. Lim Boulevard Baliwasan, Zamboanga City<br>
            <h1>MEDICAL CERTIFICATE</h1><br>
        </p>
        <!-- QR Code with adjusted margins -->
        <div class="qr-code">
            <?php $qr_path = $qrCodeUrl; ?>
            <img src="data:image/png;base64,{{ $qr_path }}" alt="QR Code" width="150">
        </div>
        <p>This is to certify that<br>
            <h2>{{ $studentName }}</h2><br>
            a <strong>{{ $yearLevel }} year</strong> {{ $course }} student of this university
            has undergone a medical examination on<br>
            <h3>{{ $dateReleased }}</h3><br>
            <br><br>
            _______________________<br>
            Authorized Medical Officer<br>
        </p>
    </div>
</body>
</html>
