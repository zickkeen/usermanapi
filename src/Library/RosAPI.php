<?php

declare(strict_types=1);

namespace App\Library;

use Pimple\Psr11\Container;
// use Psr\Http\Message\ServerRequestInterface as Request;
use RouterOS\Client as Mikrotik;
use RouterOS\Query;

class RosAPI
{
    private $RosConnect;

    public function rosConnect()
    {
        $client = new Mikrotik([
            'host' => $_SERVER['ROS_HOST'],
            'user' => $_SERVER['ROS_USER'],
            'pass' => $_SERVER['ROS_PASS'],
            'port' => (int) $_SERVER['ROS_PORT'] ?? 8728,
        ]);
        return $client;
    }

    public function getUserman()
    {
        $client = $this->rosConnect();

        $query = (new Query('/tool/user-manager/user/print'));
        // $query->where('username', '~' , 'rs');
        $result = $client->query($query)->read();

        $i = 0;
        foreach($result as $user){
            $user['id'] = hexdec(substr($user['.id'],1,strlen($user['.id'])-1));
            unset($user['.id']);

            $sid['id'] = $user['id']??null;
            $sid['user'] = $user['username']??null;
            $sid['pass'] = $user['password']??null;
            $sid['customer'] = $user['customer']??null;
            $sid['profile'] = $user['actual-profile']??null;
            $sid['mac'] = $user['caller-id']??null;
            $sid['status'] = $user['active']??null;
            $sid['lastseen'] = $user['last-seen']??null;
            $sid['starttime'] = $user['start-time']??null;
            $sid['location'] = $user['location']??null;
            if(!empty($user['comment']) && strlen($user['comment'])>10)
            {
                // $sid['comment'] = json_decode($user['comment']);
                $sid['comment'] = $user['comment'];
            }else{
                $sid['comment'] = $user['comment']??null;
            }

            $hasil[$i] = $sid;
            $i++;
        }

        return $hasil;
    }
}