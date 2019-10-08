<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Gate;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index(Notice $notice)
	{
		$notices = Notice::all();
		// $notices = Notice::all()->where('user_id', auth()->user()->id);

		return view('home', compact('notices'));
	}

	public function update($id){
		$notice = Notice::find($id);
		// $this->authorize('update-notice', $notice);
		if (Gate::denies('update-notice', $notice))
			abort(403, 'Não autorizado');

		return view('update-notice', compact('notice'));
	}
}
