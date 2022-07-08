<?php

namespace Database\Seeders;

use App\Models\Valuesitem;
use Illuminate\Database\Seeder;

class ValuesitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valuesitems = [
            //Marca
            //----Marcas Pastas-----//
            ['item_id' => 1, 'name' => 'Barilla'],
            ['item_id' => 1, 'name' => 'Delverde'],
            ['item_id' => 1, 'name' => 'Arcor'],
            ['item_id' => 1, 'name' => 'Lucchetti'],
            ['item_id' => 1, 'name' => 'Matarazzo'],
            //----Marcas Azúcar-----//
            ['item_id' => 2, 'name' => 'Ledezma'],
            ['item_id' => 2, 'name' => 'Chango'],
            ['item_id' => 2, 'name' => 'Arcor'],
            //----Marcas Aceite-----//
            ['item_id' => 3, 'name' => 'Cañuelas'],
            ['item_id' => 3, 'name' => 'Cocinero'],
            //----Marcas Yerba-----//
            ['item_id' => 4, 'name' => 'Playadito'],
            ['item_id' => 4, 'name' => 'Mañanita'],
            ['item_id' => 4, 'name' => 'Rosamonte'],
            //----Marcas Té-----//
            ['item_id' => 5, 'name' => 'Twinings'],
            ['item_id' => 5, 'name' => 'Green Hills'],
            //----Marcas Café-----//
            ['item_id' => 6, 'name' => 'Segafredo Zanetti'],
            ['item_id' => 6, 'name' => 'Lavazza'],
            ['item_id' => 6, 'name' => 'La Bolsa de Cafe'],
            //----Marcas Latas-----//
            ['item_id' => 7, 'name' => 'Arcor'],
            ['item_id' => 7, 'name' => 'Marolio'],
            //----Marcas Salsa-----//
            ['item_id' => 8, 'name' => 'Heinz'],
            ['item_id' => 8, 'name' => 'Bulls Eye'],
            //----Marcas Vinos-----//
            ['item_id' => 9, 'name' => 'Aimé'],
            ['item_id' => 9, 'name' => 'Alambrado'],
            ['item_id' => 9, 'name' => 'Alamos'],
            ['item_id' => 9, 'name' => 'Alfredo Roca'],
            ['item_id' => 9, 'name' => 'Alma Mora'],
            ['item_id' => 9, 'name' => 'Alma Negra'],
            ['item_id' => 9, 'name' => 'Alta Vista'],
            ['item_id' => 9, 'name' => 'Alto'],
            ['item_id' => 9, 'name' => 'Altos Del Plata'],
            ['item_id' => 9, 'name' => 'Altos Las Hormigas'],
            ['item_id' => 9, 'name' => 'Amalaya'],
            ['item_id' => 9, 'name' => 'Anita'],
            ['item_id' => 9, 'name' => 'Aristides'],
            ['item_id' => 9, 'name' => 'Blush'],
            ['item_id' => 9, 'name' => 'Cadus'],
            ['item_id' => 9, 'name' => 'Catena Zapata'],
            ['item_id' => 9, 'name' => 'Chandon'],
            ['item_id' => 9, 'name' => 'Crios'],
            ['item_id' => 9, 'name' => 'D.V. Catena'],
            ['item_id' => 9, 'name' => 'Dadá'],
            ['item_id' => 9, 'name' => 'Del Fin Del Mundo'],
            ['item_id' => 9, 'name' => 'Don David'],
            ['item_id' => 9, 'name' => 'Doña Paula'],
            ['item_id' => 9, 'name' => 'Elegido'],
            ['item_id' => 9, 'name' => 'Escorihuela Gascón'],
            ['item_id' => 9, 'name' => 'Familia Bianchi'],
            ['item_id' => 9, 'name' => 'Familia Gascón'],
            ['item_id' => 9, 'name' => 'Felino'],
            ['item_id' => 9, 'name' => 'Fond de Cave'],
            ['item_id' => 9, 'name' => 'Gran Reserva'],
            ['item_id' => 9, 'name' => 'Lagarde'],
            ['item_id' => 9, 'name' => 'Las Perdices'],
            ['item_id' => 9, 'name' => 'Luca'],
            ['item_id' => 9, 'name' => 'Luigi Bosca'],
            ['item_id' => 9, 'name' => 'Luna'],
            ['item_id' => 9, 'name' => 'Manos Negras'],
            ['item_id' => 9, 'name' => 'Mariflor'],
            ['item_id' => 9, 'name' => 'Melipal'],
            ['item_id' => 9, 'name' => 'Mendoza'],
            ['item_id' => 9, 'name' => 'Navarro Correas'],
            ['item_id' => 9, 'name' => 'Newen'],
            ['item_id' => 9, 'name' => 'Nicasia'],
            ['item_id' => 9, 'name' => 'Nieto Senetiner'],
            ['item_id' => 9, 'name' => 'Norton'],
            ['item_id' => 9, 'name' => 'Pulenta Estate'],
            ['item_id' => 9, 'name' => 'Punta de Flechas'],
            ['item_id' => 9, 'name' => 'Reservado'],
            ['item_id' => 9, 'name' => 'Rita'],
            ['item_id' => 9, 'name' => 'Roca'],
            ['item_id' => 9, 'name' => 'Rose'],
            ['item_id' => 9, 'name' => 'Ruca Malen'],
            ['item_id' => 9, 'name' => 'Saint Felicien'],
            ['item_id' => 9, 'name' => 'Salentein'],
            ['item_id' => 9, 'name' => 'Santa Julia'],
            ['item_id' => 9, 'name' => 'Septima'],
            ['item_id' => 9, 'name' => 'Susana Balbo'],
            ['item_id' => 9, 'name' => 'Tempranillo'],
            ['item_id' => 9, 'name' => 'Terrazas de Los Andes'],
            ['item_id' => 9, 'name' => 'Tito'],
            ['item_id' => 9, 'name' => 'Trapiche'],
            ['item_id' => 9, 'name' => 'Trumpeter'],
            ['item_id' => 9, 'name' => 'Zuccardi'],
            ['item_id' => 9, 'name' => 'De Cecco'],
            ['item_id' => 9, 'name' => 'Barilla'],
            ['item_id' => 9, 'name' => 'Delverde'],
            //----Marcas Cervezas-----//
            ['item_id' => 10, 'name' => 'Andes'],
            ['item_id' => 10, 'name' => 'Heineken'],
            ['item_id' => 10, 'name' => 'Schenider'],
            //----Marcas Whiskies-----//
            ['item_id' => 11, 'name' => 'Aberlour'],
            ['item_id' => 11, 'name' => 'Benchmark'],
            ['item_id' => 11, 'name' => 'Buchanans'],
            ['item_id' => 11, 'name' => 'Chivas Regal'],
            ['item_id' => 11, 'name' => 'Fireball'],
            ['item_id' => 11, 'name' => 'Glenfiddich'],
            ['item_id' => 11, 'name' => 'Glenlivet'],
            ['item_id' => 11, 'name' => 'Grants'],
            ['item_id' => 11, 'name' => 'J&B'],
            ['item_id' => 11, 'name' => 'Jack Daniels'],
            ['item_id' => 11, 'name' => 'Jameson'],
            ['item_id' => 11, 'name' => 'Jim Beam'],
            ['item_id' => 11, 'name' => 'Johnnie Walker'],
            ['item_id' => 11, 'name' => 'Makers Mark'],
            ['item_id' => 11, 'name' => 'Talisker'],
            ['item_id' => 11, 'name' => 'The Glenlivet'],
            ['item_id' => 11, 'name' => 'The Singleton'],
            ['item_id' => 11, 'name' => 'Vat 69'],
            ['item_id' => 11, 'name' => 'White Horse'],
            ['item_id' => 11, 'name' => 'Wild Turkey'],
            //----Marcas Gaseosas-----//
            ['item_id' => 12, 'name' => 'Coca cola'],
            ['item_id' => 12, 'name' => 'Pepsi'],
            //----Marcas Aguas-----// 
            ['item_id' => 13, 'name' => 'Villa del Sur'],
            ['item_id' => 13, 'name' => 'King'],
            //----Marcas Jugos-----//
            ['item_id' => 14, 'name' => 'Puro Sol'],
            //----Marcas Toallones-----//        
            ['item_id' => 15, 'name' => 'Wine Cup'],
            //----Marcas Cortinas-----//        
            ['item_id' => 16, 'name' => 'Wine Cup'],
            //----Marcas Sabanas-----//
            ['item_id' => 17, 'name' => 'Wine Cup'],
            //----Marcas Acolchados-----//
            ['item_id' => 18, 'name' => 'Wine Cup'],
            //----Marcas Colchones-----//
            ['item_id' => 19, 'name' => 'La Cardeuse'],
            //----Marcas Almohadas-----//
            ['item_id' => 20, 'name' => 'Wine Cup'],
            //----Marcas Vasos-----//
            ['item_id' => 21, 'name' => 'Rona'],
            //----Marcas Copas-----//                               
            ['item_id' => 22, 'name' => 'Bohemia'],
            ['item_id' => 22, 'name' => 'Norton'],
            ['item_id' => 22, 'name' => 'Nadir'],
            //----Marcas Termos-----//        
            ['item_id' => 23, 'name' => 'Sunligth'],
            //----Marcas Platos-----//
            ['item_id' => 24, 'name' => 'Wine Cup'],
            //----Bodega Vinos-----//
            ['item_id' => 25, 'name' => 'Etchart'],
            ['item_id' => 25, 'name' => 'Dante Robino'],
            ['item_id' => 25, 'name' => 'Familia Zuccardi'],
            ['item_id' => 25, 'name' => 'Bodegas Chandon'],
            ['item_id' => 25, 'name' => 'Familia Arizu'],
            //----Linea  Vinos-----//
            ['item_id' => 26, 'name' => 'Malbec'],
            ['item_id' => 26, 'name' => 'Varietales'],
            ['item_id' => 26, 'name' => 'Reserva de familia'],
            //----Año  Vinos-----//
            ['item_id' => 27, 'name' => '2004'],
            ['item_id' => 27, 'name' => '2005'],
            ['item_id' => 27, 'name' => '2006'],
            ['item_id' => 27, 'name' => '2007'],
            ['item_id' => 27, 'name' => '2008'],
            ['item_id' => 27, 'name' => '2009'],
            ['item_id' => 27, 'name' => '2010'],
            ['item_id' => 27, 'name' => '2011'],
            ['item_id' => 27, 'name' => '2012'],
            ['item_id' => 27, 'name' => '2013'],
            ['item_id' => 27, 'name' => '2014'],
            ['item_id' => 27, 'name' => '2015'],
            ['item_id' => 27, 'name' => '2016'],
            ['item_id' => 27, 'name' => '2017'],
            ['item_id' => 27, 'name' => '2018'],
            ['item_id' => 27, 'name' => '2019'],
            //-----Variedad  Vinos-----//
            ['item_id' => 28, 'name' => 'Tinto'],
            ['item_id' => 28, 'name' => 'Blanco'],
            ['item_id' => 28, 'name' => 'Rosado'],
            //-----Varietal  Vinos-----//
            ['item_id' => 29, 'name' => 'Blend'],
            ['item_id' => 29, 'name' => 'Bonarda'],
            ['item_id' => 29, 'name' => 'Cabernet franc'],
            ['item_id' => 29, 'name' => 'Cabernet sauvignon'],
            ['item_id' => 29, 'name' => 'Chardonnay'],
            ['item_id' => 29, 'name' => 'Malbec'],
            ['item_id' => 29, 'name' => 'Malbec rosé'],
            ['item_id' => 29, 'name' => 'Malbec/Cabernet'],
            ['item_id' => 29, 'name' => 'Malbec/Syrah'],
            ['item_id' => 29, 'name' => 'Merlot'],
            ['item_id' => 29, 'name' => 'Pinot noir'],
            ['item_id' => 29, 'name' => 'Sauvignon blanc'],
            ['item_id' => 29, 'name' => 'Semillón'],
            ['item_id' => 29, 'name' => 'Tempranillo'],
            ['item_id' => 29, 'name' => 'Torrontés'],
            //-----Origen  Vinos-----//
            ['item_id' => 30, 'name' => 'Argentina'],
            ['item_id' => 30, 'name' => 'Estados Unidos'],
            ['item_id' => 30, 'name' => 'Portugal'],
            //Color
            // ['item_id' => 8, 'name' => 'Blanco'],
            // ['item_id' => 8, 'name' => 'Negro'],
            // ['item_id' => 8, 'name' => 'Rojo'],
            // ['item_id' => 8, 'name' => 'Azul'],
            // ['item_id' => 8, 'name' => 'Verde'],
            //----Alto Toallones-----//
            ['item_id' => 31, 'name' => '1.5 Mtr.'],
            ['item_id' => 31, 'name' => '1.6 Mtr.'],
            //----Ancho Toallones-----//
            ['item_id' => 32, 'name' => '0.8 Mtr.'],
            ['item_id' => 32, 'name' => '1 Mtr.'],
            //----Alto Cortinas-----// 
            ['item_id' => 33, 'name' => '1 Mtr.'],
            ['item_id' => 33, 'name' => '1.5 Mtr.'],
            ['item_id' => 33, 'name' => '2 Mtr.'],
            ['item_id' => 33, 'name' => '2.1 Mtr.'],
            ['item_id' => 33, 'name' => '2.2 Mtr.'],
            ['item_id' => 33, 'name' => '2.5 Mtr.'],
            //----Ancho Cortinas-----//
            ['item_id' => 34, 'name' => '1 Mtr.'],
            ['item_id' => 34, 'name' => '1.4 Mtr.'],
            ['item_id' => 34, 'name' => '1.9 Mtr.'],
            //----Alto Colchones-----//
            ['item_id' => 35, 'name' => '1.9 Mtr.'],
            ['item_id' => 35, 'name' => '2 Mtr.'],
            //----Ancho Colchones-----//
            ['item_id' => 36, 'name' => '1.4 Mtr.'],
            ['item_id' => 36, 'name' => '1.5 Mtr.'],
            ['item_id' => 36, 'name' => '1.9 Mtr.'],
            ['item_id' => 36, 'name' => '2 Mtr.'],
            //----Alto Almohadas-----//
            ['item_id' => 37, 'name' => '0.4 Mtr.'],
            ['item_id' => 37, 'name' => '0.5 Mtr.'],
            ['item_id' => 37, 'name' => '0.6 Mtr.'],
            //----Ancho Almohadas-----//
            ['item_id' => 38, 'name' => '0.6 Mtr.'],
            ['item_id' => 38, 'name' => '0.7 Mtr.'],
            ['item_id' => 38, 'name' => '0.8 Mtr.'],
            //----Medida Sabanas-----//
            ['item_id' => 39, 'name' => '1 Plaza'],
            ['item_id' => 39, 'name' => '1 1/2 plaza'],
            ['item_id' => 39, 'name' => '2 Plaza'],
            ['item_id' => 39, 'name' => '2 1/2 plaza'],
            //----Medida Acolchados-----//
            ['item_id' => 40, 'name' => '1 Plaza'],
            ['item_id' => 40, 'name' => '1 1/2 plaza'],
            ['item_id' => 40, 'name' => '2 Plaza'],
            ['item_id' => 40, 'name' => '2 1/2 plaza'],
            //----Color Toallones-----//        
            ['item_id' => 41, 'name' => 'Blanco'],
            ['item_id' => 41, 'name' => 'Azul'],
            ['item_id' => 41, 'name' => 'Beige'],
            ['item_id' => 41, 'name' => 'Verde'],
            ['item_id' => 41, 'name' => 'Bordo'],
            //----Color Cortinas-----//        
            ['item_id' => 42, 'name' => 'Hueso'],
            ['item_id' => 42, 'name' => 'Beige'],
            ['item_id' => 42, 'name' => 'Azul'],
            ['item_id' => 42, 'name' => 'Bordo'],
            //----Color Sabanas-----//
            ['item_id' => 43, 'name' => 'Blanco'],
            ['item_id' => 43, 'name' => 'Azul'],
            ['item_id' => 43, 'name' => 'Beige'],
            ['item_id' => 43, 'name' => 'Verde'],
            ['item_id' => 43, 'name' => 'Bordo'],
            //----Color Acolchados-----//
            ['item_id' => 44, 'name' => 'Azul'],
            ['item_id' => 44, 'name' => 'Beige'],
            ['item_id' => 44, 'name' => 'Bordo'],
            //----Tipo de envase Aceite-----//
            ['item_id' => 45, 'name' => 'Botella'],
            ['item_id' => 45, 'name' => 'Lata'],
            //----Tipo de envase Salsa-----//
            ['item_id' => 46, 'name' => 'Botella'],
            ['item_id' => 46, 'name' => 'Doy pack'],
            //----Tipo de envase Vinos-----//
            ['item_id' => 47, 'name' => 'Botella'],
            //----Tipo de envase Cerveza-----//
            ['item_id' => 48, 'name' => 'Botella'],
            ['item_id' => 48, 'name' => 'Lata'],
            //----Unidades por pack Pastas-----//
            ['item_id' => 49, 'name' => '6'],
            ['item_id' => 49, 'name' => '12'],
            ['item_id' => 49, 'name' => '24'],
            //----Unidades por pack Azucar-----//
            ['item_id' => 50, 'name' => '4'],
            ['item_id' => 50, 'name' => '6'],
            ['item_id' => 50, 'name' => '12'],
            //----Unidades por pack Aceite-----//
            ['item_id' => 51, 'name' => '6'],
            ['item_id' => 51, 'name' => '12'],
            //----Unidades por pack Yerba-----//
            ['item_id' => 52, 'name' => '12'],
            ['item_id' => 52, 'name' => '24'],
            //----Unidades por pack Té-----//
            ['item_id' => 53, 'name' => '4'],
            ['item_id' => 53, 'name' => '6'],
            ['item_id' => 53, 'name' => '12'],
            ['item_id' => 53, 'name' => '24'],
            //----Unidades por pack Café-----//
            ['item_id' => 54, 'name' => '6'],
            ['item_id' => 54, 'name' => '12'],
            ['item_id' => 54, 'name' => '24'],
            //----Unidades por pack Latas-----//
            ['item_id' => 55, 'name' => '6'],
            ['item_id' => 55, 'name' => '12'],
            ['item_id' => 55, 'name' => '24'],
            //----Unidades por pack Salsa-----//
            ['item_id' => 56, 'name' => '12'],
            ['item_id' => 56, 'name' => '24'],
            //----Unidades por pack Vinos-----//
            ['item_id' => 57, 'name' => '4'],
            ['item_id' => 57, 'name' => '6'],
            ['item_id' => 57, 'name' => '12'],
            //----Variedad de la infusión Café-----//
            ['item_id' => 58, 'name' => 'Barista'],
            ['item_id' => 58, 'name' => 'Colombia'],
            //----Peso de la unidad Pastas-----//
            ['item_id' => 59, 'name' => '500 Grms.'],
            ['item_id' => 59, 'name' => '1 Kg.'],
            //----Peso de la unidad Azucar-----//
            ['item_id' => 60, 'name' => '500 Grms.'],
            ['item_id' => 60, 'name' => '1 Kg.'],
            //----Peso de la unidad Yerba-----//
            ['item_id' => 61, 'name' => '500 Grms.'],
            ['item_id' => 61, 'name' => '1 Kg.'],
            //----Tipo de Pasta-----//
            ['item_id' => 62, 'name' => 'Spaghetti'],
            ['item_id' => 62, 'name' => 'Fusilli'],
            ['item_id' => 62, 'name' => 'Linguine'],
            ['item_id' => 62, 'name' => 'Penne Rigate'],
            //----Sabor Pasta-----//
            ['item_id' => 63, 'name' => 'Semola'],
            ['item_id' => 63, 'name' => 'Trigo'],
            ['item_id' => 63, 'name' => 'Al huevo'],
            //----Volumen de la unidad Vino-----//
            ['item_id' => 64, 'name' => '187cc'],
            ['item_id' => 64, 'name' => '375cc'],
            ['item_id' => 64, 'name' => '750cc'],
            ['item_id' => 64, 'name' => '1l'],
            //----Volumen de la unidad Whiskie-----//
            ['item_id' => 65, 'name' => '187cc'],
            ['item_id' => 65, 'name' => '375cc'],
            ['item_id' => 65, 'name' => '750cc'],
            ['item_id' => 65, 'name' => '1l'],

        ];
        foreach ($valuesitems as $valuesitem) {
            Valuesitem::create($valuesitem);
        }
    }
}
