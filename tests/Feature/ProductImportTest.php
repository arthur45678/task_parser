<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Imports\ProductImport;
use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ProductImportTest extends TestCase
{
    // use RefreshDatabase;


    public function testImportingProducts()
    {
        // Assuming you have a sample Excel file for testing stored in the 'tests/data' directory
        //   $filePath = storage_path('app/public/your_sample_file.xlsx');
        $file = File::orderBy('id', 'desc')->limit(1)->first();
        //   dd($file);
        //     $filePath = storage_path('app/public/qG8qTs1JncXFEegfKVmIqw34AgVgf0L0pfRDQNJ7.xlsx');
        $filePath = storage_path('app/' . $file->file);

        // Replace 'YourController@store' with the actual route or controller method where you handle the import
        //    $this->post('YourController@store', ['file' => new UploadedFile($filePath, 'your_sample_file.xlsx')]);
        //   $this->post('YourController@store', ['file' => new UploadedFile($filePath, 'public/3lW4OPoh68iftxBnveUhIc6a1EIXHHYM9TuhOLlo.xlsx')]);

        // Assert that the products were imported successfully
        //  $this->assertDatabaseCount('products', 3); // Adjust the count based on your expected data count

        // You can add more assertions based on your specific requirements
        // For example, checking if a specific product exists in the database

        /*Test*/
        /* DB::table('products')->insert([
             'excell_id' => 99999,
             'name' => 'Product 1',
             'date' => '2023-01-01', // Adjust the date based on your expected data
         ]);*/
        /*Testend*/

        /*  $this->assertDatabaseHas('products', [
              'excell_id' => 99999,
              'name' => 'Product 1',
              'date' => '2023-01-01', // Adjust the date based on your expected data
          ]);*/

        // Add more assertions as needed


        $file = File::orderBy('id', 'desc')->limit(1)->first();
        //   dd($file);
        //     $filePath = storage_path('app/public/qG8qTs1JncXFEegfKVmIqw34AgVgf0L0pfRDQNJ7.xlsx');
        $filePath = storage_path('1
        app/' . $file->file);

        //  dd($filePath);
        Excel::fake();



    }
}
