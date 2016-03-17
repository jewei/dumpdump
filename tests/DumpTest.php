<?php

namespace Jewei\DumpDump\Test;

use Jewei\DumpDump\Dump;

class DumpTest extends \PHPUnit_Framework_TestCase
{
    public function testString()
    {
        // Reset the output file.
        file_put_contents('debug.txt', '');

        // Perform the dump.
        Dump::dump('lorem ipsum');
        $line = __LINE__;
        --$line;
        $file = __FILE__;
        $datetime = new \Datetime();
        $time = $datetime->format('r');
        $expectation = <<<FILEOUTPUT

$time
$file dump:$line
--------------------------------------------------------------------------------
string(11) "lorem ipsum"
--------------------------------------------------------------------------------

FILEOUTPUT;

        $this->assertEquals($expectation, file_get_contents('debug.txt'));
    }

    public function testArray()
    {
        // Reset the output file.
        file_put_contents('debug.txt', '');

        // Perform the dump.
        Dump::dump(array('a', 'b'));
        $line = __LINE__;
        --$line;
        $file = __FILE__;
        $datetime = new \Datetime();
        $time = $datetime->format('r');
        $expectation = <<<FILEOUTPUT

$time
$file dump:$line
--------------------------------------------------------------------------------
array(2) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
}
--------------------------------------------------------------------------------

FILEOUTPUT;

        $this->assertEquals($expectation, file_get_contents('debug.txt'));
    }

    public function testObject()
    {
        // Reset the output file.
        file_put_contents('debug.txt', '');

        // Perform the dump.
        Dump::dump(new \stdClass());
        $line = __LINE__;
        --$line;
        $file = __FILE__;
        $datetime = new \Datetime();
        $time = $datetime->format('r');
        $expectation = <<<FILEOUTPUT

$time
$file dump:$line
--------------------------------------------------------------------------------
object(stdClass)#20 (0) {
}
--------------------------------------------------------------------------------

FILEOUTPUT;

        $this->assertEquals($expectation, file_get_contents('debug.txt'));
    }
}
