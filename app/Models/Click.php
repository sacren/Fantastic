<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Click extends Model
{
    /** @use HasFactory<\Database\Factories\ClickFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'listing_id',
        'user_agent',
        'ip_address',
    ];

    /**
     * Get the listing that owns the click.
     *
     * This method defines a belongsTo relationship between the Click model and
     * the Listing model.
     *
     * It allows to retrieve the associated listing for a given click.  We can
     * use this relationship to access properties and methods of the related
     * listing, such as `$click->listing->title`.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
