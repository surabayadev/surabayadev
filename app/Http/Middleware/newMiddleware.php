<?php 
namespace App\Http\Middleware;
use App\Models\User;
use App\Models\Role;
use Closure;

class newMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->role_id == 1) {
        return $next($request);
        }

    return redirect('home');
    }
}
