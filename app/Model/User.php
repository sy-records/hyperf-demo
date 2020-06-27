<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $ID 
 * @property string $user_login 
 * @property string $user_pass 
 * @property string $user_nicename 
 * @property string $user_email 
 * @property string $user_url 
 * @property string $user_registered 
 * @property string $user_activation_key 
 * @property int $user_status 
 * @property string $display_name 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['ID' => 'integer', 'user_status' => 'integer'];
}