<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: "Times New Roman", Times, serif;
            font-size: 17px;
        }

        .justified {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .letter-content-wrapper {
            margin: 5px 10px 20px 10px;
            padding: 10px;
        }

        header.header {
            border-bottom: 2px solid black;
        }

        #date {
            margin-top: 10px;
        }

        div.iso-logo-container {
            position: relative;
            width: 90%;
            margin: auto;
            height: 80px;
            display: flex;
            align-items: end;
            justify-content: center;
        }

        div.iso-logo-container #left-image {
            position: absolute;
            top: -45px;
            left: 30px;
            width: 80px;
        }

        div.iso-logo-container #right-image {
            position: absolute;
            top: -45px;
            right: 30px;
            width: 80px;
        }

        .footer-div {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="letter-content-wrapper">
        <header class="header">
            <div align="center" class="logo justified">
                <img src="assets/static/logo.png" width="120">
            </div>
            <div align="center" class="justified">
                <h3>JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</h3>
            </div>
            <div align="center" class="justified">
                <p class="justified">P.O. BOX 62000-00200, CITY SQUARE, NAIROBI, KENYA.<br>TELEPHONE: (067)
                    52711/52181-4. FAX: 52164, THIKA</p>
            </div>
        </header>
        <main>
            <section id="date">
                <div>
                    {{ date_format(date_create($application->date_replied), 'jS-M-Y') }}
                </div>
            </section>
            <div>
                <h3 style="text-decoration: underline">APPLICATION RESPONSE</h3>
            </div>
            <section id="letter-body">
                <div>
                    <h4 id="salutation">Dear {{ $application->attachee->first_name }}</h4>
                    <div id="main-body">
                        Your acceptance to the attachment position ({{ $application->advert->title }}) advert reference:
                        {{ $application->advert->reference_number }} has been revoked due to reason(s) stated
                        below.<br><br>

                        <div>
                            <p>{{ $reasons }}</p>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
    <footer>
        <div align="center" class="footer-div">
            <div class="iso-logo-container">
                <img src="assets/static/iso-9001.jpg" id="left-image">
                <img src="assets/static/iso14001.png" alt="" id="right-image">
                <div>
                    <p align="center">JKUAT is ISO 9001:2015 and ISO 14001:2015 Certified<br>
                        Setting Trends in Higher Education, Research, Innovation and Entrepreneurship</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
