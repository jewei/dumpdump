# dumpdump
PHP var dump to file.

## Usage

```
require 'dumpdump.php';
dumpdump('hello', 'string output');
dumpdump(array('a','b'), 'vardump an array');
```

Generated output:

```
[string output]
Thu, 17 Mar 2016 17:53:16 +0800
/var/www/projects/dumpdump/console dumpdump:8
--------------------------------------------------------------------------------
string(5) "hello"
--------------------------------------------------------------------------------

[vardump an array]
Thu, 17 Mar 2016 17:53:16 +0800
/var/www/projects/dumpdump/console dumpdump:9
--------------------------------------------------------------------------------
array(2) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
}
--------------------------------------------------------------------------------
```
