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
    </style>
</head>
<body>
    <div class="header">
        <h1>Отчет по заказу</h1>
        <p>{{ $type }}</p>
    </div>
    <div class="content">
        <h2>Пленка - {{ $brand->title }}</h2>
        <h2>Выбранные элементы:</h2>
        <ul>
            @foreach($elements as $element)
                <li>{{ $element->title }}</li>
            @endforeach
        </ul>
        <h3>Информация о заказе:</h3>
        <p>Год выпуска модели: {{ $year }}</p>
        <p>Модель машины: {{ $model }}</p>
        <p>Марка: {{ $mark }}</p>
        <p>Комплектация: {{ $complect }}</p>
        
        <h3>Дополнительные услуги:</h3>
        <ul>
            
            @foreach($additional_services as $service)
                <li>{{ $loop->iteration }} - {{ $service->title }} руб.</li>
            @endforeach
        </ul>

        <p>Имя заказчика: {{ $name }}</p>
        <p>Номер телефона: {{ $phone }}</p>
        <h3>хочу, чтобы со мной связались (@if ($want == "on") да @else нет @endif)</h3>
    </div>
</body>
</html>
