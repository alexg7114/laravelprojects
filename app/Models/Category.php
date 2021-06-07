<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function categoryList()
    {
        return \DB::select("SELECT id, title, description FROM {$this->table}");

    }

    public function category(int $id)
    {
        return \DB::select("SELECT id, title, description FROM {$this->table} WHERE id = :id", ['id' => $id]);
    }
}
