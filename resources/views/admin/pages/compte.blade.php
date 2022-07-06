<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 22px;
            direction:rtl;
        }

        #left {
            float: left;
        }

        #right {
            float: right;
        }
    </style>
</head>

<body>
    <center>
        <div>
            <div>
                <form class="row" style="text-align:center;">
                    <div style="width: 40% !important; margin: auto; display:table;">
                        <img src="https://zupimages.net/up/21/27/osna.png" style="width: 150px" id="right">

                        <img src="https://zupimages.net/up/21/38/vsa5.png" style="width: 150px" id="left">

                    </div>
                    <br>
                    <br>
                    <br>
                    <div>
                        <div class="col-12" style="text-align: center;">
                            <p>إلى السيد(ة): {{ Auth::user()->name }}</p>
                            <p> الحاصل (ة) على منحة التفوق</p>
                            <p>الحامل(ة) للبطاقة الوطنية للتعريف رقم...</p>
                            <p> الوحدة الإدارية الإقليمية...
                            </p>
                            <br>
                        </div>
                        <div>
                            <label for="inputCity" style=" direction:rtl; text-align:justify">تتشرف مؤسسة محمد السادس للنهوض بالأعمال
                                الإجتماعية
                                للقيمين الدينيين بدعوتك للتوجه إلى إحدى وكالات البريد بنك من أجل فتح حساب بنكي باسمك
                                مجانا
                                ودون أي اقتطاع، ويتضمن هذا الحساب البنكي الذي تتحمل مصاريفه المؤسسة</label>
                            <ul>
                                <li style=" list-style-type:none;"> - حساب جاري </li>
                                <li style=" list-style-type:none;"> - بطاقة بنكية للسحب و الأداء
                                </li>
                            </ul>
                        </div>
                        <div style="text-align: initial;">
                            <label style="text-align: initial;">وسيمكنك هذا الحساب من الإستفادة من منحة التفوق التي
                                تقدمها المؤسسة</label>

                        </div>

                        <div class="col-12">
                            <div class="form-check" style="text-align: center;">
                                <img src="https://zupimages.net/up/21/39/m8y1.png" style="width: 155px;">
                            </div>
                        </div>
                        <br>
                        <div class="col-12" style="font-size:12px; text-align: center;">
                            العنوان : فيلا رقم 1 شارع محمد السادس . الرباط

                            </br>
                            الفاكس :0537635220 البريد الإلكتروني : الهاتف:0537635220
                            </br>
                            الموقع الإلكتروني: </div>
                    </div>


                </form>
            </div>
        </div>
</body>

</center>

</html>