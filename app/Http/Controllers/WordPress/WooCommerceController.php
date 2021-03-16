<?php

namespace App\Http\Controllers\WordPress;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WooCommerceController extends Controller
{
    protected array $missingSku;
    protected array $productsWithSku;
    protected ?string $prefix;
    protected ?string $connection;

    public function __construct(Request $request)
    {
        $prefix = $request->route()->parameter('prefix');
        $connection = $request->route()->parameter('connection');

        $this->prefix = $prefix ? $prefix : config('defaults.wordpress.prefix', 'wp_');
        $this->connection = $connection ? $connection : config('defaults.wordpress.connection', 'mysql1');
        $this->missingSku = $this->productsWithSku = [];
    }

    public function productsWithoutSku()
    {
        $this->getProducts();

        return view('table', [
            'items'    => $this->missingSku,
            'headings' => ['ID', 'post_title'],
            'cols'     => ['id', 'title']
        ]);
    }

    public function productsWithSku()
    {
        $this->getProducts();

        return view('table', [
            'items'    => $this->productsWithSku,
            'headings' => ['ID', 'post_title', 'sku'],
            'cols'     => ['id', 'title', 'sku']
        ]);
    }

    protected function getProducts()
    {
        $products = DB::connection($this->connection)->table($this->prefix.'posts')->where('post_type', 'product')->get();
        foreach ($products as $product) {
            $sku =  DB::connection($this->connection)->table($this->prefix.'postmeta')->where('post_id', $product->ID)->where('meta_key', '_sku')->first();
            if (!$sku) {
                $this->missingSku[] = [
                    'id'    => $product->ID,
                    'title' => $product->post_title
                ];
            } else {
                $this->productsWithSku[] = [
                    'id'    => $product->ID,
                    'title' => $product->post_title,
                    'sku'   => $sku->meta_value,
                ];
            }
        }
    }
}
