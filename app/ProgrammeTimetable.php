<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class ProgrammeTimetable extends Model
{
    use Uuid;

    protected $table = 'programme_timetable';

    protected $primaryKey = 'programme_uuid';

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

    protected $casts = [
        'start_date' => 'date',
    ];


    public function channel()
    {
        return $this->belongsTo(Channel::class,'channel_uuid');
    }
}
