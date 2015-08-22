<?php
/**
 * Created by PhpStorm.
 * User: edujr
 * Date: 8/21/15
 * Time: 22:51
 */

namespace App\Repositories;


use App\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository
{
    public function model() {
        return Client::class;
    }

}