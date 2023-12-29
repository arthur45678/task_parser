<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /**
         * All items add in redis
         */
        /*Product::all()->each(function ($product){
            Cache::put('products:'.$product->id,$product->name);
        });*/


        /**
         * Store item in redis
         */
        $product = Product::find(2);
        Redis::set('products:'.$product->id, serialize($product));
        $serializedProduct = Redis::get('products:'.$product->id);
        $unserializedProduct = unserialize($serializedProduct);

        dd($unserializedProduct);
/*
        $product = Product::find(2);
        $product = Redis::set('products:'.$product->id, $product);
        $product = Product::make(json_decode($product));*/



    }
}
