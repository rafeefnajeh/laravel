<?php

namespace App;
use App\User;
use App\Contact;
use App\Course;
use App\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    
    protected $fillable=[
        'contact_id','organization_id'
    ];
    protected $table = 'student';

    public static function createStudent($data) {
        /*
        $user = User::create([
            'username' => $data['user_name'],
            'role_id' => 1,
            'password' => Hash::make($data['password']),
        ]);*/
        $user = User::createUser($data) ; 
        $data['user_id'] = $user['id'];
        $contactId = Contact::createContact($data);
        $student = Student::create([
            'contact_id' => $contactId,
             'organization_id'=>$data['organization_id']
        ]);
      
        
        return $student;
     
        }

    public static function updateStudent($data) {
        DB::table('student')
        ->where('id',$data['student_id'])//hiddin feild
        ->update([
            'organization_id'=>$data['organization_id']
        ]);
        User::updateUser($data);
        Contact::updateContact($data);
        
            }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
       
    }
    public function session()
    {
        return $this->belongsToMany('App\Session');
       
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization');
       
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
       
    }
   
  
    public static function boot() {
        parent::boot();

        static::deleting(function($student) {
             $student->contact()->delete();
            
        });

     

   
}}
