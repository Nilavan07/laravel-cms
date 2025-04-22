<?php
namespace Database\Factories;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CertificateFactory extends Factory
{
    protected $model = Certificate::class;

    public function definition()
    {
        
        $dir = storage_path('app/public/certificates');
        if (! File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $imagePath = $this->faker->optional(0.6)
            ->image($dir, 400, 300, null, false);

        return [
            'name'         => $this->faker->sentence(3),
            'issuer'       => $this->faker->company(),
            'date_awarded' => $this->faker->date('Y-m-d'),
            'description'  => $this->faker->optional()->paragraph(),
            'image'        => $imagePath,
        ];
    }
}
