<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use App\Models\Circular;
use App\Models\FormPdf;
use App\Models\ImageGallery;
use App\Models\QuickInfo;
use App\Models\WhatsNew;
use Illuminate\Http\Request;
use Schema;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $models = [
            Canteen::class,
            Circular::class,
            QuickInfo::class,
            FormPdf::class,
            ImageGallery::class,
        ];

        $search = new Search();

        foreach ($models as $model) {
            $table = (new $model)->getTable();
            $columns = Schema::getColumnListing($table);

            $search->registerModel($model, $columns);
        }

        $results = $search->search($request->input('search'));

        return view('search.result', compact('results'));
    }

}
