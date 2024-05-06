<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Disease::insert([
            [
                'name' => 'Anorexia Nervosa',
            ],
            [
                'name' => 'Bulimia Nervosa',
            ],
            [
                'name' => 'Binge Eating Disorder',
            ],
            [
                'name' => 'ARFID',
            ],
        ]);

        Symptom::insert([
            [
                'name' => 'Extreme weight loss that is not in line with weight standards',
                'belief' => 0.9,
            ],
            [
                'name' => 'Frequently skipping meals and making excuses not to eat',
                'belief' => 0.5,
            ],
            [
                'name' => 'Enjoys cooking food for others but doesn\'t eat it herself',
                'belief' => 0.5,
            ],
            [
                'name' => 'Reluctant to eat in public',
                'belief' => 0.5,
            ],
            [
                'name' => 'Only eat certain foods',
                'belief' => 0.8,
            ],
            [
                'name' => 'Having excessive fear of weight gain',
                'belief' => 0.9,
            ],
            [
                'name' => 'Have a habit of weighing yourself repeatedly',
                'belief' => 0.9,
            ],
            [
                'name' => 'Often look in the mirror to find your own shortcomings',
                'belief' => 0.9,
            ],
            [
                'name' => 'Often complains of being overweight where others think it is not the case',
                'belief' => 0.9,
            ],
            [
                'name' => 'Tends to lie about how much food has been consumed',
                'belief' => 0.8,
            ],
            [
                'name' => 'Very concerned with weight and body shape',
                'belief' => 0.9,
            ],
            [
                'name' => 'Always think negatively of their own body shape',
                'belief' => 0.9,
            ],
            [
                'name' => 'Fear of being fat or feeling overweight',
                'belief' => 0.6,
            ],
            [
                'name' => 'Often get out of control when eating, such as continuing to eat until your stomach hurts or eating excessive portions',
                'belief' => 0.9,
            ],
            [
                'name' => 'Frequent rush to the bathroom after meals',
                'belief' => 0.5,
            ],
            [
                'name' => 'Forcing oneself to vomit, especially by inserting a finger into the esophagus',
                'belief' => 0.9,
            ],
            [
                'name' => 'Exercising excessively',
                'belief' => 0.9,
            ],
            [
                'name' => 'Using laxatives, diuretics, or enemas after meals',
                'belief' => 0,
            ],
            [
                'name' => 'Using supplements or herbal products for weight loss',
                'belief' => 0.6,
            ],
            [
                'name' => 'Have cuts, scars or calluses on knuckles or hands',
                'belief' => 0.5,
            ],
            [
                'name' => 'Eating large meals over a period of time such as a 2-hour period',
                'belief' => 0.9,
            ],
            [
                'name' => 'Chews much faster than normal people',
                'belief' => 0.8,
            ],
            [
                'name' => 'Eating to the point of feeling too full and making your stomach growl',
                'belief' => 0.9,
            ],
            [
                'name' => 'Can eat large portions even when not hungry',
                'belief' => 0.9,
            ],
            [
                'name' => 'Eating secretly because she was embarrassed by the amount of food.',
                'belief' => 0.8,
            ],
            [
                'name' => 'Feeling disgusted, depressed, ashamed, upset or guilty about yourself after eating',
                'belief' => 0.9,
            ],
            [
                'name' => 'Frequent dieters but find it difficult to stick to a diet and lose weight',
                'belief' => 0.9,
            ],
            [
                'name' => 'Hoarding food',
                'belief' => 0.6,
            ],
            [
                'name' => 'Feeling sensitive, upset or angry when talking about food or hearing about body shaming',
                'belief' => 0.8,
            ],
            [
                'name' => 'Having feelings of anxiety, hopelessness, and low self-confidence',
                'belief' => 0.9,
            ],
            [
                'name' => 'Sudden or severe restriction of the type or amount of food eaten',
                'belief' => 0.9,
            ],
            [
                'name' => 'Will only eat foods with a certain texture',
                'belief' => 0.9,
            ],
            [
                'name' => 'Vomiting while eating, or fear of choking',
                'belief' => 0.6,
            ],
            [
                'name' => 'Decrease in appetite or interest in food',
                'belief' => 0.6,
            ],
            [
                'name' => 'A small number of preferred foods that decrease over time (i.e. pick and choose foods that get worse)',
                'belief' => 0.9,
            ],
            [
                'name' => 'No body image anxiety or fear of weight gain',
                'belief' => 0.9,
            ],
        ]);
    }
}
