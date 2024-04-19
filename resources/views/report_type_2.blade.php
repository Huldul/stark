<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет по заказу 2</title>
    <style>
        /* @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: 400;
            src: url({{ storage_path('fonts/DejaVuSans.ttf') }}) format('truetype');
        } */
        body {
            font-family: unset;
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
            <td>Выбранные элементы</td>
            <td>
                <ul>
                    @foreach($elements as $element)
                        <li>{{ $element->title }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Пленка</td>
            <td>{{ $brand->title }}</td>
        </tr>
        <tr>
            <td>Дополнительные услуги</td>
            <td>
                <ul>
                    @foreach($additional_services as $service)
                        <li>{{ $loop->iteration }} - {{ $service->title }} руб.</li>
                    @endforeach
                </ul>
            </td>
        </tr>
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
            <td>@if ($want == "on") да @else нет @endif</td>
        </tr>
    </table>
    </div>
</body>
</html>
