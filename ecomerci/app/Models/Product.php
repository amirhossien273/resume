<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Media\Src\Traits\HasMedia;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasMedia, LogsActivity;

    protected $fillable = [
        "unique_id",
        "title",
        "slug",
        "content",
        "intro",
        "state_enum",
        "creator_id",
        "category_id",
        "show_order",
        "is_active",
        'is_show_first_page',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attributeOptions()
    {
        return $this->belongsToMany(AttributeOption::class, 'attribute_option_products');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }


    public function productItems()
    {
        return $this->hasMany(ProductItem::class);
    }

    /**
     * Get the options for activity logging.
     *
     * This method is required by the LogsActivity trait. It defines the logging options
     * for this model, such as which attributes to log, the log name, and whether to log
     * only changed attributes (dirty attributes).
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->useLogName('product')
            ->logOnlyDirty();
    }
}
