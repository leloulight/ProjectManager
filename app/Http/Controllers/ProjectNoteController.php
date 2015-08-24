<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectNoteRepository;
use App\Services\ProjectNoteService;
use Illuminate\Http\Request;


class ProjectNoteController extends Controller
{

    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($projectId)
    {
        return $this->repository->findWhere(['project_id' => $projectId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $projectId
     * @return Response
     */
    public function show($projectId, $noteId)
    {
        //Even though I am not using the $projectId, it's mandatory to pass all the parameters used in the route file as here system will take the parameters in sequence and not based on the variable name defined in the route

        return $this->repository->find($noteId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $projectId, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($projectId, $noteId)
    {
        if ($this->repository->find($noteId)->delete()) {
            return ["success" => true];
        }

        return ["success" => false ];
    }
}
