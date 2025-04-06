<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
     // السماح بملء الحقول تلقائيًا
     protected $fillable =['user_id','name','price','quantity','description','category_id'];
     public function Category(){
        return $this->belongsTo(Category::class);
     }
}
