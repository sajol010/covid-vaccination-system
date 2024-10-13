<?php

namespace App\Services\Vaccine;

use App\Models\Appointment;
use App\Models\User;
use App\Models\VaccineCenter;
use App\Services\Users\UserService;
use Carbon\Carbon;

class VaccineService implements VaccineServiceInterface
{
    protected UserService $userService;
    const WEEK_DAY = [1,2,3,4,7]; // as per php date function monday=1, tuesday=2 and so on.
    const WEEKEND = [5,6];
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @throws \Exception
     */
    public function registerUser($userId, $vaccineCenterId)
    {
        // Distribute users to vaccine centers based on capacity
        $vaccineCenter = VaccineCenter::find($vaccineCenterId);

        $scheduledDate = today();
        $scheduledDate = $this->getNextAvailableWeekday($scheduledDate, $vaccineCenter);

        $apointment = Appointment::create([
            'user_id' => $userId,
            'vaccine_center_id' => $vaccineCenter->id,
            'scheduled_date' => $scheduledDate,
        ]);

        if (!$apointment) {
            throw new \Exception("Appointment failed");
        }

        return $apointment;

    }

    public function getUserStatus($nid)
    {
        $user = User::where('nid', $nid)->with(['appointment'])->first();

        if (!$user) {
            return "Not Registered";
        }

        $appointment = $user->appointment()->latest()->first();

        if ($appointment) {
            if ($appointment->scheduled_date < now()) {
                return "Vaccinated";
            }
            return "Scheduled";
        }
        return "Not scheduled";
    }

    private function getNextAvailableWeekday($date, $vaccineCenter)
    {
        $dayOfWeek = Carbon::parse($date)->dayOfWeek;

        if (!in_array($dayOfWeek, self::WEEK_DAY)) {
            $date = Carbon::parse($date)->addDay();
            return $this->getNextAvailableWeekday($date, $vaccineCenter);
        }

        $appointmentsCount = $vaccineCenter->appointments()->whereDate('scheduled_date', $date)->count();
        if ($appointmentsCount >= $vaccineCenter->capacity) {
            $date = Carbon::parse($date)->addDay();
            return $this->getNextAvailableWeekday($date, $vaccineCenter);
        }

        return $date;
    }
}
