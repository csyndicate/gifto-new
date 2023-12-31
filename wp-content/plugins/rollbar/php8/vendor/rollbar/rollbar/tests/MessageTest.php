<?php namespace Rollbar\Payload;

use Rollbar;

class MessageTest extends Rollbar\BaseRollbarTest
{
    public function testBacktrace(): void
    {
        $expected = array('trace 1' => 'value 1');
        $msg = new Message("Test", $expected);
        $this->assertEquals($expected, $msg->getBacktrace());
    }
    
    public function testBody(): void
    {
        $msg = new Message("Test");
        $this->assertEquals("Test", $msg->getBody());

        $this->assertEquals("Test2", $msg->setBody("Test2")->getBody());
    }

    public function testMessageKey(): void
    {
        $msg = new Message("Test");
        $this->assertEquals("message", $msg->getKey());
    }
}
