<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;

class Canteen extends Model implements Searchable
{
    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        $url = route('canteen.view');

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }
    protected $fillable = ['title', 'image'];
}
