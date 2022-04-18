<?php

namespace App\Repositories;

use App\Models\Comunidade;

class ComunidadeRepository extends BaseRepository
{

    public function __construct(Comunidade $comunidade)
    {
        $this->model = $comunidade;
    }
}
