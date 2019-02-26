<?php

namespace App\Admin;

use App\Helpers\Formatter\Admin\StatusFormatter;
use App\Helpers\Formatter\DateTimeFormatter;
use Dimsav\Translatable\Translatable;

class Post extends ModelWithSoftDeletes
{
    use DateTimeFormatter, StatusFormatter, Translatable;

    public $translatedAttributes = ['name', 'slug', 'description', 'content'];
    public static $newRouteUrl = 'posts';

    /**
     * @param array $data
     * @return Model|\Illuminate\Database\Eloquent\Model
     */
    public static function create($data = [])
    {
        $data['admin_id'] = auth()->id();
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
        if (isset($filters['display_status'])) {
            $query->where('display_status', $filters['display_status']);
        }

        if (!empty($filters['name'])) {
            $query->whereTranslationLike('name', '%' . $filters['name'] . '%', !empty($filters['locale']) ? $filters['locale'] : null );
        }

        return $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_vs_post_category');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCateIds()
    {
        return $this->categories()->allRelatedIds();
    }
}
