<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConvertPersianNumbers
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fields = $request->all();
        $fields = json_decode(standardiseCharactersAndNumbers(json_encode($fields,JSON_UNESCAPED_UNICODE)), true);

        foreach ($fields as $key => $value)
            $request[$key] = $value;

        return $next($request);
    }
}
