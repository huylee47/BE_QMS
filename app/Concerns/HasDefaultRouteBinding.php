<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HasDefaultRouteBinding
 * @package App\Concerns
 * @mixin Model
 */
trait HasDefaultRouteBinding
{
    public function resolveRouteBinding($value, $field = null)
    {
        return $this::query()->where($field ?? $this->getRouteKeyName(), $value)
            ->firstOrFail();
    }
}
