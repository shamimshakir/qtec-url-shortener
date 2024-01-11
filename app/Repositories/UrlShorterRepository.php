<?php

namespace App\Repositories;

use App\contracts\UrlRepositoryInterface;
use App\Models\UrlShortener;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UrlShorterRepository implements UrlRepositoryInterface
{
    public function __construct(
        protected UrlShortener $model
    ) {}

    public function index(): Collection|array
    {
        return $this->model::with('user')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();
    }

    public function store(array $data): void
    {
        try {

            $this->model::query()->create($data);

        } catch (Exception $exception) {

            throw new Exception($exception->getMessage() . $exception->getTraceAsString(), 400);
        }
    }

    public function update(array $data, UrlShortener $url): void
    {
        try {

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

    public function shortUrl(string $short_url): Model|Builder|null
    {
        $url = $this->model::query()->where('short_url', $short_url)->first();

        $url->update(['visit_count' => $url->visit_count + 1 ]);

        return $url;
    }
}
