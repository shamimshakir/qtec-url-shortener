<?php

namespace App\contracts;

use App\Models\UrlShortener;

interface UrlRepositoryInterface
{
    public function index();

    public function store(array $data);

    public function update(array $data, UrlShortener $url);

    public function destroy(UrlShortener $url);

    public function shortUrl(string $short_url);
}
