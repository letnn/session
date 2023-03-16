<?php
namespace letnn\session\build;

interface InterfaceSession
{

    public function connect();

    public function read();

    public function gc();

    public function flush();

}

?>