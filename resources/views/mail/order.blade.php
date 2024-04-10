@if (isset($data['categ']))
<!DOCTYPE html>
<html>
<head>
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
        
        <!-- Оставляем $data->type, как было в вашем примере -->
        <p>{{ $data['type'] }}</p>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Марка</td>
                <td>{{ $data['mark'] }}</td>
            </tr>
            <tr>
                <td>Модель машины</td>
                <td>{{ $data['model'] }}</td>
            </tr>
            <tr>
                <td>Год выпуска модели</td>
                <td>{{ $data['year'] }}</td>
            </tr>
            <tr>
                <td>Комплектация</td>
                <td>{{ $data['complect'] }}</td>
            </tr>
            <tr>
                <td>Категория тарифа</td>
                <td>{{ $data['categ']->title }}</td>
            </tr>
            <tr>
                <td>Пленка</td>
                <td>{{ $data['brand']->title }}</td>
            </tr>
            <!-- Дополнительные услуги -->
            <tr>
                <td colspan="2"><h3>Дополнительные услуги:</h3></td>
            </tr>
            @if (isset($data['additional_services']))
            @foreach($data['additional_services'] as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->title }}</td>
                </tr>
            @endforeach
            @endif
            <!-- Новые добавленные данные -->
            <tr>
                <td>Имя заказчика</td>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td>Номер телефона</td>
                <td>{{ $data['phone'] }}</td>
            </tr>
            <tr>
                <td>Хочу, чтобы со мной связались</td>
                <td>@if ($data['want'] == "on") Да @else Нет @endif</td>
            </tr>
        </table>
    </div>
</body>
</html>

@else
<!DOCTYPE html>
<html>
<head>
    <title>Отчет по заказу 2</title>
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
        <p>{{ $data['type'] }}</p>
    </div>
    <div class="content">
    <table>
        <tr>
            <th>Параметр</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Марка</td>
            <td>{{ $data['mark'] }}</td>
        </tr>
        <tr>
            <td>Модель машины</td>
            <td>{{ $data['model'] }}</td>
        </tr>
        <tr>
            <td>Год выпуска модели</td>
            <td>{{ $data['year'] }}</td>
        </tr>
        <tr>
            <td>Комплектация</td>
            <td>{{ $data['complect'] }}</td>
        </tr>
        <tr>
            <td>Выбранные элементы</td>
            <td>
                <ul>@if (isset($data['elements']))
                    @foreach($data['elements'] as $element)
                    <li>{{ $element->title }}</li>
                @endforeach
                @endif
                   
                </ul>
            </td>
        </tr>
        <tr>
            <td>Пленка</td>
            <td>{{ $data['brand']->title }}</td>
        </tr>
        <tr>
            <td>Дополнительные услуги</td>
            <td>
                <ul>
                    @if (isset($data['additional_services']))
                    @foreach($data['additional_services'] as $data->service)
                        <li>{{ $data->loop->iteration }} - {{ $data->service->title }} руб.</li>
                    @endforeach
                    @endif
                </ul>
            </td>
        </tr>
        <tr>
            <td>Имя заказчика</td>
            <td>{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td>{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <td>Хочу, чтобы со мной связались</td>
            <td>@if ($data['want'] == "on") да @else нет @endif</td>
        </tr>
    </table>
    </div>
</body>
</html>

@endif