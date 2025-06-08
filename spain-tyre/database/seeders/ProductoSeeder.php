<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\Neumatico;
use App\Models\ProductoMontaje;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Neumaticos de coche

        $neumatico1 = Articulo::create([
            'nombre' => 'Michelin Pilot Sport 4',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático de verano de alto rendimiento',
            'precio' => 120.50,
            'stock' => 50,
            'url_imagen' => 'images/articulos/neumaticos/michelin_pilot_sport_4_205_55_16.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico1->id,
            'modelo' => 'Pilot Sport 4',
            'ancho' => 205,
            'perfil' => 55,
            'diametro' => 16,
            'indice_carga' => 91,
            'indice_velocidad' => 'V',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Verano',
            'ruido_db' => '71dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2023-01-15'
        ]);

        $neumatico2 = Articulo::create([
            'nombre' => 'Pirelli P Zero',
            'marca' => 'Pirelli',
            'descripcion' => 'Neumático de verano para coches deportivos',
            'precio' => 150.00,
            'stock' => 30,
            'url_imagen' => 'images/articulos/neumaticos/pirelli_p_zero_225_40_18.jpg',
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico2->id,
            'modelo' => 'P Zero',
            'ancho' => 225,
            'perfil' => 40,
            'diametro' => 18,
            'indice_carga' => 92,
            'indice_velocidad' => 'Y',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Verano',
            'ruido_db' => '73dB',
            'consumo' => 'C',
            'agarre' => 'B',
            'fecha_fabricacion' => '2025-06-21'
        ]);

        $neumatico3 = Articulo::create([
            'nombre' => 'Continental PremiumContact 6',
            'marca' => 'Continental',
            'descripcion' => 'Neumático de verano para alto rendimiento y confort',
            'precio' => 153.00,
            'stock' => 5,
            'url_imagen' => 'images/articulos/neumaticos/continental_premiumcontact_6_235_45_18.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico3->id,
            'modelo' => 'PremiumContact 6',
            'ancho' => 235,
            'perfil' => 45,
            'diametro' => 18,
            'indice_carga' => 98,
            'indice_velocidad' => 'Y',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Verano',
            'ruido_db' => '72dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2025-06-21'
        ]);

        $neumatico4 = Articulo::create([
            'nombre' => 'Goodyear EfficientGrip Performance 2',
            'marca' => 'Goodyear',
            'descripcion' => 'Neumático de verano para mayor eficiencia y duración',
            'precio' => 81.00,
            'stock' => 35,
            'url_imagen' => 'images/articulos/neumaticos/goodyear_efficientgrip_performance_2_205_55_16.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico4->id,
            'modelo' => 'EfficientGrip Performance 2',
            'ancho' => 205,
            'perfil' => 55,
            'diametro' => 16,
            'indice_carga' => 91,
            'indice_velocidad' => 'V',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Verano',
            'ruido_db' => '69dB',
            'consumo' => 'B',
            'agarre' => 'A',
            'fecha_fabricacion' => '2024-04-10'
        ]);

        $neumatico5 = Articulo::create([
            'nombre' => 'Bridgestone Blizzak LM005',
            'marca' => 'Bridgestone',
            'descripcion' => 'Neumático de invierno para máxima seguridad en frío',
            'precio' => 157.50,
            'stock' => 45,
            'url_imagen' => 'images/articulos/neumaticos/bridgestone_blizzak_lm005_225_50_17.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico5->id,
            'modelo' => 'Blizzak LM005 DRIVEGUARD',
            'ancho' => 225,
            'perfil' => 50,
            'diametro' => 17,
            'indice_carga' => 98,
            'indice_velocidad' => 'V',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Invierno',
            'ruido_db' => '71dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2024-11-05'
        ]);

        $neumatico6 = Articulo::create([
            'nombre' => 'Pirelli Cinturato P7',
            'marca' => 'Pirelli',
            'descripcion' => 'Neumático eco-sostenible para coches de gama media',
            'precio' => 105.25,
            'stock' => 30,
            'url_imagen' => 'images/articulos/neumaticos/pirelli_cinturato_p7_225_45_17.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico6->id,
            'modelo' => 'Cinturato P7',
            'ancho' => 225,
            'perfil' => 45,
            'diametro' => 17,
            'indice_carga' => 94,
            'indice_velocidad' => 'Y',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'Verano',
            'ruido_db' => '70dB',
            'consumo' => 'A',
            'agarre' => 'B',
            'fecha_fabricacion' => '2023-07-22'
        ]);

        $neumatico7 = Articulo::create([
            'nombre' => 'Michelin CrossClimate 2',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático para todas las estaciones con excelente agarre',
            'precio' => 100.00,
            'stock' => 38,
            'url_imagen' => 'images/articulos/neumaticos/michelin_crossclimate_2_205_55_16.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumatico7->id,
            'modelo' => 'CrossClimate 2',
            'ancho' => 205,
            'perfil' => 55,
            'diametro' => 16,
            'indice_carga' => 91,
            'indice_velocidad' => 'V',
            'tipo_vehiculo' => 'Turismo',
            'estacion' => 'All Season',
            'ruido_db' => '69dB',
            'consumo' => 'C',
            'agarre' => 'B',
            'fecha_fabricacion' => '2025-02-15'
        ]);

        //Neumáticos de furgoneta

        $neumaticoF1 = Articulo::create([
            'nombre' => 'Michelin Agilis 51',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático para furgonetas, alta durabilidad y carga',
            'precio' => 186.00,
            'stock' => 25,
            'url_imagen' => 'images/articulos/neumaticos/michelin_agilis_51_215_65_15C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF1->id,
            'modelo' => 'Agilis 51 SNOW-ICE',
            'ancho' => 215,
            'perfil' => 65,
            'diametro' => '15C',
            'indice_carga' => '104/102',
            'indice_velocidad' => 'T',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '71dB',
            'consumo' => 'D',
            'agarre' => 'A',
            'fecha_fabricacion' => '2024-05-10'
        ]);

        $neumaticoF2 = Articulo::create([
            'nombre' => 'Continental Vanco 2',
            'marca' => 'Continental',
            'descripcion' => 'Neumático resistente para furgonetas, ideal para cargas pesadas',
            'precio' => 136.00,
            'stock' => 30,
            'url_imagen' => 'images/articulos/neumaticos/continental_vanco_2_175_75_16C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF2->id,
            'modelo' => 'Vanco 2',
            'ancho' => 175,
            'perfil' => 75,
            'diametro' => '16C',
            'indice_carga' => '101/99',
            'indice_velocidad' => 'R',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '72dB',
            'consumo' => 'D',
            'agarre' => 'C',
            'fecha_fabricacion' => '2025-01-20'
        ]);

        $neumaticoF3 = Articulo::create([
            'nombre' => 'Goodyear Cargo Vector 2',
            'marca' => 'Goodyear',
            'descripcion' => 'Neumático de invierno para furgonetas con alta tracción',
            'precio' => 171.50,
            'stock' => 20,
            'url_imagen' => 'images/articulos/neumaticos/goodyear_cargo_vector_2_215_60_17C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF3->id,
            'modelo' => 'Cargo Vector 2',
            'ancho' => 215,
            'perfil' => 60,
            'diametro' => '17C',
            'indice_carga' => '109/107T',
            'indice_velocidad' => 'R',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '73dB',
            'consumo' => 'C',
            'agarre' => 'B',
            'fecha_fabricacion' => '2023-12-15'
        ]);

        $neumaticoF4 = Articulo::create([
            'nombre' => 'Bridgestone Duravis R674',
            'marca' => 'Bridgestone',
            'descripcion' => 'Neumático para furgonetas, muy resistente y fiable para uso profesional',
            'precio' => 188.50,
            'stock' => 27,
            'url_imagen' => 'images/articulos/neumaticos/bridgestone_duravis_225_65_16.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF4->id,
            'modelo' => 'Duravis R674',
            'ancho' => 225,
            'perfil' => 65,
            'diametro' => 16,
            'indice_carga' => 112,
            'indice_velocidad' => 'R',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '72dB',
            'consumo' => 'B',
            'agarre' => 'A',
            'fecha_fabricacion' => '2024-08-30'
        ]);

        $neumaticoF5 = Articulo::create([
            'nombre' => 'Pirelli Carrier All Season',
            'marca' => 'Pirelli',
            'descripcion' => 'Neumático para furgonetas con buen rendimiento en todas las estaciones',
            'precio' => 190.00,
            'stock' => 22,
            'url_imagen' => 'images/articulos/neumaticos/pirelli_carrier_all_season_235_65_16C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF5->id,
            'modelo' => 'Carrier All Season',
            'ancho' => 235,
            'perfil' => 65,
            'diametro' => '16C',
            'indice_carga' => 115,
            'indice_velocidad' => 'R',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '70dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2025-03-10'
        ]);

        $neumaticoF6 = Articulo::create([
            'nombre' => 'Michelin Agilis CrossClimate',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático para furgonetas, todas estaciones con gran durabilidad',
            'precio' => 256.00,
            'stock' => 28,
            'url_imagen' => 'images/articulos/neumaticos/michelin_agilis_crossclimate_225_55_17C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoF6->id,
            'modelo' => 'Agilis CrossClimate',
            'ancho' => 225,
            'perfil' => 55,
            'diametro' => '17C',
            'indice_carga' => '109/107',
            'indice_velocidad' => 'H',
            'tipo_vehiculo' => 'Furgoneta',
            'estacion' => 'All Season',
            'ruido_db' => '73dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2024-07-18'
        ]);

        //Neumáticos de camión

        $neumaticoC1 = Articulo::create([
            'nombre' => 'Michelin X Multi D',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático de dirección para camiones, alta durabilidad y tracción',
            'precio' => 687.08,
            'stock' => 15,
            'url_imagen' => 'images/articulos/neumaticos/michelin_x_multi_d_315_80_22_5.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC1->id,
            'modelo' => 'X Multi D',
            'ancho' => 315,
            'perfil' => 80,
            'diametro' => 22.5,
            'indice_carga' => '156L/154M',
            'indice_velocidad' => 'X',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '75dB',
            'consumo' => 'D',
            'agarre' => 'B',
            'fecha_fabricacion' => '2024-11-10'
        ]);

        $neumaticoC2 = Articulo::create([
            'nombre' => 'Bridgestone V-STEER MIX',
            'marca' => 'Bridgestone',
            'descripcion' => 'Neumático para eje de tracción en camiones, excelente agarre y durabilidad',
            'precio' => 518.09,
            'stock' => 10,
            'url_imagen' => 'images/articulos/neumaticos/bridgestone_v-steer_315_70_22_5.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC2->id,
            'modelo' => 'V-STEER MIX',
            'ancho' => 315,
            'perfil' => 70,
            'diametro' => 22.5,
            'indice_carga' => '152/148M',
            'indice_velocidad' => 'L',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '78db',
            'consumo' => 'E',
            'agarre' => 'C',
            'fecha_fabricacion' => '2025-02-05'
        ]);

        // Neumático camión 3
        $neumaticoC3 = Articulo::create([
            'nombre' => 'Michelin X LINE ENERGY T',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático para remolque, alta resistencia y durabilidad',
            'precio' => 661.67,
            'stock' => 12,
            'url_imagen' => 'images/articulos/neumaticos/michelin_x_line_energy_t_385_65_22_5.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC3->id,
            'modelo' => 'X LINE ENERGY T',
            'ancho' => 385,
            'perfil' => 65,
            'diametro' => 22.5,
            'indice_carga' => 160,
            'indice_velocidad' => 'K',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '69dB',
            'consumo' => 'A',
            'agarre' => 'B',
            'fecha_fabricacion' => '2023-09-12'
        ]);

        $neumaticoC4 = Articulo::create([
            'nombre' => 'Bridgestone M-STEER 001',
            'marca' => 'Bridgestone',
            'descripcion' => 'Neumático para eje dirección, alta duración y estabilidad',
            'precio' => 574.77,
            'stock' => 14,
            'url_imagen' => 'images/articulos/neumaticos/bridgestone_m_steer_001_315_80_22_5.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC4->id,
            'modelo' => 'M-STEER 001',
            'ancho' => 315,
            'perfil' => 80,
            'diametro' => 22.5,
            'indice_carga' => '156/150K',
            'indice_velocidad' => 'M',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '69dB',
            'consumo' => 'C',
            'agarre' => 'B',
            'fecha_fabricacion' => '2024-12-01'
        ]);

        $neumaticoC5 = Articulo::create([
            'nombre' => 'Pirelli Carrier Winter',
            'marca' => 'Pirelli',
            'descripcion' => 'Neumático para camionetas, alta eficiencia y seguridad en invierno',
            'precio' => 184.00,
            'stock' => 9,
            'url_imagen' => 'images/articulos/neumaticos/pirelli_carrier_winter_205_65_16C.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC5->id,
            'modelo' => 'Carrier Winter',
            'ancho' => 205,
            'perfil' => 65,
            'diametro' => '16C',
            'indice_carga' => '107/105T',
            'indice_velocidad' => 'T',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '73dB',
            'consumo' => 'C',
            'agarre' => 'A',
            'fecha_fabricacion' => '2025-03-15'
        ]);

        $neumaticoC6 = Articulo::create([
            'nombre' => 'Michelin X Line Energy Z',
            'marca' => 'Michelin',
            'descripcion' => 'Neumático para ejes de dirección, ahorro de combustible y durabilidad',
            'precio' => 696.76,
            'stock' => 2,
            'url_imagen' => 'images/articulos/neumaticos/michelin_x_line_energy_z_315_80_22_5.jpg'
        ]);

        Neumatico::create([
            'id_neumatico' => $neumaticoC6->id,
            'modelo' => 'X Line Energy Z',
            'ancho' => 315,
            'perfil' => 80,
            'diametro' => 22.5,
            'indice_carga' => '156/150L',
            'indice_velocidad' => 'L',
            'tipo_vehiculo' => 'Camion',
            'estacion' => 'All Season',
            'ruido_db' => '69dB',
            'consumo' => 'B',
            'agarre' => 'B',
            'fecha_fabricacion' => '2024-06-20'
        ]);

        //Productos de montaje

        $manometro = Articulo::create([
        'nombre' => 'Manómetro EURODAINU',
        'marca' => 'Michelin',
        'descripcion' => 'Manómetro de alta precisión para neumáticos',
        'precio' => 60.50,
        'stock' => 100,
        'url_imagen' => 'images/articulos/productosMontaje/manometro_eurodainu.jpg'
         ]);

        ProductoMontaje::create([
            'id_producto_montaje' => $manometro->id,
            'categoria' => 'Manómetro'
        ]);

        // Válvula
        $valvula = Articulo::create([
            'nombre' => 'Válvula de Neumático',
            'marca' => 'TIPTOP',
            'descripcion' => 'Válvula estándar para neumáticos de turismos y furgonetas',
            'precio' => 1.30,
            'stock' => 500,
            'url_imagen' => 'images/articulos/montaje/valvula_tiptop.jpg'
        ]);

        ProductoMontaje::create([
            'id_producto_montaje' => $valvula->id,
            'categoria' => 'Válvula'
        ]);

        // Contrapeso
        $contrapeso = Articulo::create([
            'nombre' => 'Contrapesos para Ruedas',
            'marca' => 'SIO',
            'descripcion' => 'Tiras de contrapesos adhesivos para equilibrar ruedas',
            'precio' => 3.20,
            'stock' => 500,
            'url_imagen' => 'images/articulos/montaje/contrapesos_sio.jpg'
        ]);

        ProductoMontaje::create([
            'id_producto_montaje' => $contrapeso->id,
            'categoria' => 'Contrapeso'
        ]);

    }
}
