<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AppointmentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'scheduled_date' => Carbon::parse($this->scheduled_date)->format('Y-m-d'),
            'vaccine_center_id' => $this->vaccine_center_id,
            'status' => $this->status,
            'status_str' => $this->status_label,
        ];

        if ($this->vaccine_center)
            $data['vaccine_center'] = VaccineCenterCollection::make($this->vaccine_center);

        return $data;
    }

}
