<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$limit = 20; //batasan berapa banyak data
		$faker = Faker::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('jaminan')->insert([ //mengisi datadi database

				'tgl_kirim' => $faker->dateTimeThisCentury()->format('Y-m-d'),
				'bank_penerbit'=> '01',
				'alamat_bank_penerbit'=> $faker->address,
				'nomor_jaminan'=>$faker->randomNumber($nbDigits = NULL, $strict = false),
				'nomor_ref'=> '',
				'jenis_jaminan'=> '01',
				'jenis_produk'=> '1',	
				'beneficary'=> 'PT. PLN',
				'unit_pengguna'=> $faker->city,
				'applicant'=> $faker->name,
				'no_kontrak'=> $faker->randomNumber($nbDigits = NULL, $strict = false),
				'uraian_pekerjaan'=> '',
				'currency'=> 'USD',
				'nilai_jaminan'=> '100000',
				'tgl_terbit'=> $faker->dateTimeThisCentury()->format('Y-m-d'),
				'tgl_berlaku'=> $faker->dateTimeThisCentury()->format('Y-m-d'),
				'tgl_berakhir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
				'tgl_claim'=> $faker->dateTimeThisCentury()->format('Y-m-d'),
				'nama_file_jaminan'=> 'file.pdf',
				'nama_user'=> $faker->name,
				'email'=> $faker->email,
				'status'=>'0',
            ]);
		}
    }
}
