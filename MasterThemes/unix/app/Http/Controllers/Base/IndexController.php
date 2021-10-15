<?php

namespace Pterodactyl\Http\Controllers\Base;

use Pterodactyl\Models\UnixSetting;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Contracts\Repository\ServerRepositoryInterface;

class IndexController extends Controller
{
	/**
	 * @var \Pterodactyl\Contracts\Repository\ServerRepositoryInterface
	 */
	protected $repository;

	/**
	 * IndexController constructor.
	 */
	public function __construct(ServerRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Returns listing of user's servers.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$setting = new UnixSetting();
		$data = array();
		foreach ($setting->all() as $key => $value) {
			$data[$value->name] = $value->value;
		}
		return view('templates/base.core', ['setting_data' => $data]);
	}
}
