<?php
/**
 * Created by PhpStorm.
 * User: quangtam
 * Date: 2019-01-08
 * Time: 14:56
 */

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private $access_key = '';

    /**
     * Just check if the YourClass has no syntax error
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     *
     */
    public function testIsThereAnySyntaxError()
    {
        $var = new \AccessTrade\Api\Api();
        $this->assertTrue(is_object($var));
        unset($var);
    }

    /**
     * Test get campaigns
     */
    public function testCampaigns()
    {
        $var = new \AccessTrade\Api\Api($this->access_key);
        $this->assertTrue(is_object($var->getCampaigns()));
        unset($var);
    }

    public function testTransactions()
    {
        $var = new \AccessTrade\Api\Api($this->access_key);
        $this->assertTrue(is_object($var->getTransactions()));
        unset($var);
    }
}