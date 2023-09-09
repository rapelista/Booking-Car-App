<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BookingExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    public function styles(Worksheet $worksheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function map($booking): array
    {
        $fuelUsages = [
            "Pertamax Turbo" => null,
            "Dexlite" => null,
            "Solar" => null,
            "Pertalite" => null,
        ];

        $_fuelUsages = $booking->fuel_usages->groupBy(function ($item) {
            return $item->fuel_type->name;
        })->map(function ($item) {
            return $item->sum('amount');
        })->toArray();

        foreach ($_fuelUsages as $key => $usage) {
            $fuelUsages[$key] = $usage;
        }

        $data = [
            'id' => $booking->id,
            'operation_date' => $booking->operation_date,
            'car' => $booking->car->name,
            'driver' => $booking->driver->name,
            'is_done' => $booking->is_done,
            'notes' => $booking->notes,
        ];

        return array_merge($data, $fuelUsages);
    }

    public function headings(): array
    {
        return [
            '#',
            'Operation Date',
            'Car Name',
            'Driver',
            'Is Done',
            'Notes',
            'Pertamax Turbo',
            'Dexlite',
            'Solar',
            'Pertalite',
        ];
    }

    public function collection()
    {
        return Booking::where('is_done', true)
            ->orderByDesc('operation_date')
            ->get();
    }
}
