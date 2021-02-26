<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use softDeletes;
    
    protected $fillable=['name','price','feuture_image_path','content','user_id','category_id','feuture_image_name'];
    public function image()
    {
            return $this->hasMany(ProductImage::class, 'product_id');
    }
   
   public function tag()
   {
       return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
   }
   
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productImageDetail()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
   
   
}
