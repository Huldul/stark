<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use App\Models\Element;
use App\Models\Film;
use App\Models\TarifCategory;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Application;
use App\Models\Respond;
use App\Mail\OrderMail;
use Mail;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

// Остальные необходимые импорты


    public function send_order(Request $request)
    {
        $brand = Film::find($request->type_brand);
        $additional_services = AdditionalService::findMany($request->additional_services);
        $type = $this->getTypeCar($request->type_car); // Вынесли логику в отдельный метод
        if ($request->type_solution == "solution-1") {
            $categ = TarifCategory::find($request->type_package);
            $data = [
                "brand" => $brand,
                "categ" => $categ,
                "type" => $type,
                "additional_services" => $additional_services,
                "year"=>$request->year,
                "model"=>$request->model,
                "mark"=>$request->mark,
                "complect"=>$request->complect,
                "name"=>$request->name,
                "phone"=>$request->phone,
                "want"=>$request->want,
            ];
            // dd($categ->title);
            $pdfFileName = 'orders/' . uniqid() . '_report.pdf';
            $pdfPath = public_path('storage/' . $pdfFileName);

            // Сгенерировать PDF
            $pdf = PDF::loadView('report_type_1', $data);

            // Сохранить PDF в файловой системе
            Storage::disk('public')->put($pdfFileName, $pdf->output());

            // Добавить запись в модель Order
            $order = new Order;
            $order->name = $request->name;
            $order->number = $request->phone;
            $order->order = $pdfFileName; // Сохраняем только имя файла для упрощения доступа
            $order->save();

            // Возвращаем PDF пользователю



        } else {
            $elements = Element::findMany($request->elements);
            $data = [
                "brand" => $brand,
                "elements" => $elements,
                "type" => $type,
                "additional_services" => $additional_services,
                "year"=>$request->year,
                "model"=>$request->model,
                "mark"=>$request->mark,
                "complect"=>$request->complect,
                "name"=>$request->name,
                "phone"=>$request->phone,
                "want"=>$request->want,
            ];
            $pdfFileName = 'orders/' . uniqid() . '_report.pdf';
            $pdfPath = public_path('storage/' . $pdfFileName);

            // Сгенерировать PDF
            $pdf = PDF::loadView('report_type_2', $data);

            // Сохранить PDF в файловой системе
            Storage::disk('public')->put($pdfFileName, $pdf->output());

            // Добавить запись в модель Order
            $order = new Order;
            $order->name = $request->name;
            $order->number = $request->phone;
            $order->order = $pdfFileName; // Сохраняем только имя файла для упрощения доступа
            $order->save();
            $pdf = PDF::loadView('report_type_2', $data); // Используйте второе представление

        }
        try {
            \Log::info('Sending email to: ' . setting('.email_get'));
            Mail::to(setting('.email_get'))->send(new OrderMail($data));
            $message = 'Заявка успешно отправленна и email уведомление отправлено.';
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
            $message = 'Заявка успешно отправленна.';
        }

        $response = Http::post('https://starkdetailing.bitrix24.kz/rest/4896/lkg7lqz3m08mabx8/crm.lead.add.json', [
            'FIELDS' => [
                'TITLE' => 'ЛИД официальный сайт Кнопка записаться',
                'NAME' => $request->name,
                'PHONE' => [
                    [
                        'VALUE' => $request->phone,
                        'VALUE_TYPE' => 'MOBILE'
                    ]
                ],
                // Добавьте другие поля, если требуется
            ],
            'CompanyLeadUfCrm1716622791' => $request->want,
        ]);

        if ($response->successful()) {
            \Log::info('Lead успешно создан в Bitrix');
        } else {
            \Log::error('Ошибка при создании лида в Bitrix: ' . $response->body());
        }
        return $pdf->download('report.pdf'); // Сохраняем или отображаем PDF

    }

    // Метод для определения типа автомобиля
    protected function getTypeCar($type_car)
    {
        switch ($type_car) {
            case 'car-1':
                return "кроссовер";
            case 'car-2':
                return "седан";
            case 'car-3':
                return "внедорожник";
            default:
                return null; // Или какое-то значение по умолчанию
        }
    }

    public function send_appl(Request $request){

        $order = new Application;
        $order->name = $request->name;
        $order->number = $request->number;
        $order->text = $request->text;
        $order->save();
        $response = Http::post('https://starkdetailing.bitrix24.kz/rest/4896/lkg7lqz3m08mabx8/crm.lead.add.json', [
            'FIELDS' => [
                'TITLE' => 'ЛИД официальный сайт Заявка',
                'NAME' => $request->name,
                'PHONE' => [
                    [
                        'VALUE' => $request->number,
                        'VALUE_TYPE' => 'MOBILE'
                    ]
                ],
                'TEXT' => $request->text,
                // Добавьте другие поля, если требуется
            ],
        ]);

        if ($response->successful()) {
            \Log::info('Lead успешно создан в Bitrix');
        } else {
            \Log::error('Ошибка при создании лида в Bitrix: ' . $response->body());
        }
        return redirect()->back()->with('success', "Спасибо! Ваша заявка успешно отправлена");
    }
    public function send_responde(Request $request){

        $order = new Respond;
        $order->name = $request->name;
        $order->number = $request->number;
        $order->vacancy = $request->vacancy;
        $order->save();
        return redirect()->back()->with('success', "Спасибо! Ваша заявка успешно отправлена");
    }
}
