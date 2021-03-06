<?php

namespace plimpton\Bundle\GuzzleBundle\Tests\Log;

use plimpton\Bundle\GuzzleBundle\Log\LogGroup;

/**
 * @version   2.1
 * @since     2015-05
 */
class LogGroupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Setting/Returning Request Name
     *
     * @version 2.1
     * @since   2015-05
     *
     * @covers  plimpton\Bundle\GuzzleBundle\Log\LogGroup::setRequestName
     * @covers  plimpton\Bundle\GuzzleBundle\Log\LogGroup::getRequestName
     */
    public function testRequestName()
    {
        $group = new LogGroup();

        $this->assertNull($group->getRequestName());

        $group->setRequestName('test');

        $this->assertSame('test', $group->getRequestName());
    }

    /**
     * Test Setting/Returning Log Messages
     *
     * @version 2.1
     * @since   2015-05
     *
     * @covers  plimpton\Bundle\GuzzleBundle\Log\LogGroup::setMessages
     * @covers  plimpton\Bundle\GuzzleBundle\Log\LogGroup::getMessages
     */
    public function testMessages()
    {
        $group = new LogGroup();

        $this->assertTrue(is_array($group->getMessages()));
        $this->assertEmpty($group->getMessages());

        $message1 = $this->getMockBuilder('plimpton\Bundle\GuzzleBundle\Log\LogMessage')
                         ->disableOriginalConstructor()
                         ->getMock();

        $message2 = $this->getMockBuilder('plimpton\Bundle\GuzzleBundle\Log\LogMessage')
                         ->disableOriginalConstructor()
                         ->getMock();

        $message3 = $this->getMockBuilder('plimpton\Bundle\GuzzleBundle\Log\LogMessage')
                         ->disableOriginalConstructor()
                         ->getMock();

        $messages = [$message1, $message2];

        $group->setMessages($messages);

        $this->assertCount(2, $group->getMessages());

        $group->addMessages([$message3]);

        $this->assertCount(3, $group->getMessages());

        foreach($group->getMessages() as $message) {

            $this->assertInstanceOf('plimpton\Bundle\GuzzleBundle\Log\LogMessage', $message);
        }

        // reset messages
        $group->setMessages([]);

        $this->assertTrue(is_array($group->getMessages()));
        $this->assertEmpty($group->getMessages());
    }
}
