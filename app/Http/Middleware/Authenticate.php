<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return route('login');
            }
        }
        else if($this->auth->user())
        {
            $url=$request->path();
            $menu = $request->session()->get('menu');
            if(!($menu->where('url_menu',$url)->count()>0))
            {
                return redirect()->guest('errors/503');
            }
        }
        /*if (! $request->expectsJson()) {
            return route('acceso/login');
        }*/
    }
}
