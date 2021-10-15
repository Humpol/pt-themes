<?php

namespace Pterodactyl\Http\Controllers\Admin\Unix;

use Pterodactyl\Contracts\Repository\LocationRepositoryInterface;
use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pterodactyl\Models\UnixSetting;

class AlertsController extends Controller
{
	/**
	 * @var \Pterodactyl\Contracts\Repository\LocationRepositoryInterface
	 */
	protected $repository;

	/**
	 * LocationController constructor.
	 *
	 * @param \Pterodactyl\Contracts\Repository\LocationRepositoryInterface $repository
	 */
	public function __construct(
		LocationRepositoryInterface $repository
	) {
		$this->repository = $repository;
	}

	/**
	 * Return the unix overview page.
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
		return view('admin.unix.alerts', [
			'locations' => $this->repository->getAllWithDetails(),
			'setting_data' => $data,
		]);
	}
}
