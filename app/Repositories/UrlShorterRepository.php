<?php

namespace App\Repositories;

use App\Contracts\UrlRepositoryInterface;
use App\Models\UrlShortener;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UrlShorterRepository implements UrlRepositoryInterface
{

    public function __construct(
        protected UrlShortener $model
    ) {}

    public function index(int $user): Collection|array
    {
        return $this->model::with('user')
            ->where('user_id', $user)
            ->latest()
            ->get();
    }


    public function store(array $data): void
    {
        try {
            $generated_url = "q.tec." . Str::random(3);
    
            $existingUrl = $this->model::query()->where('short_url', $generated_url)->first();
    
            if ($existingUrl) {
                throw new ModelNotFoundException("Short URL already exists", 404);
            }
    
            $this->model::query()->create(array_merge($data, ['short_url' => $generated_url]));
    
        } catch (ModelNotFoundException $exception) {

            throw $exception;

        } catch (Exception $exception) {

            throw new Exception($exception->getMessage() . $exception->getTraceAsString(), 400);

        }
    }


    public function update(array $data, UrlShortener $url): void
    {
        try {

            $data['short_url'] = "q.tec.". Str::random(3);

            $url->update($data);

        } catch (Exception $exception) {

            throw new Exception($exception->getMessage() . $exception->getTraceAsString(), 400);
        }
    }


    public function destroy(UrlShortener $url): void
    {
        try {

            $url->delete();

        } catch (Exception $exception) {

            throw new Exception($exception->getMessage() . $exception->getTraceAsString(), 400);
        }
    }


    public function hitAndUpdateCount(string $short_url): Model|Builder|null
    {
        $url = $this->model::query()->where('short_url', $short_url)->first();

        $url->update(['visit_count' => $url->visit_count + 1 ]);

        return $url;
    }

}
