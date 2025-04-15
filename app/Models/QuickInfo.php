<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;

class QuickInfo extends Model implements Searchable
{
    use HasFactory, SoftDeletes;

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $this->link
        );
    }
    protected $fillable = [
        'title',
        'link',
    ];
}
