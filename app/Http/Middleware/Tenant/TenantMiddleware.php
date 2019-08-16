<?php

namespace App\Http\Middleware\Tenant;

use App\Models\Company;
use Closure;
use App\Tenant\ManagerTenant;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return dd($this->subDomain());

        if (request()->getHost() != config('tenant.domain_main')) {

            $company = $this->getCompany($this->subDomain());

            if (!$company && $request->url() != route('404.tenant')) {
                return redirect()->route('404.tenant');
            } else if ($request->url() != route('404.tenant')) {
                app(ManagerTenant::class)->setConnection($company);

                $this->setSessionCompany($company->only([
                    'nome_fantasia',
                    'uuid'
                ]));
                
                return $next($request);
            }
        }

        config()->set('adminlte.menu', $this->adminMenu());

        return $next($request);
    }

    public function getCompany($subDomain)
    {
        return Company::where('sub_domain', $subDomain)->first();
    }

    public function subDomain()
    {
        $host = explode('.', request()->getHost());

        if ($host[0] === 'www')
            $subDomain = $host[1];
        else
            $subDomain = $host[0];

        return $subDomain;
    }

    public function adminMenu() : Array
    {
        return $menu = [
            'Administrador',
            [
                'text'        => 'Usuários',
                'route'       => 'usuarios.index',
                'icon'        => 'user',
            ],
            [
                'text'        => 'Órgãos/Entidade',
                'route'       => 'entidades.index',
                'icon'        => 'building',
            ],
        ];
    }

    public function setSessionCompany($company)
    {
        session()->put('company', $company);
    }


}
