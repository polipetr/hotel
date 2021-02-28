<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Фактура - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        td {
            font-family: "DejaVu Sans", sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
            width: 500px;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td style="width: 40%;">
                <h3>{{$name}}</h3>
       

            </td>
            <td style="width: 40%;">
                <h3> {{$address}}</h3>
            </td>
        </tr>
    </table>
</div>


<br/>

<div class="invoice">
    <h3>Фактрура #123</h3>
    <table class="table-bordered" style="width: 40%;">
    <thead>
        <tr>
        <th>Стая</th>
        <th>Дни престои</th>
        <th>Цена</th>
        </tr>
    </thead>
  <tbody>
        <tr>
        <td>{{$type}}</td>
        <td>{{$number}}</td>
        <td>{{$price}}</td>
        </tr>
    </tbody>
</table>

</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
         
        </tr>

    </table>
</div>
</body>
</html>