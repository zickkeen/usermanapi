<?php

declare(strict_types=1);

namespace App\Controller;

use Pimple\Psr11\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\CustomResponse as Response;
use App\Library\RosAPI;

final class User
{
    private const API_NAME = 'bojez-userman';

    private const API_VERSION = '0.1.0';

    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getLists(Request $request, Response $response): Response
    {
        $RosAPI = new RosAPI();

        if(empty($RosAPI->getUserman())){
            $payload = ["status" => "error", "data" => null];
        }else{
            $payload =["status" => "success", "data" => $RosAPI->getUserman()];
        }

        return $response->withJson($payload);
    }

    public function import(Request $request, Response $response): Response
    {
        $RosAPI = new RosAPI();
        
        if(!empty($RosAPI->getUserman())){
            foreach($RosAPI->getUserman() as $users){
                $idCheck = $this->selectById($users['id']);
                if(count($idCheck)==0){
                    if($this->insertUser($users)){
                        $data[] = "Data {$users['id']} has inserted";
                    }else{
                        $data[] = "Data {$users['id']} has failed to be inserted";
                    } 
                }else{
                    $hasIneserted[] = "Data {$users['id']} was inserted before";
                } 
            }
        }

        if(!empty($hasIneserted)){
            $payload = ["status" => "error", "data" => null];
        }else{
            $payload = ["status" => "success", "data" => $data??null];
        }
        return $response->withJson($payload);
    }

    protected function selectById($id){
        $db = $this->container->get('db');
        $queryText = "SELECT * FROM `user` WHERE `id`=?";
        $params = [$id];
        $query = $db->prepare($queryText);
        $query->execute($params);
        $result = $query->fetchAll();

        return $result;
    }

    protected function insertUser($params){
        $db = $this->container->get('db');
        $queryText = 'INSERT INTO `user` SET
            `id`=?, `user`=?, `pass`=?, `customer`=?, `profile`=?, `mac`=?,
            `status`=?, `lastseen`=?, `starttime`=?, `location`=?, `comment`=?
            ';
        $queryParams = [
            $params['id'],
            $params['user'],
            $params['pass'],
            $params['customer'],
            $params['profile'],
            $params['mac'],
            $params['status'],
            $params['lastseen'],
            $params['starttime'],
            $params['location'],
            $params['comment']
        ];
        $query = $db->prepare($queryText);
        return $query->execute($queryParams);
    }
}
