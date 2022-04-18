<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comunidade extends BaseModel
{
    use HasFactory;

    protected $fillable = ["nome"];
    protected $searchable = ["nome"];
    protected $itensUpperCase = ["nome"];
}
