<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Guardian extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'guardians';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TITLE_SELECT = [
        'miss'   => 'Miss',
        'mrs'    => 'Mrs',
        'mr'     => 'Mr',
        'mr_mrs' => 'Mr & Mrs',
    ];

    protected $fillable = [
        'bio',
        'title',
        'email',
        'surname',
        'address',
        'initials',
        'created_at',
        'updated_at',
        'deleted_at',
        'phone_number',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function parentStudents()
    {
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }
}
