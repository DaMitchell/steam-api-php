<?php

namespace Steam\Api\Items;

use Steam\Api\Items\Promos;
use Steam\SteamTestCase;

class PromosTest extends SteamTestCase
{
    /**
     * @expectedException \Steam\Api\Exception\InsufficientParameters
     */
    public function testAnExceptionIsThrownIfNoAppIdIsSet()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(null));

        $promos = new Promos();
        $promos->setAdapter($this->_adapterMock);
        $promos->getItemId(3423423424, 123);
    }

    public function testGetLeagueListingIsCalledWithCorrectParams()
    {
        $this->_configMock->expects($this->once())->method('getAppId')->will($this->returnValue(570));

        $steamId = 234234234;
        $promoId = 12334;

        $url = 'ITFPromos_570/GetItemID/v1';
        $params = array(
            'steamid' => $steamId,
            'PromoID' => $promoId,
        );

        $result = array('result' => array());

        $this->_adapterMock->expects($this->once())->method('request')->with($url, $params);
        $this->_adapterMock->expects($this->once())->method('getParsedBody')->will($this->returnValue($result));

        $promos = new Promos();
        $promos->setAdapter($this->_adapterMock);

        $this->assertEquals($result, $promos->getItemId($steamId, $promoId));
    }

    /**
     * @expectedException \Steam\Api\Exception\ApiNotImplementedException
     */
    public function testGrantItemThrowsHasNotBeenImplementedException()
    {
        $promos = new Promos();
        $promos->grantItem(123123, 242342);
    }
}
