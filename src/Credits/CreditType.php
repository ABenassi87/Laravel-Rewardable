<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Rewardable\Credits;

use BrianFaust\Eloquent\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CreditType extends Model
{
    use HasSlug;
    use PresentableTrait;

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function getPresenterClass()
    {
        return CreditTypePresenter::class;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
