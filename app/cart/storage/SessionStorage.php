<?php

namespace App\cart\storage;

use Session;

class SessionStorage implements StorageInterface
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function load(): array
    {
        return Session::get($this->key, []);
    }

    public function save(array $items)
    {
        Session::put($this->key, $items);
    }
} 