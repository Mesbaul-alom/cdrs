<?php

namespace App\Imports;

use App\Models\AdminData;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AdminData([
            'op_name'           => $row[0],
            'setup_time'        => $row[1], 
            'called _number_in' => $row[2], 
            'called_number'     => $row[3], 
            'start_time'        => $row[4], 
            'duration'          => $row[5], 
            'end_time'          => $row[6], 
            'op_destination'    => $row[7], 
            'cost_in'           => $row[8], 
            'op_price'          => $row[9], 
            'call_id'           => $row[10], 
        ]);
    }
}