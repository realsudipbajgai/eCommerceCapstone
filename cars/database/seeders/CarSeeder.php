<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Corolla',
            'model' => 'LE',
            'year' => '2020',
            'price' => '18000.00',
            'mileage' => '30000.5',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2020 Corolla LE is a        well-maintained sedan that offers a comfortable and reliable driving experience. With only 30,000.5 miles on the odometer, this car has plenty of life left and is ready for its next adventure.</p><p>The exterior of the car is finished in a classic white color that is sure to turn heads. Under the hood, you will find a fuel-efficient gasoline engine that provides plenty of power while still being easy on your wallet at the pump.</p><p>Inside, the car is equipped with all the features you need for a comfortable ride, including air conditioning, power windows and locks, and a great sound system. Don\'t miss your chance to own this fantastic car at an unbeatable price of $18,000.00.</p>',
            'image' => 'corolla_le.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Civic',
            'model' => 'EX',
            'year' => '2019',
            'price' => '17000.00',
            'mileage' => '25000.5',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Civic EX is a sleek and stylish sedan that offers a smooth and comfortable ride. With only 25,000.5 miles on the odometer, this car is in excellent condition and ready to hit the road.</p><p>The black exterior of the car is sure to turn heads, while the fuel-efficient gasoline engine provides plenty of power without breaking the bank at the pump. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>Don\'t miss your chance to own this fantastic car at an unbeatable price of $17,000.00. Whether you\'re commuting to work or taking a road trip with friends, this Civic EX is the perfect car for all your driving needs.</p>',
            'image' => 'civic_ex.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 2,
            'make' => 'Civic',
            'model' => 'Touring',
            'year' => '2019',
            'price' => '24000.00',
            'mileage' => '30000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Civic Touring is a stylish and feature-packed compact car that delivers an enjoyable driving experience. With 30,000.75 miles on the odometer, this car has been well-cared for and is ready to hit the road.</p><p>The silver exterior of the car exudes sophistication, and the gasoline engine provides a perfect balance of performance and efficiency. Inside, you\'ll find leather seats, a premium sound system, and advanced safety features for added peace of mind.</p><p>Priced at $24,000.00, this Civic Touring offers exceptional value for those seeking a modern and well-equipped compact car.</p>',
            'image' => 'civic_touring.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Accord',
            'model' => 'LX',
            'year' => '2018',
            'price' => '16000.00',
            'mileage' => '40000.5',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'accord_lx.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Accord',
            'model' => 'LX',
            'year' => '2018',
            'price' => '16000.00',
            'mileage' => '40000.5',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'accord_lx.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Accord',
            'model' => 'LX',
            'year' => '2018',
            'price' => '16000.00',
            'mileage' => '40000.5',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Accord LX is a reliable and spacious sedan that offers a smooth and comfortable ride. With 40,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $16,000.00, this Accord LX is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'accord_lx.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'CR-V',
            'model' => 'EX-L',
            'year' => '2017',
            'price' => '21000.00',
            'mileage' => '50000.5',
            'color' => 'Green',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 CR-V EX-L is a versatile and reliable SUV that offers a smooth and comfortable ride. With 50,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The green exterior of the car is both eye-catching and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $21,000.00, this CR-V EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with friends, this car has got you covered.</p>',
            'image' => 'crv_exl.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Pilot',
            'model' => 'EX-L',
            'year' => '2016',
            'price' => '22000.00',
            'mileage' => '55000.5',
            'color' => 'Gray',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2016 Pilot EX-L is a spacious and reliable SUV that offers a smooth and comfortable ride. With 55,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The gray exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $22,000.00, this Pilot EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'pilot_exl.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Odyssey',
            'model' => 'EX-L',
            'year' => '2015',
            'price' => '23000.00',
            'mileage' => '60000.5',
            'color' => 'Gold',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2015 Odyssey EX-L is a spacious and reliable minivan that offers a smooth and comfortable ride. With 60,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The gold exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $23,000.00, this Odyssey EX-L is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'odyssey_exl.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Highlander',
            'model' => 'XLE',
            'year' => '2014',
            'price' => '24000.00',
            'mileage' => '65000.5',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2014 Highlander XLE is a spacious and reliable SUV that offers a smooth and comfortable ride. With 65,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The silver exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $24,000.00, this Highlander XLE is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'highlander_xle.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => rand(1, 12),
            'make' => 'Sienna',
            'model' => 'XLE',
            'year' => '2013',
            'price' => '25000.00',
            'mileage' => '70000.5',
            'color' => 'Bronze',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2013 Sienna XLE is a spacious and reliable minivan that offers a smooth and comfortable ride. With 70,000.5 miles on the odometer, this car has been well-maintained and is ready for its next adventure.</p><p>The bronze exterior of the car is both elegant and timeless, while the fuel-efficient gasoline engine provides plenty of power without sacrificing efficiency. The car also features air conditioning, power windows and locks, and a great sound system for your listening pleasure.</p><p>At an unbeatable price of $25,000.00, this Sienna XLE is the perfect car for all your driving needs. Whether you\'re commuting to work or taking a road trip with family, this car has got you covered.</p>',
            'image' => 'sienna_xle.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 5, // Assuming Nissan has ID 2 in the brands table
            'make' => 'Sentra',
            'model' => 'SV',
            'year' => '2017',
            'price' => '15000.00',
            'mileage' => '45000.25',
            'color' => 'Blue',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Nissan Sentra SV is a practical and fuel-efficient compact car that offers a comfortable ride. With 45,000.25 miles on the odometer, this car is in good condition and is perfect for daily commuting.</p><p>The blue exterior of the car looks refreshing, and the gasoline engine provides reliable performance with good fuel economy. The car features modern conveniences like a touchscreen infotainment system and a rearview camera for added convenience.</p><p>Priced at $15,000.00, this Sentra SV is an affordable and reliable choice for anyone looking for a dependable daily driver.</p>',
            'image' => 'nissan_sentra_sv.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 5, // Assuming Nissan has ID 2 in the brands table
            'make' => 'Altima',
            'model' => 'SR',
            'year' => '2019',
            'price' => '20000.00',
            'mileage' => '35000.75',
            'color' => 'Red',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Nissan Altima SR is a stylish and well-equipped midsize sedan that offers a balanced combination of performance and comfort. With 35,000.75 miles on the odometer, this car has been well-maintained and is ready for the road ahead.</p><p>The red exterior of the car adds a sporty touch, while the gasoline engine delivers a smooth and efficient ride. Inside, you\'ll find a spacious cabin with modern features like Apple CarPlay, Android Auto, and advanced safety technologies.</p><p>Priced at $20,000.00, this Altima SR is a great choice for those seeking a reliable and feature-rich sedan.</p>',
            'image' => 'nissan_altima_sr.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 6, // Assuming BMW has ID 5 in the brands table
            'make' => '3 Series',
            'model' => '330i',
            'year' => '2018',
            'price' => '25000.00',
            'mileage' => '40000.50',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 BMW 3 Series 330i is a luxury sports sedan that delivers a thrilling driving experience. With 40,000.50 miles on the odometer, this car is in excellent condition and offers a perfect balance of performance and comfort.</p><p>The black exterior of the car exudes elegance, and the powerful gasoline engine provides responsive acceleration. Inside, you\'ll find a sophisticated interior with premium materials and cutting-edge technology.</p><p>Priced at $25,000.00, this 3 Series 330i is a great choice for those seeking a high-end sedan with dynamic driving capabilities.</p>',
            'image' => 'bmw_3_series_330i.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 6, // Assuming BMW has ID 5 in the brands table
            'make' => 'X5',
            'model' => 'xDrive40i',
            'year' => '2020',
            'price' => '40000.00',
            'mileage' => '25000.25',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2020 BMW X5 xDrive40i is a premium SUV that combines luxury with versatility. With 25,000.25 miles on the odometer, this SUV is in excellent condition and is capable of handling both city driving and off-road adventures.</p><p>The white exterior of the SUV looks sophisticated, and the powerful gasoline engine provides impressive performance. Inside, you\'ll find a spacious and comfortable cabin with advanced features and technology.</p><p>Priced at $40,000.00, this X5 xDrive40i is a great choice for those in need of a high-end SUV with a blend of luxury and practicality.</p>',
            'image' => 'bmw_x5_xdrive40i.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 13, // Assuming Jaguar has ID 8 in the brands table
            'make' => 'XE',
            'model' => 'P300 R-Dynamic',
            'year' => '2019',
            'price' => '35000.00',
            'mileage' => '30000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Jaguar XE P300 R-Dynamic is a luxurious and powerful sports sedan that offers an exhilarating driving experience. With 30,000.75 miles on the odometer, this car is in excellent condition and promises a thrilling ride.</p><p>The silver exterior of the car exudes elegance and sophistication, while the gasoline engine delivers impressive acceleration and handling. Inside, you\'ll find a refined interior with premium materials and advanced technology.</p><p>Priced at $35,000.00, this XE P300 R-Dynamic is a fantastic choice for those seeking a blend of luxury and performance in a sedan.</p>',
            'image' => 'jaguar_xe_p300_rdynamic.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 13, // Assuming Jaguar has ID 8 in the brands table
            'make' => 'F-PACE',
            'model' => 'S',
            'year' => '2020',
            'price' => '45000.00',
            'mileage' => '20000.50',
            'color' => 'Blue',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2020 Jaguar F-PACE S is a high-performance luxury SUV that delivers both power and sophistication. With 20,000.50 miles on the odometer, this SUV is in pristine condition and is ready to take on any adventure.</p><p>The blue exterior of the SUV looks stunning, and the powerful gasoline engine provides thrilling acceleration and driving dynamics. Inside, you\'ll find a spacious and plush interior with advanced features and infotainment.</p><p>Priced at $45,000.00, this F-PACE S is an excellent choice for those in need of a high-end SUV that excels in both performance and comfort.</p>',
            'image' => 'jaguar_fpace_s.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 14, // Assuming Land Rover has ID 9 in the brands table
            'make' => 'Range Rover Sport',
            'model' => 'HSE',
            'year' => '2018',
            'price' => '50000.00',
            'mileage' => '35000.25',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Land Rover Range Rover Sport HSE is a luxury SUV that combines style, performance, and off-road capabilities. With 35,000.25 miles on the odometer, this SUV is in excellent condition and is built to handle both urban roads and challenging terrains.</p><p>The black exterior of the SUV adds a touch of elegance, while the powerful gasoline engine provides exceptional performance and towing capacity. Inside, you\'ll find a spacious and opulent cabin with high-quality materials and advanced technology.</p><p>Priced at $50,000.00, this Range Rover Sport HSE is an outstanding choice for those seeking a premium SUV with unmatched versatility and luxury.</p>',
            'image' => 'landrover_range_rover_sport_hse.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 14, // Assuming Land Rover has ID 9 in the brands table
            'make' => 'Discovery',
            'model' => 'SE',
            'year' => '2020',
            'price' => '55000.00',
            'mileage' => '25000.50',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2020 Land Rover Discovery SE is a premium SUV that excels in both luxury and practicality. With 25,000.50 miles on the odometer, this SUV is in immaculate condition and is designed to accommodate your family adventures.</p><p>The white exterior of the SUV looks sophisticated, and the powerful gasoline engine provides excellent performance on and off the road. Inside, you\'ll find a well-appointed cabin with spacious seating and advanced safety features.</p><p>Priced at $55,000.00, this Discovery SE is an excellent choice for those in need of a versatile and high-end SUV for all their journeys.</p>',
            'image' => 'landrover_discovery_se.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 15, // Assuming Jeep has ID 6 in the brands table
            'make' => 'Wrangler',
            'model' => 'Sport',
            'year' => '2017',
            'price' => '28000.00',
            'mileage' => '40000.75',
            'color' => 'Red',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Jeep Wrangler Sport is a rugged and iconic off-road SUV that can conquer any terrain. With 40,000.75 miles on the odometer, this Wrangler is in great condition and is built for outdoor adventures.</p><p>The red exterior of the SUV adds a sense of excitement, while the powerful gasoline engine provides ample torque for off-road driving. Inside, you\'ll find a no-frills interior with durable materials that are easy to clean after a day in the wilderness.</p><p>Priced at $28,000.00, this Wrangler Sport is an excellent choice for those seeking a capable and adventurous SUV.</p>',
            'image' => 'jeep_wrangler_sport.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 15, // Assuming Jeep has ID 6 in the brands table
            'make' => 'Grand Cherokee',
            'model' => 'Limited',
            'year' => '2019',
            'price' => '35000.00',
            'mileage' => '30000.50',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Jeep Grand Cherokee Limited is a versatile and stylish SUV that provides a smooth and comfortable ride. With 30,000.50 miles on the odometer, this Grand Cherokee is in excellent condition and is perfect for daily commuting and family trips.</p><p>The silver exterior of the SUV looks sleek and modern, while the powerful gasoline engine delivers both efficiency and performance. Inside, you\'ll find a refined cabin with leather seats, a user-friendly infotainment system, and advanced safety features.</p><p>Priced at $35,000.00, this Grand Cherokee Limited is a fantastic choice for those seeking a well-rounded and reliable SUV.</p>',
            'image' => 'jeep_grand_cherokee_limited.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 16, // Assuming Volvo has ID 11 in the brands table
            'make' => 'XC60',
            'model' => 'T5 Inscription',
            'year' => '2018',
            'price' => '32000.00',
            'mileage' => '35000.25',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Volvo XC60 T5 Inscription is a luxurious and safe SUV that offers a comfortable and elegant driving experience. With 35,000.25 miles on the odometer, this XC60 is in excellent condition and is equipped with top-notch safety features.</p><p>The black exterior of the SUV exudes sophistication, while the efficient gasoline engine provides a good balance of power and fuel economy. Inside, you\'ll find a well-designed cabin with premium materials and the latest technology.</p><p>Priced at $32,000.00, this XC60 T5 Inscription is a fantastic choice for those seeking a refined and safety-focused SUV.</p>',
            'image' => 'volvo_xc60_t5_inscription.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 16, // Assuming Volvo has ID 11 in the brands table
            'make' => 'S90',
            'model' => 'T6 Momentum',
            'year' => '2019',
            'price' => '38000.00',
            'mileage' => '30000.50',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Volvo S90 T6 Momentum is a sophisticated and comfortable luxury sedan that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this S90 is in excellent condition and offers an upscale driving experience.</p><p>The white exterior of the sedan looks elegant and modern, while the powerful gasoline engine provides responsive performance. Inside, you\'ll find a spacious and opulent cabin with premium features and a focus on driver comfort.</p><p>Priced at $38,000.00, this S90 T6 Momentum is an outstanding choice for those seeking a luxurious and well-appointed sedan.</p>',
            'image' => 'volvo_s90_t6_momentum.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 17, // Assuming Chevrolet has ID 3 in the brands table
            'make' => 'Malibu',
            'model' => 'LT',
            'year' => '2017',
            'price' => '18000.00',
            'mileage' => '40000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Chevrolet Malibu LT is a practical and efficient midsize sedan that provides a comfortable and reliable ride. With 40,000.75 miles on the odometer, this Malibu is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks sleek and modern, while the gasoline engine delivers a good balance of power and fuel efficiency. Inside, you\'ll find a spacious and comfortable interior with user-friendly features.</p><p>Priced at $18,000.00, this Malibu LT is an excellent choice for those seeking a value-oriented and versatile sedan.</p>',
            'image' => 'chevrolet_malibu_lt.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 17, // Assuming Chevrolet has ID 3 in the brands table
            'make' => 'Equinox',
            'model' => 'Premier',
            'year' => '2019',
            'price' => '22000.00',
            'mileage' => '30000.50',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Chevrolet Equinox Premier is a well-rounded and practical SUV that offers a smooth and comfortable driving experience. With 30,000.50 miles on the odometer, this Equinox is in excellent condition and is a reliable choice for family outings.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine provides sufficient power and decent fuel efficiency. Inside, you\'ll find a spacious and well-designed cabin with modern amenities.</p><p>Priced at $22,000.00, this Equinox Premier is an outstanding choice for those seeking a dependable and feature-packed SUV.</p>',
            'image' => 'chevrolet_equinox_premier.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 10, // Assuming Kia has ID 4 in the brands table
            'make' => 'Optima',
            'model' => 'EX',
            'year' => '2018',
            'price' => '20000.00',
            'mileage' => '35000.25',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2018 Kia Optima EX is a reliable and well-equipped midsize sedan that offers a comfortable ride. With 35,000.25 miles on the odometer, this Optima is in good condition and is perfect for daily commuting.</p><p>The white exterior of the sedan looks elegant, while the gasoline engine provides a balance of performance and fuel efficiency. Inside, you\'ll find a spacious and modern interior with user-friendly features and comfortable seats.</p><p>Priced at $20,000.00, this Optima EX is an excellent choice for those seeking a practical and budget-friendly sedan.</p>',
            'image' => 'kia_optima_ex.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 10, // Assuming Kia has ID 4 in the brands table
            'make' => 'Sorento',
            'model' => 'SX',
            'year' => '2019',
            'price' => '28000.00',
            'mileage' => '30000.50',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Kia Sorento SX is a versatile and spacious SUV that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this Sorento is in great condition and is perfect for family adventures.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine delivers ample power and decent fuel efficiency. Inside, you\'ll find a roomy and comfortable cabin with modern features and third-row seating.</p><p>Priced at $28,000.00, this Sorento SX is an excellent choice for those seeking a reliable and well-equipped SUV.</p>',
            'image' => 'kia_sorento_sx.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 3, // Assuming Ford has ID 7 in the brands table
            'make' => 'Fusion',
            'model' => 'SE',
            'year' => '2017',
            'price' => '18000.00',
            'mileage' => '40000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Ford Fusion SE is a practical and efficient midsize sedan that offers a comfortable ride. With 40,000.75 miles on the odometer, this Fusion is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks sleek and modern, while the gasoline engine delivers a good balance of power and fuel efficiency. Inside, you\'ll find a spacious and comfortable interior with user-friendly features.</p><p>Priced at $18,000.00, this Fusion SE is an excellent choice for those seeking a reliable and budget-friendly sedan.</p>',
            'image' => 'ford_fusion_se.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 3, // Assuming Ford has ID 7 in the brands table
            'make' => 'Escape',
            'model' => 'SEL',
            'year' => '2019',
            'price' => '22000.00',
            'mileage' => '30000.50',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Ford Escape SEL is a versatile and practical SUV that provides a smooth and enjoyable driving experience. With 30,000.50 miles on the odometer, this Escape is in excellent condition and is perfect for daily commuting and family trips.</p><p>The black exterior of the SUV looks stylish, while the gasoline engine provides sufficient power and decent fuel efficiency. Inside, you\'ll find a spacious and well-designed cabin with modern amenities and comfortable seating.</p><p>Priced at $22,000.00, this Escape SEL is an excellent choice for those seeking a reliable and feature-packed SUV.</p>',
            'image' => 'ford_escape_sel.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 9, // Assuming Hyundai has ID 10 in the brands table
            'make' => 'Elantra',
            'model' => 'SE',
            'year' => '2017',
            'price' => '15000.00',
            'mileage' => '40000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Hyundai Elantra SE is a practical and reliable compact sedan that offers a comfortable ride. With 40,000.75 miles on the odometer, this Elantra is in good condition and is perfect for daily commuting.</p><p>The silver exterior of the sedan looks modern and sleek, while the gasoline engine delivers a good balance of performance and fuel efficiency. Inside, you\'ll find a spacious and well-appointed interior with user-friendly features.</p><p>Priced at $15,000.00, this Elantra SE is an excellent choice for those seeking a budget-friendly and dependable sedan.</p>',
            'image' => 'hyundai_elantra_se.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 9, // Assuming Hyundai has ID 10 in the brands table
            'make' => 'Tucson',
            'model' => 'Limited',
            'year' => '2019',
            'price' => '25000.00',
            'mileage' => '30000.50',
            'color' => 'White',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Hyundai Tucson Limited is a versatile and comfortable SUV that provides a smooth and enjoyable ride. With 30,000.50 miles on the odometer, this Tucson is in great condition and is perfect for family outings and road trips.</p><p>The white exterior of the SUV looks sophisticated, while the gasoline engine delivers both efficiency and performance. Inside, you\'ll find a spacious and well-designed cabin with modern amenities and a user-friendly infotainment system.</p><p>Priced at $25,000.00, this Tucson Limited is an excellent choice for those seeking a reliable and feature-packed SUV.</p>',
            'image' => 'hyundai_tucson_limited.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 18, // Assuming Dodge has ID 5 in the brands table
            'make' => 'Charger',
            'model' => 'R/T',
            'year' => '2017',
            'price' => '28000.00',
            'mileage' => '40000.75',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Dodge Charger R/T is a powerful and stylish muscle car that offers an exhilarating driving experience. With 40,000.75 miles on the odometer, this Charger is in good condition and is sure to turn heads wherever you go.</p><p>The black exterior of the car exudes attitude and performance, while the robust gasoline engine delivers impressive acceleration and speed. Inside, you\'ll find a spacious and driver-oriented cabin with modern features and technology.</p><p>Priced at $28,000.00, this Charger R/T is an excellent choice for those seeking a blend of performance and style in a sedan.</p>',
            'image' => 'dodge_charger_rt.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 18, // Assuming Dodge has ID 5 in the brands table
            'make' => 'Durango',
            'model' => 'GT',
            'year' => '2019',
            'price' => '32000.00',
            'mileage' => '30000.50',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Dodge Durango GT is a spacious and powerful SUV that provides a comfortable and thrilling ride. With 30,000.50 miles on the odometer, this Durango is in excellent condition and is perfect for family adventures.</p><p>The silver exterior of the SUV looks modern and refined, while the gasoline engine provides ample power for towing and highway driving. Inside, you\'ll find a roomy and well-appointed cabin with advanced features and third-row seating.</p><p>Priced at $32,000.00, this Durango GT is an outstanding choice for those seeking a capable and well-equipped SUV.</p>',
            'image' => 'dodge_durango_gt.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 19, // Assuming Lexus has ID 8 in the brands table
            'make' => 'ES 350',
            'model' => 'Base',
            'year' => '2017',
            'price' => '28000.00',
            'mileage' => '40000.75',
            'color' => 'Silver',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2017 Lexus ES 350 Base is a luxurious and comfortable sedan that offers a smooth and refined driving experience. With 40,000.75 miles on the odometer, this ES 350 is in excellent condition and is perfect for daily commuting and long drives.</p><p>The silver exterior of the sedan looks elegant and sophisticated, while the powerful gasoline engine delivers a quiet and smooth performance. Inside, you\'ll find a lavishly appointed cabin with high-quality materials and advanced technology.</p><p>Priced at $28,000.00, this ES 350 Base is an outstanding choice for those seeking a premium and reliable sedan with a focus on comfort and luxury.</p>',
            'image' => 'lexus_es_350_base.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('cars')->insert([
            'category_id' => rand(1, 4),
            'brand_id' => 19, // Assuming Lexus has ID 8 in the brands table
            'make' => 'RX 350',
            'model' => 'F Sport',
            'year' => '2019',
            'price' => '40000.00',
            'mileage' => '30000.50',
            'color' => 'Black',
            'fuel_type' => 'Gasoline',
            'description' => '<p>This 2019 Lexus RX 350 F Sport is a luxurious and sporty SUV that provides a comfortable and thrilling ride. With 30,000.50 miles on the odometer, this RX 350 is in excellent condition and is perfect for both urban driving and road trips.</p><p>The black exterior of the SUV looks modern and sleek, while the powerful gasoline engine provides excellent performance and handling. Inside, you\'ll find a well-crafted and tech-savvy cabin with ample space and premium amenities.</p><p>Priced at $40,000.00, this RX 350 F Sport is an excellent choice for those seeking a high-end and dynamic SUV that stands out from the crowd.</p>',
            'image' => 'lexus_rx_350_f_sport.jpg',
            'is_deleted' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
    }
}
