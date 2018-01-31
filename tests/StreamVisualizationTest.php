<?php declare(strict_types=1);

namespace Diy;

class StreamVisualizationTest extends \PHPUnit\Framework\TestCase
{
    public $scenario;

    public function testVisualizeStream()
    {
        $eventStore = EventStoreTest::initializeWithDefaults();

        $eventsOfStream = $eventStore->fetchEventsOfCart(12);

        print_r($eventsOfStream);
        $html = $this->visualizeStream(12, $eventsOfStream);

        file_put_contents(
            __DIR__ . '/../var/stream.html',
            $html
        );
    }

    private function visualizeStream($streamId, array $eventsOfStream)
    {
        $html = "<h1>Events in Stream '$streamId'</h1>\n";

        foreach ($eventsOfStream as $eventOfStream) {
            $html .= "<pre>" . print_r($eventOfStream, true) . "</pre>\n";
        }

        return $html;
    }
}
