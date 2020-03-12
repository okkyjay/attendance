<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Student extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'students';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    protected $fillable = [
        'bio',
        'class',
        'gender',
        'last_name',
        'parent_id',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
        'middle_name',
        'school_name',
        'phone_number',
        'school_address',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function parent()
    {
        return $this->belongsTo(Guardian::class, 'parent_id');
    }
}
