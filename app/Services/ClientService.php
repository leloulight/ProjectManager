<?php

namespace App\Services;


use App\Repositories\ClientRepository;

class ClientService
{

    protected $repository;

    public function __construct(ClientRepository $repository) {
        $this->repository = $repository;
    }

    public function create (array $data) {

        /*
         * Here we could insert business rules, like:
         * -> Send a e-mail
         * -> Post a tweet
         * -> Trigger a notification
         */

        return $this->repository->create($data);
    }

    public function update (array $data, $id) {
        return $this->repository->update($data, $id);
    }

}