<?php

namespace App;

use Morilog\Jalali\Jalalian;

/**
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
trait HasJalaliDates
{
    // Creating created_at solar date
    public function getJalalieCreatedAtAtribute(): ?string
    {
        return $this->created_at
            ? Jalalian::forge($this->created_at)->format('Y/m/d')
            : null;
    }
    // Creating created_at solar date
    public function getJalalieUpdatedAtAtribute(): ?string
    {
        return $this->updated_at
            ? Jalalian::forge($this->updated_at)->format('Y/m/d')
            : null;
    }
}
