<?php declare(strict_types=1);

namespace Diy\Tools;

class EventGenerator
{
    private $target = '../Domain/';

    public function generateEvents()
    {
        $this->createClasses('events', 'Events', 'EventInterface');
    }

    public function generateCommands()
    {
        $this->createClasses('commands', 'Commands', 'CommandInterface');
    }

    private function createClasses($type, $targetDir, $interfaceName)
    {
        $events = require('../Domain/Definitions/' . $type . '.php');

        foreach ($events as $eventName => $eventDefinition) {
            $content = '<?php' . PHP_EOL .
                       'namespace Diy\\Domain\\' . $targetDir . ';' . PHP_EOL . PHP_EOL .
                       'class ' . $eventName . ' implements \\Diy\\Domain\\Interfaces\\' . $interfaceName . ' {' . PHP_EOL . PHP_EOL;

            // attributes
            foreach ($eventDefinition['attributes'] as $attributeName => $definition) {
                $content .= "    private \${$attributeName};" . PHP_EOL;
            }
            $content .= PHP_EOL;


            // constructor
            $content .= "    public function __construct($";
            $attributeNames = array_keys($eventDefinition['attributes']);
            $content .= implode(', $', $attributeNames);
            $content .= ")" . PHP_EOL . "    {" . PHP_EOL;

            // set the values
            foreach ($eventDefinition['attributes'] as $attributeName => $definition) {
                $content .= "        \$this->{$attributeName} = \${$attributeName};" . PHP_EOL;
            }
            $content .= "    }" . PHP_EOL . PHP_EOL;

            // getters
            foreach( $eventDefinition['attributes'] as $attributeName => $definition) {
                $content .= "    public function get{$attributeName}()" . PHP_EOL .
                            "    {" . PHP_EOL .
                            "         return \$this->{$attributeName};" . PHP_EOL .
                            "    }" . PHP_EOL . PHP_EOL;
            }

            // close class
            $content .= "}" . PHP_EOL;

            $path = $this->target . $targetDir . '/' . $eventName . '.php';
            file_put_contents(
                $path,
                $content
            );
        }
    }
}

$generator = new EventGenerator();
$generator->generateEvents();
$generator->generateCommands();