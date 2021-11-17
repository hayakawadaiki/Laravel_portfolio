<?php

namespace App\Http\Middleware;

use App\Models\ActionLogs\ActionLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Closure;

class CheckPostView
{
	public function handle($request, Closure $next)
	{
		$post_id = $request->route()->parameter('post');

		ActionLog::create([
			'user_id' => Auth::id(),
			'post_id' => $post_id,
			'event_at' => new Carbon,
		]);

		return $next($request);
	}
}
