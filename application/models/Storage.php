<?php

namespace App\models;

use App\lib\Exceptions\StorageException;
use App\FileLogger;

class Storage
{
    public array $storage = [];

    public function __construct($amountProducts)
    {
        $this->storage = $amountProducts;
    }

    public function getProduct($id)
    {
        if ($this->storage[$id] == 0 || empty($this->storage[$id])) {
            throw new StorageException("Товара нет");
        }
        return $this->storage[$id];
    }
}

$storage = new Storage($amountProducts);
$logger = new FileLogger();
foreach ($amountProducts as $key => $val) {
    try {
        echo $storage->getProduct($key);
    } catch (StorageException $e) {
        $logger->warning($e->getMessage());
    } catch (\Exception $e) {
        $logger->error($e->getMessage());
        die();
    }
}
