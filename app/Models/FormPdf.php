<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;

class FormPdf extends Model implements Searchable
{
    use HasFactory, SoftDeletes;

    public function getSearchResult(): \Spatie\Searchable\SearchResult
    {
        $url = route('forms.view', ['id' => $this->id]);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }
    protected $fillable = [
        'title',
        'thumbnail',
        'pdf_path',
    ];
}
