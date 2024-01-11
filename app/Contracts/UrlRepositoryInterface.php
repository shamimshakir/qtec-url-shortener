<?php

namespace App\contracts;

use App\Models\UrlShortener;

interface UrlRepositoryInterface
{
    public function index(int $user);

    public function store(array $data);

    public function update(array $data, UrlShortener $url);

    public function destroy(UrlShortener $url);

    public function hitAndUpdateCount(string $short_url);
}
