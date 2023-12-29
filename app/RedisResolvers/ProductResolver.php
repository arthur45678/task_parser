<?php

namespace App\RedisResolvers;
use App\Models\Product;
use GeTracker\LaravelRedisPaginator\Resolvers\AbstractResolver;
class ProductResolver extends AbstractResolver
{
    // Defaults shown below, can be omitted
    protected $modelKey = 'id';
    protected $scoreField = 'score';

    /**
     * Load Eloquent models
     */
    protected function resolveModels(array $keys)
    {
        return Product::whereIn('id', $keys)->get();
    }

    /**
     * Resolve a key from Redis to an Eloquent incrementing ID or UUID
     */
    protected function resolveKey($key)
    {
        return (int)str_replace('products:', '', $key);
    }
}
