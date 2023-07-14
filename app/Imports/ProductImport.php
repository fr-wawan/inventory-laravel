<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Product([
      'product_code' => $row[0],
      'name' => $row[1],
      'brand' => $row[2],
      'supplier_id' => $row[3],
      'category_id' => $row[4],
      'description' => $row[5],
      'unit' => $row[6],
    ]);
  }
}
