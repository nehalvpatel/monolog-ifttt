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

Just like any other Monolog handler, you can change the minimum error level for the handler to fire.

```php
$log->pushHandler(new IFTTTHandler($IFTTTEventName, $IFTTTSecretKey, Logger::DEBUG)); // the minimum level is now debug
```

### Output

Once triggered, the handler will send values in this format:

- **Value1**: channel name *(eg: my_project_name)*
- **Value2**: log level name *(eg: ERROR)*
- **Value3**: log message *(eg: Database error.)*
