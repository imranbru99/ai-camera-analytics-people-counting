<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Cameras;
use App\Models\PeopleCounting;
use App\Models\SafetyIncident;
use App\Models\Attendance;
use App\Models\SaaSBusinessEngine;

class AutomationService
{
    public function handleAutomationRules()
    {
        // Check for offline cameras and notify site manager
        $offlineCameras = Cameras::where('status', 'offline')->get();
        foreach ($offlineCameras as $camera) {
            $siteManagerEmail = User::find(1)->email; // Assuming site manager is the first user
            Mail::to($siteManagerEmail)->send(new CameraOfflineNotification($camera));
        }

        // Check for occupancy exceeding limit and create occupancy alert
        $occupancyLimit = config('ai-engine.occupancy_limit');
        $peopleCountings = PeopleCounting::where('count', '>', $occupancyLimit)->get();
        foreach ($peopleCountings as $peopleCounting) {
            Mail::to($siteManagerEmail)->send(new OccupancyAlertNotification($peopleCounting));
        }

        // Check for PPE compliance event and notify safety officer
        $ppeComplianceEvents = SafetyIncident::where('ppe_compliance', '1')->get();
        foreach ($ppeComplianceEvents as $ppeComplianceEvent) {
            Mail::to(User::find(2)->email)->send(new PPEComplianceNotification($ppeComplianceEvent));
        }

        // Check for attendance device synchronization issues and notify HR administrator
        $attendanceDeviceIssues = Attendance::where('synchronization_status', 'failed')->get();
        foreach ($attendanceDeviceIssues as $attendanceDeviceIssue) {
            Mail::to(User::find(3)->email)->send(new AttendanceDeviceNotification($attendanceDeviceIssue));
        }

        // Check for subscription usage reaching 80% and notify organization owner
        $subscriptionUsage = SaaSBusinessEngine::where('usage_percentage', '>=', 80)->get();
        foreach ($subscriptionUsage as $subscriptionUsage) {
            Mail::to(User::find(4)->email)->send(new SubscriptionUsageNotification($subscriptionUsage));
        }

        // Check for subscription expiration and notify billing administrator
        $expiredSubscriptions = SaaSBusinessEngine::where('status', 'expired')->get();
        foreach ($expiredSubscriptions as $expiredSubscription) {
            Mail::to(User::find(5)->email)->send(new SubscriptionExpirationNotification($expiredSubscription));
        }
    }
}
