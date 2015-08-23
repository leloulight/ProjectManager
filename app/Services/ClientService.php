<?php

namespace App\Services;


use App\Repositories\ClientRepository;
use App\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create (array $data) {

        /*
         * Here we could insert business rules, like:
         * -> Send a e-mail
         * -> Post a tweet
         * -> Trigger a notification
         */

        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                "error" => true,
                "message" => $e->getMessageBag()
            ];
        }
    }

    public function update (array $data, $id) {
        return $this->repository->update($data, $id);
    }

}