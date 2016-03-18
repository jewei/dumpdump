# dumpdump

PHP var dump to file.

Sometimes you cannot `echo'<pre>';var_dump($var);die;` to send debug info to the
browser window. Especially during AJAX request or cron run. In such cases, you
can send the debug info to a separate channel, plain file. Imagine now you can
use console to `tail -f debug.txt`.

This is not a full-fledge debugger. If you're looking for one, you may want to
check these out:

* xdebug
* firephp
* [kint](http://raveren.github.io/kint/)
* [tracy](https://tracy.nette.org/)

## Installation

#### Install globally via Composer.
```
composer global require jewei/dumpdump
```

Add to php.ini so PHP can autoload.
```
auto_prepend_file = ${HOME}/.composer/vendor/autoload.php
```

#### Use the Git repository.

Git clone this repository and `require '/path/to/src/Dump.php';`.

## Usage

```
<?php
// /path/to/your/file.php

// If not installed globally, load it locally.
require __DIR__.'/vendor/autoload.php';

use Jewei\DumpDump\Dump;

// Var dump like a boss.
Dump::dump('hello', 'make this id 789');

// Dump using function.
$var = array('some', 'data', 'you', 'want', 'to', 'see');
dumpdump($var, 'this is optional id of coz');
```

Generated output:

```
[make this id 789]
Fri, 18 Mar 2016 16:16:53 +0800
/path/to/your/file.php dump:10
--------------------------------------------------------------------------------
string 'hello' (length=5)
--------------------------------------------------------------------------------

[this is optional id of coz]
Fri, 18 Mar 2016 16:16:53 +0800
/path/to/your/file.php dumpdump:14
--------------------------------------------------------------------------------

array (size=6)
  0 => string 'some' (length=4)
  1 => string 'data' (length=4)
  2 => string 'you' (length=3)
  3 => string 'want' (length=4)
  4 => string 'to' (length=2)
  5 => string 'see' (length=3)
--------------------------------------------------------------------------------
```

## Configuration

Copy config.json.dist to config.json.

```
{
    "file_name":"debug.txt",
    "display_time":true,
    "time_format":"r"
}
```

Edit the config value and save it.

```
filename - The file path where the output goes to.
display_time - Boolean show or no.
time_format - Accept PHP date() format.
```
