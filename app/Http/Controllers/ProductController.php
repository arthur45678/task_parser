<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ParserDataJob;
use App\Models\File;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class ProductController extends Controller
{
    public function cachePost()
    {
        $checked = Cache::has('products:');

        if($checked) {
            $products= Cache::get('products:');
            $products= Product::select('id','excell_id', 'name','date')->orderBy('date', 'ASC')->get();
            $products= $this->paginate($products, '/');
        } else {
            $products= Product::select('id','excell_id', 'name','date')->orderBy('date', 'ASC')->get();

            Cache::put('products:', $products);
            $products= $this->paginate($products, 'cache-products');
        }

        return view('products.index', compact('products'));
    }

    public function paginate($items, $pageName = null, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $data = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page,$options);
        if($pageName) {
            $data->setPath($pageName);
        }
        return $data;
    }

    public function store(Request $request)
    {

        $path = $request->file('file')->store('public');
        File::create([
            'file' => $path
        ]);

        dispatch(new ParserDataJob($path));
        return redirect('/')->with('success', 'Файл загружен');

    }
}
