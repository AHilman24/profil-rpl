<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    'title',
    'type',
    'description',
    'tech_stack',
    'link_preview',
    'github_link',
    'thumbnail',
    'status',
];

}
