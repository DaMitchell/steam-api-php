<?php

namespace Steam\Api\Portal2;
 
use Steam\SteamTestCase;

class LeaderboardsTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testAnExceptionIsThrownIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $match = new Leaderboards();
        $match->setAdapter($this->_adapterMock);
        $match->getBucketizedData('test');
    }

    public function testGetBucketizedDataIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(620));

        $leaderboard = 'test';

        $url = 'IPortal2Leaderboards_620/GetBucketizedData/v1';
        $params = array(
            'leaderboardName' => $leaderboard,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $match = new Leaderboards();
        $match->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $match->getBucketizedData($leaderboard));
    }
}
