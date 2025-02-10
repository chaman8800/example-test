<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Crypt;

class DetailsImport implements ToCollection
{
    private $details = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $this->details[] = [
                'id' => uniqid(),
                'name' => $row[0],
                'email' => $row[1],
                'encrypted_data' => Crypt::encryptString($row[2]),
            ];
        }
    }

    public function getDetails()
    {
        return $this->details;
    }
}