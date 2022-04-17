<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppAnonymousResourceCollection extends AnonymousResourceCollection
{
    public function paginationInformation($request, $paginated, $default): array
    {
        return [
            'pagination' => [
                'currentPage' => $paginated['current_page'],
                'from' => $paginated['from'],
                'lastPage' => $paginated['last_page'],
                'perPage' => $paginated['per_page'],
                'to' => $paginated['to'],
                'total' => $paginated['total'],
            ]
        ];
    }
}
