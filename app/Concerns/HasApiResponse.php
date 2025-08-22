<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;
use App\QueryBuilders\UserQueryBuilder;

trait HasApiResponse
{
    public static function exception(Throwable $exception, ?string $message = null, ?string $domainCode = null): JsonResponse
    {
        $isValidationException = $exception instanceof ValidationException;

        return response()->json([
            'success' => false,
            'message' => $message ?? $exception->getMessage(),
            'data' => null,
            'exception' => [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace(),
            ],
            'domain_code' => $domainCode,
        ], $isValidationException ? 422 : 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function buildResponseData(Request $request, Builder|UserQueryBuilder $builder): array
    {
        if (! $request->filled('page') || ! $request->filled('pageSize')) {
            return ['data' => $builder->get(), 'pagination' => null];
        }
        $pageSize = $request->integer('pageSize', 10);
        $pageSize = max(1, min($pageSize, 100000));
        $page = $request->integer('page', 1);
        $page = max(1, min($page, 10000));
        $numberOfSkipRecords = ($page - 1) * $pageSize;
        $total = $builder->toBase()->getCountForPagination();
        $items = $builder->offset($numberOfSkipRecords)->limit($pageSize)->get();
        $totalPages = (int) ceil($total / $pageSize);

        return [
            'data' => $items,
            'pagination' => [
                'page' => $page,
                'pageSize' => $pageSize,
                'total' => $total,
                'totalPages' => $totalPages,
            ],
        ];
    }

    protected static function ok(mixed $data = [], string $message = '', int $status = 200, ?string $domainCode = null): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'domain_code' => $domainCode,
        ], $status, [], JSON_UNESCAPED_UNICODE);
    }

    protected static function error(mixed $data = [], string $message = 'failed', int $status = 200, ?string $domainCode = null): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'message' => $message,
            'data' => $data,
            'domain_code' => $domainCode,
        ], $status, [], JSON_UNESCAPED_UNICODE);
    }
}