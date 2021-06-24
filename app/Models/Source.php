<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    protected $primaryKey = "id";

    public function source(): HasMany
    {
        return $this->hasMany(Source::class, null, 'id');
    }

}
