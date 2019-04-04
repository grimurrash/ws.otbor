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

    public function timer()
    {

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
