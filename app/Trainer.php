<?php

namespace App;
use App\User;
use App\Contact;
use App\Course;
use App\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trainer extends Model
{
  
    protected $fillable = [
        'field','contact_id'
     ]; 
     
    protected $table = 'trainer';
    public static  function createTrainer($data)
    {
        $user = User::createUser($data);
        $data['user_id'] = $user['id'];
        $contactId = Contact::createContact($data);
        $trainer = Trainer::create([
           'field'=>$data['field'],
           'contact_id'=> $contactId
        ]) ;
        return $trainer;
    }

   
  
    public static function updateTrainer($data) {
       
               DB::table('trainer')
               ->where('id',$data['trainer_id'])
               ->update([
                   'field'=>$data['field']
               ]);
           User::updateUser($data);
           Contact::updateContact($data);
           
       }
       public function courses()
       {
           return $this->belongsToMany('App\Course');
          
       }
   
       public function contact()
       {
           return $this->belongsTo('App\Contact');
          
       }


       public function Session(){
        return $this->hasMany('App\Session');
    }
    
}
