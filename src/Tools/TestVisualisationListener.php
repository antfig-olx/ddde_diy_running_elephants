<?php declare(strict_types=1);

namespace Diy\Tools;

use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestListenerDefaultImplementation;

class TestVisualisationListener implements TestListener
{
    use TestListenerDefaultImplementation;

    public function endTest(Test $test, $time)
    {
        $this->extractData($test);
    }

    private function extractData(Test $test)
    {
        $testName = get_class($test);
        $testMethod= $test->getName();
        $scenario = $test->scenario;
    }
}