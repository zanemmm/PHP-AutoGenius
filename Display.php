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

    public function findImageFromScreen(string $imagePath): array
    {
        $this->query['action'] = 'find_image_from_screen';
        $this->query['image_path'] = $imagePath;
        $res = $this->client->get($this->query);
        if (isset($res['code']) && $res['code'] == 200) {
            return $res['data'];
        }
        return [];
    }
}