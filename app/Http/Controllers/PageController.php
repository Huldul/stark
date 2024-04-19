<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Career;
use App\Models\Cartificate;
use Illuminate\Http\Request;
use App\Models\IndexPage;
use App\Models\Expiriance;
use App\Models\Partner;
use App\Models\Review;
use App\Models\FaqBlock;
use App\Models\Stock;
use App\Models\Task;
use App\Models\TarifCategory;
use App\Models\Tarif;
use App\Models\Worker;
use App\Models\Film;
use App\Models\AdditionalService;
use App\Models\Element;

class PageController extends Controller
{

    public function index()
    {
        $untrPage = IndexPage::firstOrFail();
        // $page = $this->translateCollection($untrPage ,app()->getLocale())->get();
        $page = $untrPage->translate(app()->getLocale());

        $untrTask = Task::All();
        $tasks = $this->translateCollection($untrTask ,app()->getLocale());
        $untrTar = TarifCategory::All();
        $categs = $this->translateCollection($untrTar ,app()->getLocale());
        $untrStock = Stock::All();
        $stocks = $this->translateCollection($untrStock ,app()->getLocale());
        

        $untrExp = Expiriance::All();
        $exps = $this->translateCollection($untrExp ,app()->getLocale());

        $pars = Partner::All();

        $untrRev = Review::All();
        $revs = $this->translateCollection($untrRev ,app()->getLocale());

        $untrFaq = FaqBlock::All();
        $faqs = $this->translateCollection($untrFaq ,app()->getLocale());

        $untrAdd = AdditionalService::All();
        $additional_services = $this->translateCollection($untrAdd ,app()->getLocale());

        $untrFilm = Film::All();
        $films = $this->translateCollection($untrFilm ,app()->getLocale());
        $untrEl = Element::All();
        $elements = $this->translateCollection($untrEl ,app()->getLocale());
        

        return view('index',[
            "page" => $page,
            "exps" => $exps,
            "pars" => $pars,
            "revs" => $revs,
            "faqs" => $faqs,
            "tasks" => $tasks,
            "categs" => $categs,
            "stocks" => $stocks,
            "additional_services" => $additional_services,
            "films" => $films,
            "elements" => $elements,
        ]);
    }
    public function tasks(){
        $untrTask = Task::paginate(12);
        $tasks = $this->translateCollection($untrTask ,app()->getLocale());

        return view('service',[
            "tasks" => $tasks,
        ]);
    }
    public function task_inner($locale, $slug){
        
        $untrTask = Task::Where('slug', $slug)->first();
        $task = $untrTask->translate(app()->getLocale());

        $untrTasks = Task::paginate(3);
        $tasks = $this->translateCollection($untrTasks ,app()->getLocale());

        return view('service-inner',[
            "task" => $task,
            "tasks" => $tasks,
        ]);
    }

    public function about(){
        
        $untrPage = AboutPage::firstOrFail();
        $page = $untrPage->translate(app()->getLocale());

        
        $sers = Cartificate::All();

        return view('about',[
            "page" => $page,
            "sers" => $sers,
        ]);
    }
    public function carier(){
        
        $untrVac = Career::All();
        $vacs = $this->translateCollection($untrVac ,app()->getLocale());
        
        return view('career', [
            "vacs" => $vacs,
        ]);
    }
    public function contact(){
        return view('contacts');
    }
    public function prices(){
        
        $untrTar = TarifCategory::All();
        $categs = $this->translateCollection($untrTar ,app()->getLocale());
        
        return view('price', [
            "categs"=>$categs,
        ]);
    }
    public function price_inner($locale, $slug){
        
        $untrTarif = Tarif::Where('slug', $slug)->first();
        $tarif = $untrTarif->translate(app()->getLocale());

        $untrTasks = Task::paginate(3);
        $tasks = $this->translateCollection($untrTasks ,app()->getLocale());

        return view('price-inner',[
            "tarif" => $tarif,
            "tasks" => $tasks,
        ]);
    }
    
    public function team(){
        
        $untrWor = Worker::paginate(13);
        $workers = $this->translateCollection($untrWor ,app()->getLocale());
        
        return view('team', [
            "workers"=>$workers,
        ]);
    }
    public function stocks(){
        
        $untrStock = Stock::paginate(12);
        $stocks = $this->translateCollection($untrStock ,app()->getLocale());
        
        return view('stock', [
            "stocks"=>$stocks,
        ]);
    }
    public function stock_inner($locale, $slug){
        
        $untrStock = Stock::Where('slug', $slug)->first();
        $stock = $untrStock->translate(app()->getLocale());

        $untrTasks = Stock::paginate(3);
        $tasks = $this->translateCollection($untrTasks ,app()->getLocale());

        return view('stock-inner',[
            "stock" => $stock,
            "tasks" => $tasks,
        ]);
    }
    

    private function translateCollection($paginator, $lang) {
        if ($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator || $paginator instanceof \Illuminate\Pagination\Paginator) {
            // Получаем коллекцию элементов из пагинатора, транслируем её,
            // и затем создаём новый объект пагинации с транслированной коллекцией.
            $translatedItems = $paginator->getCollection()->map(function ($item) use ($lang) {
                // Предполагается, что у вас есть метод translate() в модели.
                return $item->translate($lang);
            });
    
            // Заменяем коллекцию в пагинаторе на транслированную.
            return new \Illuminate\Pagination\LengthAwarePaginator(
                $translatedItems,
                $paginator->total(),
                $paginator->perPage(),
                $paginator->currentPage(),
                [
                    'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
                    'pageName' => 'page',
                ]
            );
        }
    
        // Если передана не пагинация, а обычная коллекция, то просто возвращаем её транслированный вариант.
        return $paginator->map(function ($item) use ($lang) {
            return $item->translate($lang);
        });
    }
    
}
