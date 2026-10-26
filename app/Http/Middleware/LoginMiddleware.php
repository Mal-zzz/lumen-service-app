<?php 

    namespace App\Http\Middleware;

    use Closure;

    class LoginMiddleware
    {
        public function handle($request, Closure $next)
        {
            if (!($request->input('username') === 'akmal' && $request->input('password') === '12345')) {
                return "<h1>Unauthorized</h1> <p>Anda tidak memiliki akses ke halaman ini.</p>";
            }

            return $next($request);
        }
    }


?>