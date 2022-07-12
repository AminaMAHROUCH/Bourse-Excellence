<!DOCTYPE html>
<html lang="en" dir="rtl">

<head id="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>قائمة المستفدين</title>
    <style>
        .titre {
            text-align: center;
        }

        .img1 {
            width: 185px;
            padding-right: 15px;
        }

        button,
        .link {
            background: green;
            border-radius: 5px;
            padding: 7px;
            margin: 11px;
            /* float: left; */
            color: white;
            font-weight: bold;
        }

        page[size="landscape"] {
            background: white;
            /*width: 21cm;*/
            /*height: 29.7cm;*/
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);

        }

        .rowtd {
            border: 1px solid;
            padding: 10px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            body,
            page[size="landscape"] {
                margin: 0;
                box-shadow: 0;
            }

            #printSection,
            #printSection * {
                visibility: visible;
            }
           

            #printSection {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
            }
            


        }
        @print { 
	@page :footer { 
		display: none !important;
	} 

	@page :header { 
		display: none !important;
	} 
} 

    </style>
</head>

<body style="background-color: grey;">
    <page size="landscape">
        <div>
            <button id="btnPrint" class="btn btn-danger text-white">Imprimer</button>
            <a class="link" href="{{url('boursier/finance')}}"
                style="float: left; background: red !important;">Annuler</a>
        </div>

        <hr />

        <div id="printSection">
            <h5 class="titre">بسم الله الرحمان الرحيم</h5>
            <br><br>
            <img src="{{ asset('asset/files/img/lf.png')}}" class="img1">
            <br>
            <br>
            <h3 class="titre">قائمة رقم {{$num_panier}} بأسماء الطلبة المستحقين لمنحة التفوق-
                الفوج{{$panier->promotion}} برسم سنة {{ $panier->anne_universitaire}}</h3>
            <table style="padding: 10px;  width: 100%;">
                <thead>

                    <tr style="background-color: #DCDCDC; border: 1px solid;">
                        <th style="  padding: 15px; text-align: center; border: 1px solid;">الرقم الترتيبي</th>
                        <th style="  padding: 15px; text-align: center; border: 1px solid;">ر،ب،ت</th>
                        <th style="  padding: 15px; text-align: center; border: 1px solid;">الإسم الكامل باللغة العربية
                        </th>
                        <th style="  padding: 15px; text-align: center; border: 1px solid;">الإإسم الكامل باللغة
                            الفرنسية</th>
                        <th style="  padding: 15px; text-align: center; border: 1px solid;">سنة الأستحقاق</th>
                        <th style="width: 120px; padding: 15px; text-align: center; border: 1px solid;">الحساب
                            البنكي(24رقم)</th>
                        <th style=" padding: 15px; text-align: center; border: 1px solid;">مبلغ المنحة</th>
                        <th style=" padding: 15px; text-align: center; border: 1px solid;">الجهة</th>
                        <th style=" padding: 15px; text-align: center; border: 1px solid;">الإقليم</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach ($datapdf as $item)
                    <tr>
                        <td class="rowtd">{{ $i}}</td>
                        <td class="rowtd">{{ $item->cni }}</td>
                        <td class="rowtd">{{ $item->nom_prenom_ar }}</td>
                        <td class="rowtd">{{ $item->nom_prenom_fr }}</td>
                        <td class="rowtd">{{ $item->anne_universitaire }}</td>
                        <td class="rowtd">{{ $item->rib }}</td>
                        <td class="rowtd">{{ $item->montant }}</td>
                        <td class="rowtd">{{ $item->nom_region }}</td>
                        <td class="rowtd">{{ $item->nom_province }}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
            <table style="width: 50%; padding: 10px;">
                <tr>
                    <td class="rowtd">مجموع المستفيدين</td>
                    <td class="rowtd">{{ $countData }}</td>
                </tr>
                <tr>
                    <td class="rowtd">المبلغ الإجمالي</td>
                    <td class="rowtd">{{ $montant_global }}</td>
                </tr>
            </table>

        </div>
    </page>
<!--    <iframe src="bourse_excellence/resources/views/admin/pages/paiement/benificiareList.pdf" id="frame" width="400" height="400"></iframe><br>-->
<!--<button onclick="print()">Print PDF</button>-->
</body>

</html>
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>


<!--the script-->
<!--<script>-->
<!--    function print_() {-->
<!--        var frame = document.getElementById('frame');-->
<!--        frame.contentWindow.focus();-->
<!--        frame.contentWindow.print();-->
<!--    }-->
<!--</script>-->
<script>
    document.getElementById("btnPrint").onclick = function() {
  window.print();
  document.margin='none';
  document.getElementById('header').style.display = 'none';
}

</script>