<?php

namespace Consumer\Service;

use PhpPact\Consumer\MessageBuilder;
use PhpPact\Standalone\PactMessage\PactMessageConfig;
use PHPUnit\Framework\TestCase;

class MessageConsumerTest extends TestCase
{

    /**
     * @throws \PhpPact\Standalone\Exception\MissingEnvVariableException
     */
    public function testMessage()
    {
        $config = new PactMessageConfig();
        $config->setConsumer("test_consumer");
        $config->setProvider("test_provider");
        $config->setPactDir("D:\\Temp\\");

        $builder    = new MessageBuilder($config);

        $content    = new \stdClass();
        $content->text = "Hello Mary!!";

        $metadata = ["queue"=>"wind cries"];

        $builder
            ->given('a hello message')
            ->expectsToReceive('an alligator named Mary exists')
            ->withMetadata($metadata)
            ->withContent($content);

        $json = $builder->reify();

        // should we use a call back?

        // invoke send this json to a consumer
        // should we deserialize it first?  do we require that the consumer deserializes given the lack of json mapping classes?

        // wrap in a try catch?
        // how do we fail?

        // update message interaction
        $builder->finalize();

        $this->assertTrue(true, "random assert");
    }
}
