<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBotController extends Controller
{
    public function generateMedicalInsights(Request $request)
    {
        $medicalData = $request->input('record');

        $prompt = "Based on this student's medical record, provide a brief summary and health insight in plain language (1-2 sentences):\n\n" . json_encode($medicalData, JSON_PRETTY_PRINT);

        $result = OpenAI::chat()->create([
            'model' => 'gpt-5',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful medical assistant that provides understandable insights from medical records. Do not give diagnoses, only observations.'],
                ['role' => 'user', 'content' => $prompt]
            ],
        ]);

        $response = array_reduce(
            $result->toArray()['choices'],
            fn($carry, $choice) => $carry . $choice['message']['content'],
            ''
        );

        return response()->json(['insight' => $response]);
    }

    public function generateDashboardInsights(Request $request)
    {
        $data = $request->all();

        $prompt = "Generate a short summary based on these health statistics:
            Healthy students: " . (is_array($data['healthy']) ? json_encode($data['healthy']) : $data['healthy']) . "
            UTI cases: " . (is_array($data['uti']) ? json_encode($data['uti']) : $data['uti']) . "
            Drug test positives: " . (is_array($data['drugTest']) ? json_encode($data['drugTest']) : $data['drugTest']) . "
            Leukemia: " . (is_array($data['leukemia']) ? json_encode($data['leukemia']) : $data['leukemia']) . "
            Kidney issues: " . (is_array($data['kidney']) ? json_encode($data['kidney']) : $data['kidney']) . "
            Diabetes: " . (is_array($data['diabetes']) ? json_encode($data['diabetes']) : $data['diabetes']) . "
            Pneumonia: " . (is_array($data['pneumonia']) ? json_encode($data['pneumonia']) : $data['pneumonia']) . "
            TB: " . (is_array($data['tb']) ? json_encode($data['tb']) : $data['tb']) . ".
            Provide a brief insight for the medical staff.";

        $result = OpenAI::chat()->create([
            'model' => 'gpt-5',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a medical data analyst providing brief insights.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $response = array_reduce(
            $result->toArray()['choices'],
            fn($carry, $choice) => $carry . $choice['message']['content'],
            ''
        );

        return response()->json(['insight' => $response]);
    }
}
