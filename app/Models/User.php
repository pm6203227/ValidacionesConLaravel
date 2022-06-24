<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\HasRoles;

class User extends Authenticatable{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
public function __construct(){
    $this->middleware(['role:admin','permission:universal']);
Route::group(['middleware' => ['permission:universal']], function () {
    $Venta = Permission::create(['Venta' => 'universal']);
    $Compra=Permission::create(['Compra' => 'universal']);
    $Usuario=Permission::create(['Usuarios' => 'universal']);
    return($Venta);
    });
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
