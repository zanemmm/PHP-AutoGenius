<?php
/**
 * Created by PhpStorm.
 * User: zane
 * Date: 2020/2/16
 * Time: 12:44
 */

namespace AutoGenius;


class HTTPClient
{
    private $ip;
    private $port;
    private $curl;

    public function __construct(string $ip, int $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->curl = curl_init();
    }

    public function get(array $query): array
    {
        $url = "http://{$this->ip}:{$this->port}/" . $this->parseQuery($query);
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_HEADER, "Accept-Encoding: gb2312");
        $response = iconv('gb2312', 'utf-8', curl_exec($this->curl));
        $res = json_decode($response, true);
        if ($res) {
            return $res;
        }
        return [];
    }

    private function parseQuery(array $query): string
    {
        $q = '?';
        foreach ($query as $k => $v) {
            $v = iconv('utf-8', 'gb2312', $v);
            $q .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        return $q;
    }
}