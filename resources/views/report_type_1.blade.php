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
    </style>
</head>
<body>
    <div class="header">
        <h1>Отчет по заказу</h1>
        
        <!-- Оставляем $type, как было в вашем примере -->
        <p>{{ $type }}</p>
    </div>
    <div class="content">
        <!-- Ваши существующие данные -->
        <h2>Пленка - {{ $brand->title }}</h2>
        <h2>Категория тарифа: {{ $categ->title }}</h2>
        <h3>Информация о заказе:</h3>
        <p>Год выпуска модели: {{ $year }}</p>
        <p>Модель машины: {{ $model }}</p>
        <p>Марка: {{ $mark }}</p>
        <p>Комплектация: {{ $complect }}</p>
        
        <h3>Дополнительные услуги:</h3>
        <ul>
            @foreach($additional_services as $service)
                <li>{{ $loop->iteration }} - {{ $service->title }}.</li>
            @endforeach
        </ul>

        <!-- Новые добавленные данные -->
        <p>Имя заказчика: {{ $name }}</p>
        <p>Номер телефона: {{ $phone }}</p>
        <h3>хочу, чтобы со мной связались (@if ($want == "on")lf @else нет @endif)</h3>
    </div>
</body>
</html>
