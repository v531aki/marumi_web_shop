<?php

namespace App\Imports;

use App\Product;
use App\ProductCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = new Product();
        $product->name = $row['name'];
        $product->width = $row['width'];
        $product->moq = $row['moq'];
        $product->description = $row['description'];
        $product->price = $row['price'];
        $product->stock = $row['stock'];
        $product->special_feature = $row['special_feature'];
        $product->restock = $row['restock'];
        $product->save();
        
        if ($row['categories'] != null){
            $categories = explode(',', $row['categories']);            
            foreach($categories as $category){
                $product_category = new ProductCategory;
                $product_category->products_id = $product->id;
                $product_category->categories_id = $category;
                $product_category->save();
            }
        }
        return $product;
    }
}