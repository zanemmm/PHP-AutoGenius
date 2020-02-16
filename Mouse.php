<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/16
 * Time: 13:39
 */

namespace AutoGenius;


class Mouse
{
    const LEFT_BUTTON   = 0;
    const RIGHT_BUTTON  = 1;
    const MIDDLE_BUTTON = 2;

    private $client;
    private $query = ['type' => 'mouse'];

    public function __construct(HTTPClient $client)
    {
        $this->client = $client;
    }

    public function move(int $x, int $y): bool
    {
        $this->query['action'] = 'move';
        $this->query['x'] = $x;
        $this->query['y'] = $y;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }

    public function click(int $btn): bool
    {
        $this->query['action'] = 'click';
        $this->query['btn'] = $btn;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }

    public function doubleClick(int $btn): bool
    {
        $this->query['action'] = 'dbclick';
        $this->query['btn'] = $btn;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }
}