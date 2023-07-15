<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserSharedResource;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $flash = $this->getFlashMessage();
        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? new UserSharedResource($request->user())
                : null,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'title' => $flash->title??'',
                'message' =>$flash->messsage??'',
            ]
        ]);
    }

    protected function getFlashMessage(): \stdClass
    {
        $flash = new \stdClass;
        if(session('success')){
            $flash->title = 'Success';
            $flash->messsage = session('success');
        }else if(session('error')){
            $flash->title = 'Error';
            $flash->messsage = session('error');
        }
        else if(session('warning')){
            $flash->title = 'Warning';
            $flash->messsage = session('warning');
        }
        else if(session('info')){
            $flash->title = 'Info';
            $flash->messsage = session('info');
        }
        else if(session('status')){
            $flash->title = 'Success';
            $flash->messsage = session('status');
        }

        return $flash;
    }
}
