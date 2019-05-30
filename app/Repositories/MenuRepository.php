<?php
namespace App\Repositories;

use View;

class MenuRepository
{
    public $info = 0;
    public $regionRep;
    public $array = [];

    public function __construct(PostRepository $info, RegionRepository $regionRep)
    {
        $this->info = $info;
        $this->regionRep = $regionRep;
    }

    public function getMenu()
    {
        //$data1 = json_decode(file_get_contents('http://www.nbrb.by/API/ExRates/Rates?Periodicity=0'));
//        $USD = json_decode(file_get_contents('http://www.nbrb.by/API/ExRates/Rates/USD?ParamMode=2'));
//        $EUR = json_decode(file_get_contents('http://www.nbrb.by/API/ExRates/Rates/EUR?ParamMode=2'));
//        $RUB = json_decode(file_get_contents('http://www.nbrb.by/API/ExRates/Rates/RUB?ParamMode=2'));
//        //$BYN = json_decode(file_get_contents('http://www.nbrb.by/API/ExRates/Rates/BYN?ParamMode=2'));
//        //dd($data1[15]->Cur_Scale);
//        //dd($data1, $USD, $RUB);
//        $BYN = 25.5;
//        //echo "Обменный курс USD по ЦБ РФ на сегодня: {$USD->Cur_OfficialRate}";
//        echo "Цена в Белорусских рублях: ". $BYN ." в USD: ". ceil($BYN * $USD->Cur_Scale/$USD->Cur_OfficialRate) ." в RUB: ". ceil($BYN * $RUB->Cur_Scale/$RUB->Cur_OfficialRate)." в EUR: ". ceil($BYN * $EUR->Cur_Scale/$EUR->Cur_OfficialRate);
//        exit();

        $this->getRegionList($this->info->_region);

        return View::make('components.header-menu', [
            'tags' => ($this->info->_region)
                ? getArrayToMenu($this->info->getAllTagPosts('region_id', $this->info->_region->id))
                : false,

            'region' => $this->info->_region,
            'regions' => array_reverse($this->array)
        ])->render();
    }

    public function getRegionList($region, $trig = false)
    {

        if ($region && $region->parent_id !== null){
            $this->array[$region->name] = getArrayToMenu($this->regionRep->getAllRegionsByMenu($region->parent_id));
            return $this->getRegionList($region->parent, true);
        }
        if ($region && $region->parent_id === null && $trig){
            $this->array[$region->name] = getArrayToMenu($this->regionRep->getAllRegionsByMenu(null));
            return;
        }
        if ($region && $region->parent_id === null && !$trig) { //  ??? Если наращивать вложенность нужно доработать
            $this->array['Выберите город'] = getArrayToMenu($this->regionRep->getAllRegionsByMenu($region->id));
            $this->array[$region->name] = getArrayToMenu($this->regionRep->getAllRegionsByMenu(null));
            return;
        }
        if(!$region){
            $this->array['Выберите страну'] = getArrayToMenu($this->regionRep->getAllRegionsByMenu(null));
        }
        return;
    }
}