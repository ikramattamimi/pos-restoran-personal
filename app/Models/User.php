<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property int $role_id
 * @property string|null $nama
 * @property string|null $username
 * @property string|null $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property RoleUser $role_user
 * @property Collection|Pembayaran[] $pembayarans
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'role_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'role_id',
		'nama',
		'username',
		'password'
	];

	public function role_user()
	{
		return $this->belongsTo(RoleUser::class, 'role_id');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class);
	}
}
