<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Crypt;

class DetailsExport implements FromCollection, WithHeadings
{
    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function collection()
    {
        return collect($this->details)->map(function ($detail) {
            return [
                'name' => $detail['name'],
                'email' => $detail['email'],
                'data' => Crypt::decryptString($detail['encrypted_data']),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Data',
        ];
    }
}