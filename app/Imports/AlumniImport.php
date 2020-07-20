<?php

namespace App\Imports;

use App\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumniImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumni([
            'name' => $row[0],
            'nim' => $row[1],
            'email' => $row[2],
            'password' => bcrypt($row[1]),
            'telepon'=>$row[3],
        ]);
    }


}
