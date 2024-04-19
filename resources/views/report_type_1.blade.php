<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет по заказу 1</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: 400;
            src: url({{ storage_path('fonts/DejaVuSans.ttf') }}) format('truetype');
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Отчет по заказу</h1>
        
        <!-- Оставляем $type, как было в вашем примере -->
        <p>{{ $type }}</p>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Марка</td>
                <td>{{ $mark }}</td>
            </tr>
            <tr>
                <td>Модель машины</td>
                <td>{{ $model }}</td>
            </tr>
            <tr>
                <td>Год выпуска модели</td>
                <td>{{ $year }}</td>
            </tr>
            <tr>
                <td>Комплектация</td>
                <td>{{ $complect }}</td>
            </tr>
            <tr>
                <td>Категория тарифа</td>
                <td>{{ $categ->title }}</td>
            </tr>
            <tr>
                <td>Пленка</td>
                <td>{{ $brand->title }}</td>
            </tr>
            <!-- Дополнительные услуги -->
            <tr>
                <td colspan="2"><h3>Дополнительные услуги:</h3></td>
            </tr>
            @foreach($additional_services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->title }}</td>
                </tr>
            @endforeach
            <!-- Новые добавленные данные -->
            <tr>
                <td>Имя заказчика</td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>Номер телефона</td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td>Хочу, чтобы со мной связались</td>
                <td>@if ($want == "on") Да @else Нет @endif</td>
            </tr>
        </table>
    </div>
</body>
</html>
