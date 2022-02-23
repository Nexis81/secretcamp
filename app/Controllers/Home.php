<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    
    public function __construct() 
	{
        $this->data['config'] = config('Site');

        $this->lengthModel = model('App\Models\LengthModel');
        $this->notesModel = model('App\Models\NotesModel');
        $this->ratesModel = model('App\Models\RatesModel');
        $this->seasonsModel = model('App\Models\SeasonsModel');
        $this->typesModel = model('App\Models\TypesModel');
        
        $this->data['layout'] = 'admin/layout';
        $this->data['year'] = Time::parse(Time::now(config('App')->appTimezone))->toLocalizedSTring('Y');
        
        
	}
    public function index($page = 'index')
    {
        $available = array('index','location','map','tour','events','rates','reviews');
        
        switch ($page) {
            case 'rates':
                $this->rates();
                break;
                
        }
        //dd($this->data);
        if (in_array($page,$available)) {
            return view($page,$this->data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
    private function rates()
    {
        
        $tables = array('rates','seasons','length','types','notes');
                    $this->data['rates'] = new \stdClass();

        foreach ($tables as $table) {
            
            $this->data['rates']->{$table} = $this->{$table . 'Model'}->findAll();
        
        }
        
        foreach ($this->data['rates']->rates as $rate) {
            $resorted[$rate->season][$rate->length][$rate->type] = $rate;
        }
        
        $this->data['rates']->rates = $resorted;
        //dd($this->data['rates']->seasons);
        foreach ($this->data['rates']->seasons as $key=>$season) {
            $this->data['rates']->seasons[$key]->start = preg_replace_callback('/^(\w+)(?=\s)/',function ($word) { return strtoupper($word[1]);}, date('M jS Y',strtotime($season->start)));
            $this->data['rates']->seasons[$key]->end = preg_replace_callback('/^(\w+)(?=\s)/',function ($word) { return strtoupper($word[1]);}, date('M jS Y',strtotime($season->end)));
        }
        
        //dd($this->data);
        
        return true;
        
    }
}
