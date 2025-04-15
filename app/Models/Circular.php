<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;

class Circular extends Model implements Searchable
{
    use HasFactory, SoftDeletes;

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        $url = $this->type == 'pdf' ? asset("storage/{$this->pdf_path}") : $this->link;
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }
    protected $fillable = [
        'title',
        'type',
        'link',
        'pdf_path',
    ];
}
