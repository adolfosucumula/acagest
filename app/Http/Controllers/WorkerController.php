<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\ModelWorkers;
use App\Models\ModelCity;
use App\Models\ModelProvinces;
use App\Models\ModelCountries;
use App\Models\ModelCategory;
use App\Models\ModelPeoples;
use App\Models\ModelIdentities;
use App\Models\ModelContacts;

class WorkerController extends Controller
{   
    private $objPeople;
    private $objIdentity;
    private $objContact;
    private $objWorker;
   
    private $objCity;
    private $objProvince;
    private $objCountry;
    private $objCategory;

    public function __construct(){

        $this->objPeople = new ModelPeoples();
        $this->objIdentity = new ModelIdentities();
        $this->objContact = new ModelContacts();
        $this->objWorker = new ModelWorkers();
        $this->objCity = new ModelCity();
        $this->objProvince = new ModelProvinces();
        $this->objCountry = new ModelCountries();
        $this->objCategory = New ModelCategory();
    }
    public function index()
    {   
        //$workers = $this->objWorker->all()->sortByDesc('id_worker');
        if(Auth::check()===true){
            $data = [
                'datalist'=>$this->objWorker->all()->sortByDesc('id_worker'),
                'title'=>'Trabalhadores',
                'subtitle'=>'Lita Geral'
            ];
            
            //dd($this->obj->find(1)->relCity);
            //return view('templates/worker/worker',compact('workers')); 
            return view('templates/worker/worker',$data); 
            
        }
        return redirect()->route('user.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::check()===true){
            $data = [
                'title'=>'Trabalhadores',
                'subtitle'=>'Cadastrar Funcionario',
                'coutryList'=>$this->objCountry->all()->sortByDesc('id_country'),
                'provinceList'=>$this->objProvince->all()->sortByDesc('id_province'),
                'cityList'=>$this->objCity->all()->sortByDesc('id_city'),
                'categoryList'=>$this->objCategory->all()->sortBy('category')
            ];
        
            //echo $this->objWorker->all()->relPeople->relCity->relProvince->relCountry;
            return view('templates/worker/add',$data);
        }
        return redirect()->route('user.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(Auth::check()===true){
            $i = $this->objIdentity->create([
                'identity'=>$request->identity,
                'exp_date'=>$request->expdate
            ]);
            $p = $this->objPeople->create([
                'firstname'=>$request->firstName,
                'lastname'=>$request->lastName,
                'gender'=>$request->gender,
                'm_state'=>$request->mstate,
                'nationality'=>$request->nationality,
                'city_id'=>$request->city,
                'identity_code'=>$i->id_identity
            ]);
            $c = $this->objContact->create([
                'telephone'=>$request->tele,
                'cellphone'=>$request->cell,
                'homephone'=>$request->homephone,
                'email'=>$request->email
            ]);

            $w = $this->objWorker->create([
                'category'=>$request->category,
                'people_id'=>$p->id_people,
                'contact_id'=>$c->id_contact
            ]);
            
            if($w){
                return redirect('workers');
            }else{
                return redirect()->back()->withInput()->withErrors(['Falha ao cadastrar registo!']);
                //return redirect('new_work'); 
            }
        }
        return redirect()->route('user.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()===true){
            $data = [
                'datalist'=>$this->objWorker->find($id),
                'title'=>'Trabalhadores',
                'subtitle'=>'Detalhes de Funcionario'
            ];
            return view('templates/worker/show',$data);
        }
        return redirect()->route('user.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()===true){
            $data = [
                'datalist'=>$this->objWorker->find($id),
                'title'=>'Trabalhadores',
                'subtitle'=>'Atualizar Funcionario'
            ];
            return view('templates/worker/update',$data);
        }
        return redirect()->route('user.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
