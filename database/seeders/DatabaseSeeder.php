<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Estimate;
use App\Models\EstimateSection as Section;
use App\Models\EstimateSectionRow as Row;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dev = User::factory()->create([
            'email' => 'dev@outlawz.nl',
            'password' => Hash::make('admin'),
        ]);
        // Create 10 estimates for the developer user
        Estimate::factory()
            ->count(42)
            ->create([
                'user_id' => $dev->id,
                // ... other attributes, if needed ...
            ]);
        User::factory()->create([
            'email' => 'test@test.nl',
            'password' => Hash::make('test'),
        ]);
        $estimate = Estimate::factory()->create([
            'user_id' => $dev->id,
            'name' => 'Lisa tandtechniek',
            'hourly_rate' => 85,
        ]);
        $section = Section::factory()->create([
            'estimate_id' => $estimate->id,
            'name' => 'Design',
            'description' => 'Jop van Outlawz designed de website in Figma.',
            'note' => 'Dit is een notitie.',
        ]);
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Home',
            'description' => 'Overzicht van alle belangrijke onderdelen van het bedrijf, reviews, links naar belangrijke pagina\'s en CTA\'s om contact op te nemen',
            'note' => 'Reviews op de homepage zelf kunnen vullen niet ophalen uit google.',
            'hours' => 6,
        ]);
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Behandelingen',
            'description' => 'Informatie en prijzen',
            'note' => '',
            'hours' => 3,
        ]);

        // Maatwerk
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Maatwerk',
            'description' => 'Informatie en prijzen',
            'note' => '',
            'hours' => 3,
        ]);

        // Voor en na resultaten
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Voor en na resultaten',
            'description' => 'Een soort \'portfolio\' van de resultaten van klanten met reviews erbij als die beschikbaar zijn',
            'note' => '',
            'hours' => 3,
        ]);

        // Over ons
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Over ons',
            'description' => 'Informatie over het bedrijf',
            'note' => '',
            'hours' => 3,
        ]);

        // Team pagina
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Team pagina',
            'description' => 'Informatie over het team',
            'note' => '',
            'hours' => 3,
        ]);

        // Locatie pagina's
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Locatie pagina\'s',
            'description' => 'Landingspagina\'s voor locaties zoals heemskerk en beverwijk.',
            'note' => 'Een template hiervoor maken die herbruikbaar is',
            'hours' => 3,
        ]);

        // Voor tandartsen
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Voor tandartsen',
            'description' => 'Informatie pagina met USP\'s en CTA\'s om contact op te nemen. Focus op NL en NL vakmensen, specialist op locatie',
            'note' => '',
            'hours' => 3,
        ]);

        // FAQ/CTA pagina
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'FAQ/CTA pagina',
            'description' => 'Een overzicht van vragen over verzekering en wat er vergoed wordt etc.',
            'note' => 'Gratis advies gesprek inplannen via een email agenda koppeling, intakes voor nieuwe klanten. Whatsapp koppeling maken en contact',
            'hours' => 3,
        ]);

        // Footer
        $row = Row::factory()->create([
            'estimate_section_id' => $section->id,
            'name' => 'Footer',
            'description' => 'Certificaten in de footer',
            'note' => '',
            'hours' => 0,
        ]);

        $devSection = Section::factory()->create([
            'estimate_id' => $estimate->id,
            'name' => 'Development',
            'description' => 'Douwe van Outlawz developed de website in Laravel.',
            'note' => 'Dit is een notitie.',
        ]);
        $rowsData = [
            [
                'name' => 'Project opzet',
                'description' => 'Installeren van Wordpress, standaard plugins, configuraties etc',
                'hours' => 2.5,
                'note' => '',
            ],
            [
                'name' => 'Home',
                'description' => 'Overzicht van alle belangrijke onderdelen van het bedrijf, reviews, links naar belangrijke pagina\'s en CTA\'s om contact op te nemen',
                'hours' => 8,
                'note' => '',
            ],
            [
                'name' => 'Header',
                'description' => '',
                'hours' => 3,
                'note' => '',
            ],
            [
                'name' => 'Footer',
                'description' => '',
                'hours' => 1.5,
                'note' => '',
            ],
            [
                'name' => 'Behandelingen',
                'description' => '',
                'hours' => 4,
                'note' => '',
            ],
            [
                'name' => 'Maatwerk',
                'description' => '',
                'hours' => 6,
                'note' => '',
            ],
            [
                'name' => 'Voor en na resultaten',
                'description' => '',
                'hours' => 6,
                'note' => '',
            ],
            [
                'name' => 'Team pagina',
                'description' => '',
                'hours' => 4,
                'note' => '',
            ],
            [
                'name' => 'Locatie pagina\'s',
                'description' => '',
                'hours' => 6,
                'note' => '',
            ],
            [
                'name' => 'Voor tandartsen',
                'description' => '',
                'hours' => 2,
                'note' => '',
            ],
            [
                'name' => 'FAQ',
                'description' => '',
                'hours' => 4,
                'note' => '',
            ],
            [
                'name' => 'Contact/CTA pagina',
                'description' => '',
                'hours' => 6,
                'note' => 'Gmail & Whatsapp koppeling is voor mij onbekend terrein -Douwe',
            ],
        ];

        foreach ($rowsData as $rowData) {
            Row::factory()->create([
                'estimate_section_id' => $devSection->id,
                'name' => $rowData['name'],
                'description' => $rowData['description'],
                'note' => $rowData['note'],
                'hours' => $rowData['hours'],
            ]);
        }
    }
}
