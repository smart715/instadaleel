<?php

namespace App\Models\UserModule;

use App\Models\Messaging\SenderId;
use App\Models\PhoneBook\Group;
use App\Models\Report\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsToMany(Service::class);
    }

    public function report()
    {
        return $this->hasMany(OrderReport::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    //relation with currency table
    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    //relation with user table
    public function user(){
        return $this->hasMany(User::class,"parent_id","id");
    }

    //relation with user table
    public function parent(){
        return $this->belongsTo(User::class,"parent_id","id");
    }

    //to relation with transaction table
    public function to(){
        return $this->hasMany(Transaction::class,"to","id");
    }
    //from relation with transaction table
    public function from(){
        return $this->hasMany(Transaction::class,"from","id");
    }

    //relation with validity
    public function validity(){
        return $this->belongsTo(Validity::class);
    }

    //relation with buy sell table
    public function buy(){
        return $this->hasMany(BuySell::class,"buyer_id","id");
    }

    //relation with sender id table
    public function senderid(){
        return $this->hasMany(SenderId::class);
    }

    //relation with group table
    public function group(){
        return $this->hasMany(Group::class);
    }
}