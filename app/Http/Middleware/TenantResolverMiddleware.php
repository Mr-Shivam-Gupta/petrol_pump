<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;

class TenantResolverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $request->getHost();
        $tenant = Tenant::where('domain', $domain)->firstOrFail();

        $this->setTenantConnection($tenant);
        return $next($request);
    }

    function setTenantConnection(Tenant $tenant)
    {
        config([
            'database.connections.tenant' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'database' => $tenant->database,
                'username' => $tenant->db_username,
                'password' => $tenant->db_password,
            ],
        ]);

        DB::purge('tenant');
        DB::reconnect('tenant');
    }
}
