<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    protected $fillable=[
    'user_id','full_name','gender','phone','email','IDN','address','birth_date',
    ];

    public static function createContact($data) {
        
        $inputDate=date("y-m-d",strtotime($data['date']));
        $contact = Contact::create([
            'email' => $data['email'],
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'IDN' => $data['IDN'],
            'birth_date' =>$inputDate,
            'address' => $data['address'],
            
            'user_id' => $data['user_id']
        ]);
        $date=date("y-m-d");
        return $contact['id'];
    }

    public static function updateContact($data) {
        $date=date("y-m-d");
         $inputDate=date("y-m-d",strtotime($data['date']));
        DB::table('contacts')
            ->where('id', $data['contact_id'])
            ->update([
                'email' => $data['email'],
                'full_name' => $data['full_name'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'IDN' => $data['IDN'],
                'address' => $data['address'],
                'birth_date' =>$inputDate
            ]);
    }

    
    public function student()
    {
        return $this->hasMany('App\Student');
       
    }

    public function organization()
    {
        return $this->hasMany('App\Organization');
       
    }
    public function trainer()
    {
        return $this->hasMany('App\Trainer');
       
    }
    public function session()
    {
        return $this->belongsTo('App\Session');
    
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($contact) {
             $contact->users()->delete();
            
        });
}}
