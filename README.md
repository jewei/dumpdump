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

Add to PHP.ini so PHP can autoload.
```
auto_prepend_file = ~/.composer/vendor/autoload.php
```

#### Use the Git repository.

Git clone this repository and `require '/path/to/src/Dump.php';`.

## Usage

```
<?php
// /path/to/your/file.php

// Var dump like a boss.
Dump::dump('hello', 'string output');

// Dump using function.
dumpdump(array('a','b'), 'vardump an array');
```

Generated output:

```
[string output]
Thu, 17 Mar 2016 17:53:16 +0800
/path/to/your/file.php dumpdump:8
--------------------------------------------------------------------------------
string(5) "hello"
--------------------------------------------------------------------------------

[vardump an array]
Thu, 17 Mar 2016 17:53:16 +0800
/path/to/your/file.php dumpdump:11
--------------------------------------------------------------------------------
array(2) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
}
--------------------------------------------------------------------------------
```
