<?php

namespace App\Http\Controllers;

use App\contracts\UrlRepositoryInterface;
use App\Http\Requests\UrlRequest;
use App\Models\UrlShortener;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlShorterController extends Controller
{
    public function __construct(
        protected UrlRepositoryInterface $repository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('urls.index', [ 'urls' => $this->repository->index() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;

        $data['short_url'] = "q.tec.". Str::random(3);

        $this->repository->store($data);

        return redirect(route('urls.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UrlShortener $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UrlShortener $url)
    {
        return view('urls.edit', [
            'url' => $url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UrlRequest $request, UrlShortener $url)
    {
        $data = $request->validated();

        $data['short_url'] = "q.tec.". Str::random(3);

        $this->repository->update($data, $url);

        return redirect(route('urls.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UrlShortener $url)
    {
        $this->repository->destroy($url);

        return redirect(route('urls.index'));
    }

    public function shortUrl(string $short_url)
    {
        $url = $this->repository->shortUrl($short_url);

        return redirect($url->long_url);
    }
}
