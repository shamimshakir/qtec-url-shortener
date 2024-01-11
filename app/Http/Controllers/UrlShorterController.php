<?php

namespace App\Http\Controllers;

use App\contracts\UrlRepositoryInterface;
use App\Http\Requests\UrlRequest;
use App\Models\UrlShortener; 

class UrlShorterController extends Controller
{

    public function __construct(
        protected UrlRepositoryInterface $repository
    ) {}


    public function index()
    { 
        return view('urls.index', [ 
            'urls' => $this->repository->index(auth()->user()->id) 
        ]);
    } 


    public function store(UrlRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $this->repository->store($data);

        return redirect(route('urls.index'));
    }


    public function edit(UrlShortener $url)
    {
        return view('urls.edit', [
            'url' => $url,
        ]);
    }


    public function update(UrlRequest $request, UrlShortener $url)
    {
        $data = $request->validated();

        $this->repository->update($data, $url);

        return redirect(route('urls.index'));
    }


    public function destroy(UrlShortener $url)
    {
        $this->repository->destroy($url);

        return redirect(route('urls.index'));
    }


    public function hitAndUpdateCount(string $short_url)
    {
        $url = $this->repository->hitAndUpdateCount($short_url);

        return redirect($url->long_url);
    }

}
