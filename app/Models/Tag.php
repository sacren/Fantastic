<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the listings that belong to the tag.
     *
     * This method defines a many-to-many relationship between the Tag model
     * and the Listing model.
     *
     * In the database, a pivot table is used to manage the associations
     * between tags and listings.
     *
     * A single tag can be related to multiple listings, and a single listing
     * can have multiple tags.
     *
     * Here's an example of how to use this relationship to get the listings
     * associated with a tag:
     * <code>
     * $tag = Tag::find(1);
     * $listings = $tag->listings;
     * </code>
     *
     * We can also chain additional query methods to the relationship to filter
     * or sort the listings.
     *
     * For instance, to get only the active listings associated with a tag:
     * <code>
     * $activeListings = $tag->listings()->where('is_active', true)->get();
     * </code>
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class);
    }
}
