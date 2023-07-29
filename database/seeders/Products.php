<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['titulo','imagenes','precio','descripcion'];
    public function run(): void
    {
       
    }
}
