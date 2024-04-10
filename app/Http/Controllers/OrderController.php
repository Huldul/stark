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

        // return $pdf->download('report.pdf'); // Сохраняем или отображаем PDF
        
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
        return redirect()->back();
    }
    public function send_responde(Request $request){
        
        $order = new Respond;
        $order->name = $request->name;
        $order->number = $request->number;
        $order->vacancy = $request->vacancy;
        $order->save();
        return redirect()->back();
    }
}
