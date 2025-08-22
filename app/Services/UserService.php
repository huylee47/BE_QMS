<?php

declare(strict_types=1);

namespace App\Services;

use App\Concerns\HasApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\User;
use Throwable;

/**
 * @method static \Illuminate\Http\JsonResponse index(\Illuminate\Http\Request $request)
 */
final class UserService
{
    use HasApiResponse, AsAction;

    /**
     * Handle the index request for users
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = User::query()->with(['roles', 'departments'])->standardQuery();

            $result = $this->buildResponseData($request, $query);

            return self::ok($result);
        } catch (Throwable $e) {
            return self::exception($e);
        }
    }
}