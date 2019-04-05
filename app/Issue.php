<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded = [];

    public function startPhotoUrl()
    {
        return url('storage/images/' . $this->start_photo);
    }

    public function endPhotoUrl()
    {
        return url('storage/images/' . $this->end_photo);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function date(){
        return date('d.m.Y H:i', strtotime($this->created_at));
    }
    public function timer()
    {
        $now = date('d.m.Y H:i');
        $created_at = date($this->created_at);
        $now = date_create($now);
        $created_at = date_create($created_at);
        $timer = date_diff($now, $created_at);
        $format = '';
        if ($timer->m > 0){
            $format .= '%m месяцев ';
        }
        if ($timer->d > 0){
            $format .= '%d дней ';
        }
        if ($timer->h > 0){
            $format .= '%h часов ';
        }
        if ($timer->i > 0){
            $format .= '%i минут';
        }
        return $timer->format($format);

    }

    public function getStatusColor()
    {
        if ($this->status === 'Новая') {
            return 'primary';
        } else if ($this->status === 'Решена') {
            return 'success';
        } else if ($this->status === 'Отклонена') {
            return 'danger';
        }
    }
}
