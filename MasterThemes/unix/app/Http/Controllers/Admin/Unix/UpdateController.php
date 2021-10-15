<?php

namespace Pterodactyl\Http\Controllers\Admin\Unix;

use Pterodactyl\Contracts\Repository\LocationRepositoryInterface;
use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
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
		return view('admin.unix.update', [
			'locations' => $this->repository->getAllWithDetails(),
		]);
	}

	public function colorSubmit(Request $req)
	{
		$valid = $req->validate([
			'pcolor' => 'required',
			'scolor' => 'required'
		]);
		dd($req->input());
	}
}
