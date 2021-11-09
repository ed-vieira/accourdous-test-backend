<?php

namespace App\Repository\Properties;
use App\Interfaces\Repository\IRepository;

interface PropertyService extends IRepository {
    public function addresses();
    public function search(string $param);
}
