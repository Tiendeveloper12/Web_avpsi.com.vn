<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageSection extends Model
{
    protected $table = 'page_sections';

    protected $fillable = ['page', 'section_key', 'title', 'content', 'is_active', 'sort_order'];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget("page_section_{$model->page}_{$model->section_key}");
        });

        static::deleted(function ($model) {
            Cache::forget("page_section_{$model->page}_{$model->section_key}");
        });
    }

    /**
     * Get section content, cached.
     *
     * @param string $page
     * @param string $key
     * @return array|null
     */
    public static function getSection(string $page, string $key)
    {
        return Cache::rememberForever("page_section_{$page}_{$key}", function () use ($page, $key) {
            $section = self::where('page', $page)
                ->where('section_key', $key)
                ->where('is_active', true)
                ->first();

            return $section ? $section->toArray() : null;
        });
    }
}
