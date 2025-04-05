<?php

// Product.php (Model)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    public function getRouteKeyName()
    {
        return 'ProductID';
    }
    protected $fillable = [
        'ProductName',
        'SkinType',
        'ConcernType',
        'ProductType',
        'ProductImage1',
        'ProductImage2',
        'ProductImage3',
        'ProductImage4',
        'ProductImage5',
        'KeyIngredients',
        'ShortDesrciption',
        'MoreDescription',
        'ProductDetails',
        'TextureImage',
        'ProductBenefits',
    ];

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
