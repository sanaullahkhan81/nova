<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class ProgrammeInformation extends Model
{
    use Uuid;

    protected $table = 'programme_information';


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_uuid','channel_uuid');
    }
    public function programmeTimetable(){
        return $this->belongsTo(ProgrammeTimetable::class,'programme_uuid','programme_uuid');
    }
}
