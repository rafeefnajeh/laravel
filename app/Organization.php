<?php

namespace App;

use App\User;
use App\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organization extends Model
{
    protected $table = 'organization';

    public static function createOrganization($data) {
      
        $user = User::createUser($data) ; 
        $data['user_id'] = $user['id'];
        $contactId = Contact::createContact($data);
        $organization = Organization::create([
            'name_org'=>$data['name_org'],
            'contact_id' =>$contactId
        ]);
      
      
        return $organization;
     
        }

    public static function updateOrganization($data) {
        DB::table('organization')
        ->where('id',$data['organization_id'])//hiddin feild
        ->update([
            'name_org'=>$data['name_org']
        ]);
        User::updateUser($data);
        Contact::updateContact($data);
        
            }

 

    protected $fillable=[
        'name_org','contact_id'
    ];

    public function student(){
        return $this->hasMany('App\Student');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
       
    }
   
    public static function boot() {
        parent::boot();

        static::deleting(function($organization) {
            $organization->contact()->delete();
            
        });
}}
