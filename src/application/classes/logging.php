<?php

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\EdmType;

Class Logging
{
    private static $config;

    public function __construct()
    {
        self::$config = Config::get();
    }

    public static function createData($portalName, $apId, $userMail, $macId)
    {
        $connectionString = self::$config['logData']['connectionString'];
        $tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

        try{
            $tableRestProxy->createTable(self::$config['logData']['table']);
        }
        catch(ServiceException $e) {
            $code = $e->getCode();
            $error_message = $e->getMessage();
        }

        $entity = new Entity();
        $entity->setPartitionKey($portalName);
        $entity->setRowKey(uniqid());
        $entity->addProperty('EMail', EdmType::STRING, $userMail);
        $entity->addProperty('MAC', EdmType::STRING, $macId);
        $entity->addProperty('AP', EdmType::STRING, $apId);
        $entity->addProperty('Date', EdmType::DATETIME, new DateTime());
        $entity->addProperty('Location', EdmType::STRING, $portalName);

        try {
            $tableRestProxy->insertEntity(self::$config['logData']['table'], $entity);
        } catch (ServiceException $e) {
            $code = $e->getCode();
            $error_message = $e->getMessage();
        }
    }
}