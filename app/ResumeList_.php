<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ResumeList_ extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emproyee_no',
        'name',
        'num',
        'kind',
        'comment',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
        'work_research_flag',
        'work_requirement_flag',
        'work_bd_flag',
        'work_dd_flag',
        'work_pg_flag',
        'work_t_flag',
        'work_om_flag',
        'work_other_flag',
        'system',
        'type',
        'whole_size',
        'team_size',
        'os',
        'lang',
        'mw',
        'fw',
        'tool',
        'last_update_datetime',
        'delete_flag'
    ];

    protected $primary_key = ['id', 'emproyee_no'];
}
