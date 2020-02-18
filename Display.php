<?php
/**
 * Created by PhpStorm.
 * User: zane
 * Date: 2020/2/16
 * Time: 20:13
 */

namespace AutoGenius;


class Display
{
    private $client;
    private $query = ['type' => 'display'];

    public function __construct(HTTPClient $client)
    {
        $this->client = $client;
    }

    public function findImageFromScreen(string $imagePath)
    {
        $this->query['action'] = 'find_image_from_screen';
        $this->query['image_path'] = $imagePath;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return false;
    }

    public function findImageFromScreenRect(string $imagePath, int $a, int $b, int $c, int $d)
    {
        $this->query['action'] = 'find_image_from_screen_rect';
        $this->query['image_path'] = $imagePath;
        $this->query['a'] = $a;
        $this->query['b'] = $b;
        $this->query['c'] = $c;
        $this->query['d'] = $d;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return false;
    }

    public function getColorFromScreen(int $x, int $y)
    {
        $this->query['action'] = 'get_color_from_screen';
        $this->query['x'] = $x;
        $this->query['y'] = $y;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return false;
    }

    public function findColorFromScreen(string $color)
    {
        $this->query['action'] = 'find_color_from_screen';
        $this->query['color'] = $color;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return false;
    }

    public function findColorFromScreenRect(string $color, int $a, int $b, int $c, int $d)
    {
        $this->query['action'] = 'find_color_from_screen_rect';
        $this->query['color'] = $color;
        $this->query['a'] = $a;
        $this->query['b'] = $b;
        $this->query['c'] = $c;
        $this->query['d'] = $d;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return false;
    }
}