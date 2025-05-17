<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>{{ $documentNumber ?? 'Document Preview' }}</title>
    <style>
        @font-face {
            font-family: 'ForteStd';
            src: url('{{ public_path("/assets/fonts/forte.otf") }}') format('opentype');
        }
        .page-break { page-break-after: always; }
        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
            margin-top: 40px;
            margin-botton: 10px;
        }
        span {
            font-size: 10px;
        }
        .signatory-group .cf-group {
            margin-bottom: 20px;
        }

        .signatory-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .cf-label {
            font-weight: bold;
            width: 10px;
            margin-right: 50px;
        }

        .cf-row {
            width: 100%;
            margin-left: 40px;
        }

        .signatory-row {
            width: 100%;
        }

        .cf-box {
            display: inline-block;
            margin-right: 50px;
            margin-top: 50px;
            vertical-align: top;
            padding-top: 5px;
        }

        .signatory-box {
            display: inline-block;
            flex: 1 1 280px;
            max-width: 280px;
            margin-right: 50px;
            margin-top: 50px;
            vertical-align: top;
            padding-top: 5px;
        }

        .ql-align-center { text-align: center; }
        .ql-align-justify { text-align: justify; }
        .ql-align-right { text-align: right; }
        .ql-align-left { text-align: left; }

        ul {
            list-style-type: disc !important;
            padding-left: 20px !important;
            margin-left: 10px;
        }

        ol {
            list-style-type: decimal !important;
            padding-left: 20px !important;
            margin-left: 10px;
        }

        li {
            margin-bottom: 4px;
        }

        li::marker {
            content: "• ";
        }

        p {
            text-align: left;
        }
        .header {
            text-align: center;
            line-height: 1.5;
            font-size: 12px;
        }
        .certificate-number {
            line-height: 1;
            font-size: 12px;
        }
        .header img {
            width: 100px;
            position: absolute;
            top: 40px;
            left: 40px;
        }
        .memo-info {
            margin-top: 30px;
        }
        .memo-info table {
            width: 100%;
            border-spacing: 0;
        }
        .memo-info td {
            padding: 5px 0;
        }
        .label {
            width: 100px;
            font-weight: bold;
            vertical-align: top;
        }
        hr {
            border: 1px solid black;
            margin: 20px 0;
        }
        .content {
            text-align: justify;
        }
        .signatory {
            margin-top: 40px;
        }

        .script-font {
            font-family: 'ForteStd', cursive;
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <?php $image_path = '/assets/img/zppsu-logo.png'; ?>
        <img src="{{ public_path() . $image_path }}" alt="University Logo">
        <strong>Zamboanga Peninsula Polytechnic State University</strong><br>
        R.T. Lim Boulevard, Zamboanga City<br>
        Tel No. (062) 991-7756, VOIP# 1133 & 1134<br>
        Email: zppsu.healthservices@gmail.com<br>
        <strong class="script-font">Medical-Dental Health Services</strong><br>
        <?php $image_path = '/assets/img/medical-logo.jpg'; ?>
        <img src="{{ public_path() . $image_path }}" alt="Office Logo" style="left: 560px">
    </div>

    <hr style="margin: 10px 0;">

    <div class="certificate-number">
        <strong>ZPPSU-MDHS-CERT-001</strong><br>
        <strong style="font-size: 8px;"> REVISION DATE: SEPT 2024 | REVISION STATUS: 1</strong>
    </div>

    <div class="title" style="text-align: center;font-size: 14px;"><strong><u>MEDICAL-DENTAL CERTIFICATE</u></strong></div>
    <div class="certificate">
        <br>
        <div style="text-align: right;">
            <span style="display: inline-block; width: 150px; text-align: center;">
                {{ $dateReleased }}
            </span>
            <br>
            <span style="display: inline-block; border-top: 1px solid black; width: 150px; text-align: center;">
                DATE
            </span>
        </div>
        <br><br>
        <strong>TO WHOM IT MAY CONCERN: </strong>
        <!-- QR Code with adjusted margins -->
        <div class="qr-code" style="text-align: center;">
            <?php $qr_path = $qrCodeUrl; ?>
            <img src="data:image/png;base64,{{ $qr_path }}" alt="QR Code" width="150">
        </div>
        <p>This is to certify that <strong><u>{{ $studentName }}</u></strong>, _________ years old, a <strong>{{ $yearLevel }} year</strong> {{ $course }} student of this university
            has been seen and examined by the undersigned.<br><br><br>
            <strong>PURPOSE: <u>FOR ENROLLMENT SY 2024-2025</u>.</strong><br><br>
            <strong>REMARKS: <u>FIT FOR ENROLLMENT</u>.</strong><br><br><br>
            <br><br>
        </p>
        <div style="text-align: right;">
            <strong>NAME AND SIGNATURE OF THE UNIVERSITY PHYSICIAN</strong>
            <br><br><br><br><br>
            <strong>NAME AND SIGNATURE OF THE UNIVERSITY DENTIST</strong>
        </div>
    </div>
</body>
</html>
