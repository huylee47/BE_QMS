<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\QueryBuilders\IWithStandardQuery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\User;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class UserBuilder
 *
 * @extends Builder<User>
 */
final class UserQueryBuilder extends Builder implements IWithStandardQuery
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function standardQuery(?Request $request = null): self
    {
        $request ??= request();

        // Dynamic filtering based on fillable fields
        $searchableKeys = app(User::class)->getFillable();
        foreach ($searchableKeys as $searchableKey) {
            if ($request->filled($searchableKey)) {
                $this->where($searchableKey, 'like', '%'.$request->get($searchableKey).'%');
            }
        }

        // Handle search parameter outside the fillable fields loop
        if ($request->filled('search')) {
            $this->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('id', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('mobile', 'LIKE', '%'.$request->search.'%');
            });
        }

        return $this;
    }
}