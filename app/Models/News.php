<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
       'category_id', 'source_id','title', 'description', 'status'
    ];

//    public static function create(array $fields)
//    {
//    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id');
    }

//    public function newsList()
//    {
//        return \DB::table($this->table)
//            ->join('categories', 'news.category_id', '=', 'categories.id')
//            ->select(['news.*', 'categories.title as category_title'])
//            ->where([
//                ['news.title', 'like', '%'. request()->query('q') .'%'],
//                ['news.id', '>', 1],
//                ['news.id', '<', 10]
//            ])
//            ->orWhere( 'news.id', '>', 5)
//            ->get();
//    }
//
//    public function news(int $id): object
//    {
//        return \DB::table($this->table)
//            ->select(['id', 'title', 'description', 'created_at'])
//            ->where(['id' => $id])
//            ->first();
//    }




}
