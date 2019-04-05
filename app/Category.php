<?php

namespace App;

use Hamcrest\Core\Is;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function issuesCount()
    {
        return $this->issues->count();
    }

    public function newIssuesCount()
    {
        return $this->issues->where('status', 'Новая')->count();
    }

    public function successIssuesCount()
    {
        return $this->issues->where('status', 'Решена')->count();
    }

    public function dangerIssuesCount()
    {
        return $this->issues->where('status', 'Отклонена')->count();
    }
}
