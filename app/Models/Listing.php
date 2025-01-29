<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'company',
        'location',
        'logo',
        'is_highlighted',
        'is_active',
        'content',
        'apply_link',
    ];

    /**
     * Get the clicks associated with the listing.
     *
     * This method defines a one-to-many relationship between the Listing model
     * and the Click model.
     *
     * It allows to retrieve all the clicks that have been made on a particular
     * listing.
     *
     * Each listing can have multiple clicks, and this method provides an easy
     * way to access those clicks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Returns an instance of the HasMany relationship, which can be used to
     * query the associated clicks.  We can chain additional query methods such
     * as where(), orderBy(), etc., to further filter or sort the clicks.
     */
    public function clicks(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * Get the tags that belong to the listing.
     *
     * This method defines a many-to-many relationship between the Listing
     * model and the Tag model.
     *
     * In the database, a pivot table is used to establish the connection
     * between listings and tags.
     *
     * Each listing can be associated with multiple tags, and each tag can be
     * associated with multiple listings.
     *
     * We can use the returned BelongsToMany object to perform various
     * operations. For example, to get the tags of a listing:
     * <code>
     * $listing = Listing::find(1);
     * $tags = $listing->tags;
     * </code>
     *
     * We can also chain additional query methods to the result, such as
     * where(), orderBy(), etc., to further filter or sort the tags.
     *
     * For instance, to get only the active tags associated with a listing:
     * <code>
     * $activeTags = $listing->tags()->where('is_active', true)->get();
     * </code>
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the user that owns the listing.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
