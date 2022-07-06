<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=WorkSans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/files/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/style.css') }}">
    <script src="{{ asset('asset/files/js/modernizr-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/files/css/style.css') }}">
    <script src="{{ asset('asset/files/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9itQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />

    <title>Mail</title>
    <style type="text/css">
        * {
            font-family: 'DroidArabicKufiRegular';
        }

        body {
            background-color: #bea6a6ab;
            margin: 0px;
            font-family: 'Ubuntu', sans-serif;
            background-size: 100% 110%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        a {
            margin: 0;
            padding: 0;
        }

        footer {
            background-color: #610505 !important;
            color: white;
            padding-top: 20px !important;
            padding-bottom: 20px !important;


        }

        textarea {
            background-color: rgb(232, 232, 232) !important;
            border-color: rgb(232, 232, 232) !important;
            border-style: rgb(116, 116, 116) !important;
            color: rgb(116, 116, 116) !important;
        }

        textarea:focus {
            background-color: rgb(226, 226, 226) !important;
            border-color: red !important;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 col-sm-12 text-center">
                <img style="width:25%" src="https://zupimages.net/up/21/27/osna.png">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="margin-right:12% ; color:black  ; font-weight:bold"><i
                    class="fas fa-table"></i>
                <label class="text-right"> التاريخ : </label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12" style="margin-right:12% ; color:black ; font-weight:bold"><i
                    class="fas fa-pen"></i>
                <label class="text-right"> الموضوع :</label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <input name="" id="" cols="25" rows="1" class="w-75 border-0"
                    style="color:black ; font-size:17px ; padding-right:15px "
                    value=" {{ $template_data['title'] }} " readonly />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 mr-4 mt-2" style="margin-right:12% ;  color:black  ; font-weight:bold"><i
                    class="fas fa-pen"></i>
                <label class="text-right"> مضمون الإعلان :</label>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12 col-sm-12 text-center">
                <textarea name="" id="" cols="25" rows="8" class="w-75 border-0"
                    style="color:black ; font-size:17px ; padding-right:15px " readonly></textarea>
            </div>
        </div>

    </div>

    <footer class=" fixed-bottom">
        <div class="container" style="position:relative; right:70px">
            <div class="row" style="margin-left : 0% !important ; margin-right : 0% !important">
                <div class="col" style="font-size: 13px !important"> <i class="fas fa-map-marker-alt text-orange"></i>
                    فيلا رقم1 ٬ شارع محمد السادس باب زعير - الرباط
                </div>
                <div class="col" style="margin-right: 20px;"><i class="fas fa-envelope text-orange"></i> <a
                        href="mailto:admin@admin.ma" class="text-white">contact@alqayim.ma</a> </div>
                <div class="col" style="font-size: 13px !important"><a href="https://alqayyim.ma/contactus"
                        class="text-white" style="ma"><i class="fas fa-link text-orange"></i> مؤسسة محمد السادس
                        للنهوض بالأعمال الإجتماعية للقيمين الدينيين</a>
                </div>
                <div class="col" style="margin-right: 30px !important;"><i class="fas fa-phone text-orange"></i>
                    0537666418 <br />
                    <i class="fas fa-phone text-orange"></i> 0537635200<br />
                    <i class="fas fa-fax text-orange"></i> 0537635220
                </div>
            </div>
        </div>

    </footer>



</body>

</html>
