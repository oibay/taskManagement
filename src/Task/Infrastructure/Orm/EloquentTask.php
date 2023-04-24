<?php

namespace Src\Task\Infrastructure\Orm;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentTask extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tasks';

    protected $fillable = ['title', 'description'];
}
