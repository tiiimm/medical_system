<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Document Preview</title>
    <style>
        .page-with-bg {
            position: relative;
            z-index: 1;
        }

        .page-with-bg::before {
            content: "";
            position: absolute;
            top: 1in;
            width: 100%;
            height: 100%;
            background-image: url('{{ public_path("/assets/img/bg_health.jpg") }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: left;
            opacity: 1;
            z-index: -1;
        }
        body, html {
            margin: 0.1in !important;
            padding: 0.1in !important;
        }
        @font-face {
            font-family: 'ForteStd';
            src: url('{{ public_path("/assets/fonts/forte.otf") }}') format('opentype');
        }
        .page-break { page-break-after: always; }
        body {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
            margin-bottom: 0.1in;
        }
        span {
            font-size: 10px;
        }
        .header {
            text-align: center;
            line-height: 1.5;
            font-size: 10px;
        }
        .certificate-number {
            line-height: 1;
            font-size: 10px;
            margin-bottom: 10px;
        }
        .header img {
            width: 60px;
            position: absolute;
            top: 10px;
            left: -15px;
        }
        .label {
            width: 100px;
            font-weight: bold;
            vertical-align: top;
        }
        .content {
            text-align: justify;
        }
        .script-font {
            font-family: 'ForteStd', cursive;
            font-style: italic;
            font-weight: bold;
        }
        u {
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            height: 15px;
        }
        .no-border {
            border: 0px !important;
            padding: 0px !important;
            font-size: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="page-with-bg">
        <div class="header">
            <?php $image_path = '/assets/img/zppsu-logo.png'; ?>
            <img src="{{ public_path() . $image_path }}" alt="University Logo">
            <strong>Zamboanga Peninsula Polytechnic State University</strong><br>
            R.T. Lim Boulevard, Zamboanga City<br>
            Tel No. (062) 991-7756, VOIP# 1133 & 1134<br>
            Email: zppsu.healthservices@gmail.com<br>
            <strong class="script-font">Medical-Dental Health Services</strong><br>
            <?php $image_path = '/assets/img/medical-logo.jpg'; ?>
            <img src="{{ public_path() . $image_path }}" alt="Office Logo" style="left: 296px">
        </div>

        <hr style="margin: 10px -15px; border: 1px solid black;">

        <div class="certificate-number">
            <strong>ZPPSU-MDHS-HE-1</strong><br>
            <strong style="font-size: 8px;"> REVISION DATE: SEPT 2024 | REVISION STATUS: 1</strong>
        </div>

        <div class="title" style="text-align: center;font-size: 14px;"><strong><u>HEALTH EXAMINATION RECORD</u></strong></div>

        <div class="certificate">
            <div class="col-md-6">
                <p>
                    <strong>DATE:</strong>
                    <span style="border-bottom: 1px solid black;">
                        {{ now()->toFormattedDateString() }}
                    </span>
                </p>
                <p>
                    <strong>NAME:</strong>
                    <span style="border-bottom: 1px solid black;">
                        <b><i>{{ $user->profile->medical_profile->sex == 'Female' &&  $user->profile->civil_status == 'Single'?'Ms. ':($user->profile->medical_profile->sex == 'Female'?'Mrs. ':'Mr. ') }}</i></b>{{ $user->name }}
                    </span>
                </p>
                <?php $civilStatus = $user->profile->civil_status; ?>
                <p><strong>CIVIL STATUS:</strong>
                    <label style="margin: 0 5px;">
                        <input type="checkbox" style="margin-bottom: -8px; transform: scale(0.75);" {{ $civilStatus === 'Single' ? 'checked' : '' }}> SINGLE
                    </label>
                    <label style="margin: 0 5px;">
                        <input type="checkbox" style="margin-bottom: -8px; transform: scale(0.75);" {{ $civilStatus === 'Married' ? 'checked' : '' }}> MARRIED
                    </label>
                    <label style="margin: 0 5px;">
                        <input type="checkbox" style="margin-bottom: -8px; transform: scale(0.75);" {{ $civilStatus === 'Widow/er' ? 'checked' : '' }}> WIDOW/ER
                    </label>
                </p>
                <p>
                    <strong>COURSE &amp; YEAR LEVEL:</strong>
                    <span style="border-bottom: 1px solid black;">
                        {{ $user->student_information->program->abbreviation }} {{ $user->student_information->program->majors->count() == 1?'':$user->student_information->major->abbreviation}} {{ $user->student_information->year_level }}
                    </span>
                </p>
                <p>
                    <strong>COLLEGE:</strong>
                    <span style="border-bottom: 1px solid black;">
                        {{ $user->student_information->program->college->name }}
                    </span>
                </p>
                <p>
                    <strong>CONTACT NUMBER:</strong>
                    <span style="border-bottom: 1px solid black;">
                        {{ $user->profile->contact_number }}
                    </span>
                </p>
                <p><strong>VITAL SIGNS:</strong></p>

                <p style="text-align: center;">
                    <span style="display: inline-block; width: 30%;"><strong>T:</strong><u>________</u></span>
                    <span style="display: inline-block; width: 30%;"><strong>PR:</strong><u>________</u></span>
                    <span style="display: inline-block; width: 30%;"><strong>RR:</strong><u>________</u></span><br>
                    <span style="display: inline-block; width: 30%;"><strong>SPO2:</strong><u>________</u></span>
                    <span style="display: inline-block; width: 30%;"><strong>BP:</strong><u>________</u></span>
                </p>

                <p>
                    <strong>SKIN: _________________________</strong><br>
                    <strong>HEENT: _________________________</strong>
                </p>
                <p></p>
                <p>
                    <strong><i>CHEST/LUNGS:</i></strong><br>
                    <strong>CHEST X-RAY RESULT -  </strong><br>
                    <?php $result = json_decode($user->medical_results()->latest()->first()->test_results, true)['XRay'] ?>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">{{ $result['result'] === 'Normal' ? '◉' : '○' }}</span><strong>NORMAL</strong>
                    </label><br>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">{{ $result['result'] != 'Normal' ? '◉' : '○' }}</span><strong>WITH FINDINGS: <u>{{ $result['remarks'] }}</u></strong>
                    </label>
                </p>
                <p>
                    <strong>CARDIOVASCULAR SYSTEM:  ________________________</strong><br><br>
                    <strong>___________________________________________________</strong>
                </p>
                <p></p>
                <p>
                    <strong><i>ABDOMEN:</i></strong><br>
                    <strong>FECALYSIS RESULT -  </strong><br>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">○</span><strong>POSITIVE: <u>{{ $result['remarks'] }}</u></strong>
                    </label><br>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">○</span><strong>NEGATIVE FOR PARASITIC INFECTION</strong>
                    </label>
                </p>
                <p>
                    <strong><i>GENITOURINARY SYSTEM:  __________________________</i></strong>
                </p>
                <p>
                    <strong><i>EXTREMITIES: ______________________________________</i></strong>
                </p>
                <p>
                    <strong><i>NERVOUS SYSTEM: _________________________________</i></strong>
                </p>
                <p>
                    <strong><i>COMPLETE BLOOD COUNT:  __________________________</i></strong>
                </p>
                <p>
                    <strong><i>DRUG TEST:</i></strong><br>
                    <?php $result = json_decode($user->medical_results()->latest()->first()->test_results, true)['Drug Test'] ?>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">{{ $result['result'] === 'Positive' ? '◉' : '○' }}</span><strong>POSITIVE: <u>{{ $result['abnormality']??'' }}</u></strong>
                    </label><br>
                    <label style="margin: 0 10px 0 5px;">
                        <span style="font-family: DejaVu Sans;">{{ $result['result'] === 'Negative' ? '◉' : '○' }}</span><strong>NEGATIVE</strong>
                    </label>
                </p>
                <p>
                    <strong><i>ISHIHARA TEST RESULT:  ____________________________</i></strong>
                </p>
                <p>
                    <strong><i>HEPATITIS B SCREENING:</i></strong><br>
                    <strong>        REACTIVE</strong><br>
                    <strong>        NON-REACTIVE</strong>
                </p>
                <p>
                    <strong><i>BLOOD TYPE AND RH: _______________________________</i></strong>
                </p>
                <p>
                    <?php $allergies = $user->profile->medical_profile->allergies ?>
                    <strong><i>ALLERGY/IES:</i></strong>
                    <strong><u>
                        @foreach($allergies as $allergy)
                            {{ $allergy->allergy_name }},
                        @endforeach
                    </u></strong>
                </p>
                <p>
                    <strong><i>VACCINATION:</i> COVID-19: ____________ OTHERS: _______</strong>
                </p>
                <p>
                    <strong><i>OTHERS/RECOMMENDATION:</i></strong><br><br>
                    <strong>___________________________________________________</strong><br><br>
                    <strong>___________________________________________________</strong>
                </p>
                <p>
                    <strong>STUDENT'S SIGNATURE: _____________________________</strong>
                </p>
                <p>
                    <strong>MEDICAL PERSONNEL'S SIGNATURE:</strong><br>
                    <strong>___________________________________________________</strong>
                </p>
            </div>
        </div>
    </div>

    <div class="page-break"></div>
    
    <div>
        <div class="title" style="text-align: center;font-size: 14px;"><strong><u>DENTAL HEALTH RECORD</u></strong></div>
        <br><br>
        <div class="certificate">
            <table>
                <tbody>
                    <tr>
                        <td class="no-border">CONDITION</td>
                        @foreach(range(1, 16) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="no-border">TREATMENT<br>NEEDS</td>
                        @foreach(range(1, 16) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <br><br>
            <?php $image_path = '/assets/img/teeth.png'; ?>
            <img src="{{ public_path() . $image_path }}" style="width:100%;" alt="Teeth">
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td class="no-border">CONDITION</td>
                        @foreach(range(1, 16) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td class="no-border">TREATMENT<br>NEEDS</td>
                        @foreach(range(1, 16) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <br><br>
            <?php $image_path = '/assets/img/legend.png'; ?>
            <img src="{{ public_path() . $image_path }}" style="width:100%;" alt="legend">
            <br><br><br>
            <table>
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>TREATMENT<br>RENDERED</th>
                        <th>TOOTH NUMBER</th>
                        <th>REMARKS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach(range(1, 4) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(range(1, 4) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(range(1, 4) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(range(1, 4) as $x)
                            <td></td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <br><br><br><br>
            <div class="title" style="text-align: center;font-size: 12px;"><strong>________________________</strong></div>
            <div class="title" style="text-align: center;font-size: 12px;"><strong>STUDENT'S SIGNATURE</strong></div>
            <br><br><br><br>
            <div class="title" style="text-align: center;font-size: 12px;"><strong><u>ZHADIMAR Y. HADJIRUL, DMD</u></strong></div>
            <div class="title" style="text-align: center;font-size: 12px;"><strong>UNIVERSITY DENTIST</strong></div>
        </div>
    </div>
</body>
</html>
