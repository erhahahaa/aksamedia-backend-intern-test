<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
  use HasFactory;

  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $keyType = 'uuid';

  protected $fillable = [
    'image',
    'name',
    'phone',
    'division_id',
    'position',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      if (empty($model->{$model->getKeyName()})) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      }
    });
  }

  public function division()
  {
    return $this->belongsTo(Division::class, 'division_id');
  }
}
