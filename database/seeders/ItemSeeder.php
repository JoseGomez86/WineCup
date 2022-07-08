<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            // 1 ----Marcas Pastas-----//
            ['name' => 'Marca', 'subcategory_id' =>  1],
            // 2 ----Marcas Azucar-----//
            ['name' => 'Marca', 'subcategory_id' =>  2],
            // 3 ----Marcas Aceite-----//
            ['name' => 'Marca', 'subcategory_id' =>  3],
            // 4 ----Marcas Yerba-----//
            ['name' => 'Marca', 'subcategory_id' =>  4],
            // 5----Marcas Té-----//
            ['name' => 'Marca', 'subcategory_id' =>  5],
            // 6----Marcas Café-----//
            ['name' => 'Marca', 'subcategory_id' =>  6],
            // 7----Marcas Latas-----//
            ['name' => 'Marca', 'subcategory_id' =>  7],
            // 8----Marcas Salsa-----//
            ['name' => 'Marca', 'subcategory_id' =>  8],
            // 9----Marcas Vinos-----//
            ['name' => 'Marca', 'subcategory_id' =>  9],
            //10----Marcas Cervezas-----//  
            ['name' => 'Marca', 'subcategory_id' => 10],
            //11----Marcas Whiskies-----//
            ['name' => 'Marca', 'subcategory_id' => 11],
            //12----Marcas Gaseosas-----//
            ['name' => 'Marca', 'subcategory_id' => 12],
            //13----Marcas Aguas-----// 
            ['name' => 'Marca', 'subcategory_id' => 13],
            //14----Marcas Jugos-----//
            ['name' => 'Marca', 'subcategory_id' => 14],
            //15----Marcas Toallones-----//        
            ['name' => 'Marca', 'subcategory_id' => 15],
            //16----Marcas Cortinas-----//        
            ['name' => 'Marca', 'subcategory_id' => 16],
            //17----Marcas Sabanas-----//
            ['name' => 'Marca', 'subcategory_id' => 17],
            //18----Marcas Acolchados-----//
            ['name' => 'Marca', 'subcategory_id' => 18],
            //19----Marcas Colchones-----//
            ['name' => 'Marca', 'subcategory_id' => 19],
            //20----Marcas Almohadas-----//
            ['name' => 'Marca', 'subcategory_id' => 20],
            //21----Marcas Vasos-----//
            ['name' => 'Marca', 'subcategory_id' => 21],
            //22----Marcas Copas-----//                               
            ['name' => 'Marca', 'subcategory_id' => 22],
            //23----Marcas Termos-----//        
            ['name' => 'Marca', 'subcategory_id' => 23],
            //24----Marcas Platos-----//
            ['name' => 'Marca', 'subcategory_id' => 24],
            //25----Bodegas Vinos-----//
            ['name' => 'Bodega', 'subcategory_id' =>  9],
            //26----Linea Vinos-----//
            ['name' => 'Linea', 'subcategory_id' =>  9],
            //27----Año Vinos-----//
            ['name' => 'Año', 'subcategory_id' =>  9],
            //28----Variedad Vinos-----//
            ['name' => 'Variedad', 'subcategory_id' =>  9],
            //29----Varietal Vinos-----//
            ['name' => 'Varietal', 'subcategory_id' =>  9],
            //30----Origen Vinos-----//
            ['name' => 'Origen', 'subcategory_id' =>  9],
            //31----Alto Toallones-----//        
            ['name' => 'Alto', 'subcategory_id' => 15],
            //32----Ancho Toallones-----//        
            ['name' => 'Ancho', 'subcategory_id' => 15],
            //33----Alto Cortinas-----//        
            ['name' => 'Alto', 'subcategory_id' => 16],
            //34----Ancho Cortinas-----//        
            ['name' => 'Ancho', 'subcategory_id' => 16],
            //35----Alto Colchones-----//
            ['name' => 'Alto', 'subcategory_id' => 19],
            //36----Ancho Colchones-----//
            ['name' => 'Ancho', 'subcategory_id' => 19],
            //37----Alto Almohadas-----//
            ['name' => 'Alto', 'subcategory_id' => 20],
            //38----Ancho Almohadas-----//
            ['name' => 'Ancho', 'subcategory_id' => 20],
            //39----Medida Sabanas-----//
            ['name' => 'Alto', 'subcategory_id' => 17],
            //40----Medida Acolchados-----//
            ['name' => 'Alto', 'subcategory_id' => 18],
            //41----Color Toallones-----//        
            ['name' => 'Color', 'subcategory_id' => 15],
            //42----Color Cortinas-----//        
            ['name' => 'Color', 'subcategory_id' => 16],
            //43----Color Sabanas-----//
            ['name' => 'Color', 'subcategory_id' => 17],
            //44----Color Acolchados-----//
            ['name' => 'Color', 'subcategory_id' => 18],
            //45----Tipo de envase Aceite-----//
            ['name' => 'Tipo de envase', 'subcategory_id' => 8],
            //46----Tipo de envase Salsa-----//
            ['name' => 'Tipo de envase', 'subcategory_id' => 8],
            //47----Tipo de envase Vinos-----//
            ['name' => 'Tipo de envase', 'subcategory_id' => 9],
            //48----Tipo de envase Cerveza-----//
            ['name' => 'Tipo de envase', 'subcategory_id' => 10],            
            //49----Unidades por pack Pastas-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  1],
            //50----Unidades por pack Azucar-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  2],
            //51----Unidades por pack Aceite-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  3],
            //52----Unidades por pack Yerba-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  4],
            //53----Unidades por pack Té-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  5],
            //54----Unidades por pack Café-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  6],
            //55----Unidades por pack Latas-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  7],
            //56----Unidades por pack Salsa-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  8],
            //57----Unidades por pack Vinos-----//
            ['name' => 'Unidades por pack', 'subcategory_id' => 9],
            //58----Variedad de la infusión Café-----//
            ['name' => 'Variedad de la infusión', 'subcategory_id' =>  6],
            //59----Peso de la unidad Pastas-----//
            ['name' => 'Peso de la unidad', 'subcategory_id' =>  1],
            //60----Peso de la unidad Azucar-----//
            ['name' => 'Unidades por pack', 'subcategory_id' =>  2],
            //61----Peso de la unidad Yerba-----//
            ['name' => 'Peso de la unidad', 'subcategory_id' =>  4],
            //62----Tipo de Pasta-----//
            ['name' => 'Tipo de pasta', 'subcategory_id' =>  1],
            //63----Sabor Pasta-----//
            ['name' => 'Sabor', 'subcategory_id' =>  1],
            //64----Volumen de la unidad Vino-----//
            ['name' => 'Volumen de la unidad', 'subcategory_id' =>  9],
            //65----Volumen de la unidad Whiskie-----//
            ['name' => 'Volumen de la unidad', 'subcategory_id' =>  11],
            // //----Vencimiento Pastas-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  1],
            // //----Vencimiento Azucar-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  2],
            // //----Vencimiento Aceite-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  3],
            // //----Vencimiento Yerba-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  4],
            // //----Vencimiento Té-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  5],
            // //----Vencimiento Café-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  6],
            // //----Vencimiento Latas-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  7],
            // //----Vencimiento Salsa-----//
            // ['name' => 'Vencimiento', 'subcategory_id' =>  8],
        ];
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
