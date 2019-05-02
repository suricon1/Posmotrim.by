<?php

namespace App\Models\Vinograd;

use App\Models\Meta;
use App\Models\Traits\GalleryServais;
use App\Models\Traits\ImageServais;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable, ImageServais, GalleryServais;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    const DIR_GALERY_NAME = 'galery';
    const ORIGIN_IMAGE_NAME = 'origin.jpg';
    const DEFAULT_IMAGE_NAME = '/img/product_default.jpg';
    //const IMAGE_WATERMARK =    'img/logo/logo_vinograd.png';

    public $watermark = 'img/logo/logo_vinograd.png';

    public $imageList = [
        '700x700',        //Основное фото
        '400x400',        //вспомогательное фото
        '100x100',        //Отображается в админке
    ];

    protected $table = 'vinograd_products';
    public $timestamps = false;
    protected $fillable = ['title','content', 'description','name', 'slug', 'ripening', 'mass', 'color', 'flavor', 'frost', 'flower'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 0);
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

    public function getCategory()
    {
        return ($this->category != null)
            ?   $this->category->name
            :   'Категория не присвоена';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public static function add($fields)
    {
        $product = new static;
        $product->fill($fields->all());
        $product->date_add = time();
        $product->date_edit = time();
        $product->meta = new Meta($fields, $fields['name']);
        $product->save();

        return $product;
    }

    public function edit($fields)
    {
        $this->fill($fields->all());
        $this->date_edit = time();
        $this->meta = new Meta($fields, $fields['name']);
        $this->save();
    }

    public function remove()
    {
        $this->deleteImages();
        $this->delete();
    }

    public function setDraft()
    {
        $this->status = Product::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Product::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        return ($value == null) ? $this->setDraft() : $this->setPublic();
    }

    public function toggledsStatus()
    {
        return ($this->status == 0) ? $this->setPublic() : $this->setDraft();
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        return ($value == null) ? $this->setStandart() : $this->setFeatured();
    }

    public function canBeCheckout($modificationId, $quantity): bool
    {
        if ($modificationId) {
            return $quantity <= $this->getModification($modificationId)->quantity;
        }
        return $quantity <= $this->quantity;
    }

    public function getModifications()
    {
        return $this->modifications()->where('quantity', '>', 0)->get();
    }
//SQL: select * from `vinograd_product_modifications` where `vinograd_product_modifications`.`product_id` = 27 and `vinograd_product_modifications`.`product_id` is not null and `` is null
    public function getModification($id)
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification;
            }
        }
        throw new \DomainException('Modification is not found.');
    }
    public function getModificationPrice($id): int
    {
        foreach ($this->modifications as $modification) {
            if ($modification->isIdEqualTo($id)) {
                return $modification->price ?: $this->price_new;
            }
        }
        throw new \DomainException('Modification is not found.');
    }


}
