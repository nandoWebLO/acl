<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Notice;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Model' => 'App\Policies\ModelPolicy',
		// \App\Notice::class => \App\Policies\NoticePolicy::class,
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();
		// Gate::define('update-notice', function(User $user, Notice $notice){
		//     return $user->id == $notice->user_id;
		// });

		$permissions = Permission::with('roles')->get();
		// dd($permissions);
		foreach ($permissions as $permission) {
			Gate::define($permission->name, function(User $user) use ($permission){
				return $user->hasPermission($permission);
			});

			// echo "<pre>";
			// print_r($permission);
			// echo "</pre>";
		}
		// exit();
		// dd($permission);

		Gate::before(function(User $user, $ability){
			if ($user->hasAnyRoles('admin')) {
				return true;
			}
		});
	}
}
