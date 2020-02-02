<?php
    class Source extends Chai_Console{
        public function page($base, $page = "/"){
            $client = new GuzzleHttp\Client(['base_uri' => $base]);
            $response = $client->request('GET', $page);
            self::write($response->getBody());
        }
    }