# monolog-ifttt
IFTTT handler for Monolog, which allows you to trigger IFTTT actions using Maker web requests.

## Installation

Install the latest version with

```bash
composer require nehalvpatel/monolog-ifttt
```

### Usage

```php
<?php

require_once("vendor/autoload.php");

use Monolog\Logger;
use nehalvpatel\IFTTTHandler;

// IFTTT settings
$IFTTTEventName = "my_project"; // you set this when you create a Maker recipe
$IFTTTSecretKey = "6XsC0NYPq2FScKz"; // you get this when you connect with the Maker channel

$log = new Logger("my_project_name");
$log->pushHandler(new IFTTTHandler($IFTTTEventName, $IFTTTSecretKey));

$log->addError("Database error.");
```

### Options

Just like any other Monolog handler, you can change the error level the handler controls. (the default is Logger::ERROR)

```php
$log->pushHandler(new IFTTTHandler("debug_occurred", $IFTTTSecretKey, Logger::DEBUG)); // debug
$log->pushHandler(new IFTTTHandler("info_occurred", $IFTTTSecretKey, Logger::INFO)); // info
$log->pushHandler(new IFTTTHandler("notice_occurred", $IFTTTSecretKey, Logger::NOTICE)); // notice
$log->pushHandler(new IFTTTHandler("warning_occurred", $IFTTTSecretKey, Logger::WARNING)); // warning
$log->pushHandler(new IFTTTHandler("error_occurred", $IFTTTSecretKey, Logger::ERROR)); // error
$log->pushHandler(new IFTTTHandler("critical_occurred", $IFTTTSecretKey, Logger::CRITICAL)); // critical
$log->pushHandler(new IFTTTHandler("alert_occurred", $IFTTTSecretKey, Logger::ALERT)); // alert
$log->pushHandler(new IFTTTHandler("emergency_occurred", $IFTTTSecretKey, Logger::EMERGENCY)); // emergency
```
