<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    
     use \Myth\Auth\AuthTrait;

    public function __construct() 
	{

	session()->set('redirect_url', current_url());
	$this->restrict( base_url('/login') );
        $this->restrictToGroups(['admins','mbt'], base_url('/login') );
   	$this->auth = service('authentication');
        $this->authorize = service('authorization');
        
        $this->data['config'] = config('Site');
        $this->data['user'] = $this->auth->user();

        $this->lengthModel = model('App\Models\LengthModel');
        $this->notesModel = model('App\Models\NotesModel');
        $this->ratesModel = model('App\Models\RatesModel');
        $this->seasonsModel = model('App\Models\SeasonsModel');
        $this->typesModel = model('App\Models\TypesModel');
        
        $this->data['layout'] = 'admin/layout';
        $this->data['year'] = Time::parse(Time::now(config('App')->appTimezone))->toLocalizedSTring('Y');
        
        
	}



    public function index()
    {
        
        if ($this->authorize->inGroup([1,2], $this->data['user']->id)) {

            return view('admin/index',$this->data);
        } else {
            return redirect()->back();
        }
       
        

    }
    
    public function pages($page)
    {
        
        $this->data['page'] = $page;
        
        switch ($page) {
            case 'rates':
                $this->rates();
                break;
                
        }
        //dd($this->data);
        return view('admin/pages/'.$this->data['page'],$this->data);
        
        
        
    }
    
    private function rates(){
        
        if ($this->request->getMethod() != "get") {
            
            $data = $this->request->getPost();
            //dd($data,$data['rates']);
            foreach ($data['rates'] as $id=>$price) {
 		//d($id,$price);
 		
 		
 		
 		if (!$this->ratesModel->update($id,[ 'price' => (int) $price ?? NULL ])) {
 			redirect()->to('/admin/pages/rates')->with('error','Error updating rates. Please notify your system administrator at <a href="mailto://'. $config->authorCompanyEmail . '">'.$config->authorCompanyEmail.'</a>.');
 		}
            	
            }
            
           // dd($rateArray);
            
            redirect()->to('/admin/pages/rates')->with('message','Successfully updated rates.');
            
        }
        $tables = array('rates','seasons','length','types','notes');
                    $this->data['rates'] = new \stdClass();

        foreach ($tables as $table) {
            //if ($table == 'rates') {
             //   $this->data['rates']->{$table} = $this->{$table . 'Model'}->orderBy('id','asc')->findAll();
            //} else {
                $this->data['rates']->{$table} = $this->{$table . 'Model'}->findAll();
            //}
        }
        
        foreach ($this->data['rates']->rates as $rate) {
            $resorted[$rate->season][$rate->length][$rate->type] = $rate;
        }
        
        $this->data['rates']->rates = $resorted;
        
        return true;
    }
    
}
