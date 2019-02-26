<?php

namespace App\Admin;

use App\Helpers\Formatter\Admin\StatusFormatter;
use App\Helpers\Formatter\Admin\UrlFormatter;
use App\Helpers\Formatter\DateTimeFormatter;
use Dimsav\Translatable\Translatable;

class PostCategory extends ModelWithSoftDeletes
{
    use DateTimeFormatter, StatusFormatter, Translatable;

    public $translatedAttributes = ['name', 'slug'];
    public static $newRouteUrl = 'post-categories';


    /**
     * @param array $data
     * @return Model|\Illuminate\Database\Eloquent\Model
     */
    public static function create($data = [])
    {
        $data['admin_id'] = auth('admin')->id();
        $data['slug'] = str_slug($data['name'], '-');

        $_this = new self();

        //Mutli lang
        foreach (\Config::get('translatable.locales') as $locale) {
            foreach ($_this->translatedAttributes as $attribute) {
                $data[$locale][$attribute] = $data[$attribute];
            }
        }

        return parent::create($data);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $data
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $filters)
    {
        if (isset($filters['parent_id'])) {
            $query->where('parent_id', $filters['parent_id']);
        }

        if (isset($filters['display_status'])) {
            $query->where('display_status', $filters['display_status']);
        }

        if (!empty($filters['name'])) {
            $query->whereTranslationLike('name', '%' . $filters['name'] . '%', !empty($filters['locale']) ? $filters['locale'] : null );
        }

        return $query;
    }

    /**
     * @param int $exceptId
     * @return mixed
     */
    public static function rootParent($exceptId = 0)
    {
        return static::latest()
            ->with('translations')
            ->filter(['parent_id' => 0])
            ->where('id', '!=', $exceptId)
            ->get();
    }

    /**
     * @return mixed
     */
    public static function getAll()
    {
        return static::latest()
            ->with('translations')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }
}
