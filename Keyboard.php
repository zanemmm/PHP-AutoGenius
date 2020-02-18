<?php
/**
 * Created by PhpStorm.
 * User: zane
 * Date: 2020/2/16
 * Time: 13:49
 */

namespace AutoGenius;


class Keyboard
{
    private $client;
    private $query = ['type' => 'keyboard'];

    public function __construct(HTTPClient $client)
    {
        $this->client = $client;
    }

    public function press(int $keycode): bool
    {
        $this->query['action'] = 'press';
        $this->query['keycode'] = $keycode;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }

    public function down(int $keycode): bool
    {
        $this->query['action'] = 'down';
        $this->query['keycode'] = $keycode;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }

    public function up(int $keycode): bool
    {
        $this->query['action'] = 'up';
        $this->query['keycode'] = $keycode;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }

    public function getClipboard()
    {
        $this->query['action'] = 'get_clipboard';
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];

        }
        return false;
    }

    public function setClipboard(string $text): string
    {
        $this->query['action'] = 'set_clipboard';
        $this->query['text'] = $text;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return true;
        }
        return false;
    }
}