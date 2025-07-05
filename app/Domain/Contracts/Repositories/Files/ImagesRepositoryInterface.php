<?php

namespace App\Domain\Contracts\Repositories\Files;

interface ImagesRepositoryInterface
{
    public function getAll();
    public function create(array $data);
}
