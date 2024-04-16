<?php

namespace App\Http\Controllers;

use App\Models\Suhu;
use App\Models\Ppm;
use App\Models\Ph;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function checkThresholds()
    {
        // Check suhu
        $latestSuhu = Suhu::latest()->first();
        if ($latestSuhu) {
            if ($latestSuhu->suhu < $latestSuhu->parameter_bawah || $latestSuhu->suhu > $latestSuhu->parameter_atas) {
                $this->createNotification('suhu', 'Nilai suhu telah melewati batas parameter.');
            }
        }

        // Check ppm
        $latestPpm = Ppm::latest()->first();
        if ($latestPpm) {
            if ($latestPpm->ppm < $latestPpm->parameter_bawah || $latestPpm->ppm > $latestPpm->parameter_atas) {
                $this->createNotification('ppm', 'Nilai ppm telah melewati batas parameter.');
            }
        }

        // Check ph
        $latestPh = Ph::latest()->first();
        if ($latestPh) {
            if ($latestPh->ph < $latestPh->parameter_bawah || $latestPh->ph > $latestPh->parameter_atas) {
                $this->createNotification('ph', 'Nilai pH telah melewati batas parameter.');
            }
        }

        return response()->json(['message' => 'Thresholds checked successfully.']);
    }

    private function createNotification($type, $message)
    {
        Notification::create([
            'type' => $type,
            'message' => $message,
        ]);
    }
}
