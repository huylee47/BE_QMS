<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;

trait StripsRelationsToArray
{
    public function toArray(): array
    {
        $result = [];

        foreach (get_object_vars($this) as $key => $value) {
            if ($value instanceof Relation) {
                continue;
            }
            if ($value instanceof Model) {
                $result[$key] = $value->toArray();
                continue;
            }
            if (is_array($value)) {
                $result[$key] = array_map(function ($item) {
                    return $item instanceof Model
                        ? $item->toArray()
                        : $item;
                }, $value);
                continue;
            }
            // Còn lại giữ nguyên
            $result[$key] = $value;
        }

        return $result;
    }
}
