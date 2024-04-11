<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameter';
    protected $primaryKey = 'id_parameter';
    public $timestamps = false;

    protected $fillable = [
        'fk_id_parameter_ph_air',
        'fk_id_parameter_ppm_air',
        'fk_id_parameter_suhu',
    ];

    public function parameterPhAir()
    {
        return $this->belongsTo(ParameterPhAir::class, 'fk_id_parameter_ph_air');
    }

    public function parameterPpmAir()
    {
        return $this->belongsTo(ParameterPpmAir::class, 'fk_id_parameter_ppm_air');
    }

    public function parameterSuhu()
    {
        return $this->belongsTo(ParameterSuhu::class, 'fk_id_parameter_suhu');
    }
}

class ParameterPhAir extends Model
{
    protected $table = 'parameter_ph_air';
    protected $primaryKey = 'id_paramater_ph_air';
    public $timestamps = false;

    protected $fillable = [
        'max_ph_air',
        'min_ph_air',
    ];
}

class ParameterPpmAir extends Model
{
    protected $table = 'parameter_ppm_air';
    protected $primaryKey = 'id_paramater_ppm_air';
    public $timestamps = false;

    protected $fillable = [
        'max_ppm_air',
        'min_ppm_air',
    ];
}

class ParameterSuhu extends Model
{
    protected $table = 'parameter_suhu';
    protected $primaryKey = 'id_paramater_suhu';
    public $timestamps = false;

    protected $fillable = [
        'max_suhu',
        'min_suhu',
    ];
}

class PhAir extends Model
{
    protected $table = 'ph_air';
    protected $primaryKey = 'id_ph';
    public $timestamps = false;

    protected $fillable = [
        'ph_air',
        'tanggal',
        'waktu',
    ];
}



class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];
}
