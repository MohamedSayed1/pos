<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>فاتوره</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
            direction: rtl;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        th {
            text-align: right;
        }

        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px dotted #ddd;
        }

        td, th {
            padding: 7px 0;
        }

        table {
            width: 100%;
            border-bottom: 2px solid;
            clear: both;
        }

        tfoot tr th:first-child {
            text-align: left;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        small {
            font-size: 11px;
        }

        @media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td, th {
                padding: 5px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 0;
            }

            body {
                margin: 0.5cm;
                margin-bottom: 1.6cm;
            }
        }

        .row .left {
            width: 50%;
            float: right;
        }

        .row .right {
            width: 50%;
            float: right;
            text-align: end;
        }
    </style>
</head>
<body>

<div style="max-width:400px;margin:0 auto">
    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="#" class="btn btn-info" onClick="javascript:window.close('','_parent','');"><i class="fa fa-arrow-left"></i>غلق</a></td>
                <td>
                    <button onclick="window.print();" class="btn btn-primary"><i class="fa fa-print"></i> طباعه</button>
                </td>
            </tr>
        </table>
        <br>
    </div>
    <div id="receipt-data">
        <div class="centered">
            <!--img src="" height="42" width="42" style="margin:10px 0;filter: brightness(0);"-->
            <h2>مكتبه الصحابه</h2>
            <p>رقم الفاتوره
                <br>{{$getTotal->transaction_id}}
            </p>
        </div>
        <table class="table">
            <thead>
            <tr class="row">
                <th>الصنف</th>
                <th>العدد</th>
                <th>سعر</th>
                <th style="text-align:end;">الاجمالي</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td>{{$bill->getProduct->name}}</td>
                    <td>{{$bill->quantity}}</td>
                    <td>{{$bill->paid}}</td>
                    <td style="text-align:end;">{{$bill->quantity * $bill->paid}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
            <tr style="background-color:#ddd;">
                <td style="padding: 5px;width:50%">الاجمالي</td>
                <td style="padding: 5px;width:50%;text-align:end;"> {{$getTotal->total}}</td>
            </tr>

            <td class="centered" colspan="3">شكرا للتسوق معنا. ارجوك عد مجددا</td>

            </tbody>
        </table>
        <div class="centered" style="margin:30px 0 50px">
            <small>تم انشاء الفاتورة بواسطة</small>
        </div>
    </div>
</div>

<script type="text/javascript">
    function auto_print() {
        window.print()
    }

    setTimeout(auto_print, 1000);
</script>

</body>
</html>
