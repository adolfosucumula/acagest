<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\ModelStudent;
use App\Models\ModelCity;
use App\Models\ModelProvinces;
use App\Models\ModelCountries;
use App\Models\ModelCategory;
use App\Models\ModelPeoples;
use App\Models\ModelIdentities;
use App\Models\ModelContacts;
use App\Models\ModelClass;
use App\Models\ModelCourse;

class StudentController extends Controller
{
    protected $objStudent;
    private $objPeople;
    private $objIdentity;
    private $objContact;
    private $objCity;
    private $objProvince;
    private $objCountry;
    private $objClass;
    private $objCourse;
    
    public function __construct(){

        $this->objStudent = new ModelStudent();
        $this->objPeople = new ModelPeoples();
        $this->objIdentity = new ModelIdentities();
        $this->objContact = new ModelContacts();
        $this->objCity = new ModelCity();
        $this->objProvince = new ModelProvinces();
        $this->objCountry = new ModelCountries();
        $this->objClass = new ModelClass();
        $this->objCourse = new ModelCourse();
    }
    public function index()
    {
        if(Auth::check()===true){
            $data = [
                'datalist'=>$this->objStudent->all(),
                'title'=>'Estudantes',
                'subtitle'=>'Lita Geral'
            ];

            return view('templates.student.student',$data);
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

            $lastProccess = $this->objStudent->all()->last()->code_student + 1;
            
            if($lastProccess ===0 || $lastProccess ===''){
                $lastProccess = 001;
            }

            $data = [
                'newProccess'=>'00'.$lastProccess,
                'title'=>'Estudantes',
                'subtitle'=>'Novo Estudante',
                'action'=>1,
                'coutryList'=>$this->objCountry->all()->sortByDesc('id_country'),
                'provinceList'=>$this->objProvince->all()->sortByDesc('id_province'),
                'cityList'=>$this->objCity->all()->sortByDesc('id_city'),
                'classList'=>$this->objClass->all(),
                'coursesList'=>$this->objCourse->all()
            ];

            return view('templates.student.add',$data);

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

                $w = $this->objStudent->create([
                    'code_student'=>$request->code,
                    'people_id'=>$p->id_people,
                    'class_id'=>$request->class,
                    'state'=>'ON',
                    'academic_year'=>date('Y'),
                    'user_id'=>Auth::user()->id,
                    'created_at'=>date('Y-m-d H:s:i'),
                    'contact_id'=>$c->id_contact
                ]);
                
                if($w){
                    return redirect()->route('stud');
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
        //
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
                'student'=>$this->objStudent->find($id),
                'title'=>'Estudantes',
                'subtitle'=>'Atualizar Registo',
                'action'=>2,
                'coutryList'=>$this->objCountry->all()->sortByDesc('id_country'),
                'provinceList'=>$this->objProvince->all()->sortByDesc('id_province'),
                'cityList'=>$this->objCity->all()->sortByDesc('id_city'),
                'classList'=>$this->objClass->all(),
                'coursesList'=>$this->objCourse->all()
            ];
           
            return view('templates.student.add',$data);
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
    public function selectBy(Request $request){

        try{
            $value = $request->id;

            $rs = $this->objStudent->whereHas('relPeople', function($query) use ($value){
                $query->where('firstname','like', "%{$value}%")
                ->orWhere('lastname','like', "%{$value}%");
            })->get();

            $data['student'] = $rs;
            $data['person'] = "";

            if($rs[0]->relPeople !==""){
                $data['person'] = $rs[0]->relPeople;
            }
            
            echo json_encode($data);
        }catch(Exception $e){
            echo json_encode($e->getMessage());
        }
        
    }
    public function selectNIF(Request $request){
        
        try {
            $value = $request->id;

            $rs = $this->objPeople->whereHas('relIdentity', function($query) use ($value){
                $query->where('identity', "{$value}");
            })->get();

            $data['student'] = "";
            $data['person'] = $rs;

            if($rs[0]->relStudent !==""){
                $data['student'] = $rs[0]->relStudent;
            }
            
            echo json_encode($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
