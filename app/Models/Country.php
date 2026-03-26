<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'name', 'iso', 'iso3', 'calling_code', 'currency', 'icon', 'status',
])]
#[Table(name: 'countries', key: 'id')]
class Country extends Model
{
    use BaseModel;

    protected function casts(): array
    {
        return [
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
            'deleted_at' => 'timestamp',
        ];
    }

    protected $defaultSort = 'name';
}
