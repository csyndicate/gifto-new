<?php namespace Rollbar;

use Rollbar\ErrorWrapper;

class ErrorWrapperTest extends BaseRollbarTest
{
    public function testBacktrace(): void
    {
        $errWrapper = new ErrorWrapper(
            E_ERROR,
            "",
            null,
            null,
            ['fake' => 'FAKE BACKTRACE'],
            new Utilities
        );
        $this->assertEquals(['fake' => 'FAKE BACKTRACE'], $errWrapper->getBacktrace());
    }

    public function testGetClassName(): void
    {
        $errWrapper = new ErrorWrapper(
            E_ERROR,
            "Message Content",
            null,
            null,
            null,
            new Utilities
        );
        $this->assertEquals("E_ERROR", $errWrapper->getClassName());

        $errWrapper = new ErrorWrapper(
            3,
            "Fake Error Number",
            null,
            null,
            null,
            new Utilities
        );
        $this->assertEquals("#3", $errWrapper->getClassName());
    }
}
