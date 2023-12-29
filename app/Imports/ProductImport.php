<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Events\AfterImport;
use Illuminate\Support\Facades\Log;


class ProductImport implements ToCollection, WithCalculatedFormulas, WithChunkReading, WithEvents
{

    use Importable, RegistersEventListeners;


    public function collection(Collection $rows)
    {

        Product::query()->delete();
       foreach ($rows as $key=>$row) {
            if($key == 0) continue;
            // Будут отбросены не полность заполнение продукты
            if($this->validateRow($row->all())){
                $this->data[] = [
                    'excell_id' => $row->all()[0],
                    'name' => $row->all()[1],
                    'date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject( $row->all()[2])->format('Y-m-d')
                    //'date' => $row->all()[1],
                ];
            }
            else{
                Log::info("Незаполнен полностью данный продукт: id {$row->all()[0]} not completed");
            }
        }
        Product::insert($this->data);
    }

    public function validateRow($record)
    {
        $valid = Validator::make($record, [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required',
        ])->passes();
        return $valid;
    }

    public function batchSize(): int
    {
        return 3000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }



}
