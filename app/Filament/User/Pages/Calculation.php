<?php

namespace App\Filament\User\Pages;

use App\Models\Symptom;
use App\Models\Rule;
use App\Models\Disease;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Calculation extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.calculation';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $symptomps = Symptom::all()->toArray();

        $chunks = array_chunk($symptomps, 7);

        $steps = [];
        $inputs = [];
        $counter = 0;

        // Associate each input section
        foreach ($chunks as $key => $chunk) {
            $tempInputs = [];
            foreach ($chunk as $symptom) {
                $input = [
                    TextInput::make('symptom'.$counter)
                        ->default($symptom['id'])
                        ->hidden(),
                    Radio::make('answer'.$counter)
                        ->label($symptom['name'])
                        ->inline()
                        ->required()
                        ->options([
                            '0.2' => '1',
                            '0.4' => '2',
                            '0.6' => '3',
                            '0.8' => '4',
                            '1.0' => '5',
                        ]),
                ];

                $counter++;
                array_push($tempInputs, $input);
            }

            array_push($inputs, $tempInputs);
            $tempInputs = [];
        }

        // Associate the steps with the input
        foreach ($chunks as $key => $chunk) {
            array_push($steps, Step::make($key)
                ->label(null)
                ->schema(array_merge(...$inputs[$key])));
        }

        return $form
            ->schema([
                Wizard::make(
                    $steps
                )
                    ->submitAction(
                        Action::make('submit')
                            ->label('Submit')
                            ->action('submit')
                            ->button()
                    ),
            ])
            ->statePath('data');
    }

    public function submit()
    {
        try {
            $data = $this->data;
    
            // Extract answers from the questionnaire data
            $questionnaireValues = [];
            for ($i = 0; $i < count($data) / 2; $i++) {
                $answerKey = 'answer' . $i;
                $questionnaireValues[] = doubleval($data[$answerKey]);
            }
    
            // Retrieve all symptoms
            $symptoms = Symptom::all();
    
            // Initialize $items array to store symptom values
            $items = [];
            foreach ($symptoms as $key => $symptom) {
                $items[$symptom->id] = [
                    'name' => $symptom->name,
                    'value' => doubleval($questionnaireValues[$key]) * $symptom->belief,
                ];
            }
    
            // Retrieve all diseases and initialize $combine array
            $diseases = Disease::pluck('name', 'id')->map(function ($name) {
                return [$name, 0];
            })->toArray();
    
            // Initialize $combine array with keys same as $diseases
            $diseaseIds = array_keys($diseases);
            $combine = array_fill_keys($diseaseIds, []);
    
            // Initialize $result array to store disease names and scores
            $result = [];
    
            // Process rules and update $combine array
            foreach (Rule::all()->toArray() as $rule) {
                $diseaseId = $rule['disease_id'];
                $symptomId = $rule['symptom_id'];
                
                if (!isset($items[$symptomId])) {
                    continue; // Skip if symptom not found
                }
    
                $value = $items[$symptomId]['value'];
    
                if (empty($combine[$diseaseId])) {
                    $combine[$diseaseId][] = $value;
                } else {
                    $prevValue = end($combine[$diseaseId]);
                    $combine[$diseaseId][] = $prevValue + $value * (1 - $prevValue);
                }
            }
    
            // Calculate scores and populate $result array
            foreach ($diseases as $diseaseId => $diseaseInfo) {
                $scores = $combine[$diseaseId];
                $score = end($scores) * 100;
    
                $result[$diseaseId] = [
                    'name' => $diseaseInfo[0],
                    'score' => $score,
                ];
            }
            //dd($result);
    
            // Find disease with the highest score
            $maxScore = -1;
            $maxScoreDisease = null;
            foreach ($result as $diseaseId => $diseaseInfo) {
                if ($diseaseInfo['score'] > $maxScore) {
                    $maxScore = $diseaseInfo['score'];
                    $maxScoreDisease = $diseaseInfo;
                }
            }

            // If a disease with the highest score is found, assign its name to $disease
            if ($maxScoreDisease !== null) {
                $disease = $maxScoreDisease['name'];
            } else {
                $disease = "Unknown"; // Set default value if no disease is found
            }

            // Output the result
            //dd($disease, $maxScore);
    
            // Send success notification
            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->send();
    
            $this->redirect(route('filament.user.pages.calculation'));
        } catch (\Throwable $th) {
            // Log and send error notification
            dd($th);
            Notification::make()
                ->title('An error occurred while calculating the data')
                ->danger()
                ->send();
        }
    }
    
}
