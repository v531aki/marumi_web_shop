<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '材質', '柄', '色'
        ];
        
        $material_categories = [
            'リネン','キルティング','サッカー','リップル','コーデュロイ','綿プリント',
            'ウールツイード','綿ポリエステル','ピケ','ウール','綿/麻','ナイロン',
            'ポリエステル', 'オックス', '帆布', 'ガーゼ'
        ];
        
        $handle_categories = [
            '花柄','無地','水玉','チェック','和柄','迷彩','文字柄','猫柄','犬柄','星',
            '車','飛行機','動物','ハート柄','市松模様','恐竜','幾何学模様','電車','果物'
        ];
        
        $color_categories = [
            '赤','黒','茶','オレンジ','ピンク','白','アイボリー','青','黄','緑','グレー'
        ];
        
        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == '材質') {
                foreach ($material_categories as $material_category) {
                    Category::create([
                        'name' => $material_category,
                        'description' => $material_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }elseif ($major_category_name == '柄') {
                foreach ($handle_categories as $handle_category) {
                    Category::create([
                        'name' => $handle_category,
                        'description' => $handle_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }elseif ($major_category_name == '色') {
                foreach ($color_categories as $color_category) {
                    Category::create([
                        'name' => $color_category,
                        'description' => $color_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
