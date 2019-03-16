<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;


    
    public static function createUser($data){

        $user = User::create([
            'username' => $data['username'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);

        return $user ; 
    }

    public static function updateUser($data){


        DB::table('users')
        ->where('id', $data['user_id'])
        ->update([
            'username' => $data['username']
        ]);

    }

    //  public static function updateStudent($data) {
    //         DB::table('users')
    //             ->where('id', $data['user_id'])
    //             ->update([
    //                 'username' => $data['username']
    //             ]);
            
    //         Contact::updateContact($data);
    //             }
            

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
     protected $fillable = [
        'username', 'password', 'role_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 

    public function contact()
    {
        return $this->belongsTo('App\Contact');
       
    }
    public function exams(){
        return $this->hasMany('Exam');
    }

    public function subjects(){
        return $this->hasMany('Subject');
    }
   
}
