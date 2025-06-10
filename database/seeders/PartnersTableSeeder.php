<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            ['nama_partner' => 'PT. PP Properti Tbk.', 'email_partner' => 'headoffice@pp-properti.com', 'no_telfon' => '081559596145', 'alamat' => 'Jl. Letjend. TB. Simatupang No.57 Pasar Rebo, Jakarta 13760 Indonesia', 'deskripsi' => 'Salah satu anak perusahaan BUMN terkemuka PT PP (Persero) Tbk yang mengembangkan tiga lini bisnis yaitu Residensial, Mall dan Edutainment, Hotel yang tersebar di seluruh Indonesia.'],
            ['nama_partner' => 'Global Build Co.', 'email_partner' => 'globuild11@gmail.com', 'no_telfon' => '081559596127', 'alamat' => 'Jl. Letjend. TB. Simatupang No.57 Pasar Rebo, Jakarta 13760 Indonesia', 'deskripsi' => 'Salah satu anak perusahaan BUMN terkemuka PT PP (Persero) Tbk yang mengembangkan tiga lini bisnis yaitu Residensial, Mall dan Edutainment, Hotel yang tersebar di seluruh Indonesia.'],
            ['nama_partner' => 'TechnoArch Design', 'email_partner' => 'technoarch23@gmail.com', 'no_telfon' => '081559596188',  'alamat' => 'Jl. Letjend. TB. Simatupang No.57 Pasar Rebo, Jakarta 13760 Indonesia', 'deskripsi' => 'Salah satu anak perusahaan BUMN terkemuka PT PP (Persero) Tbk yang mengembangkan tiga lini bisnis yaitu Residensial, Mall dan Edutainment, Hotel yang tersebar di seluruh Indonesia.'],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
