<?php

namespace Steam\Command\PublishedFileService;

use Steam\Command\CommandInterface;

class QueryFilesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var QueryFiles
     */
    protected $instance;

    public function setUp()
    {
        $this->instance = new QueryFiles();
    }

    public function testImplementsInterface()
    {
        $this->assertTrue($this->instance instanceof CommandInterface);
    }

    public function testValues()
    {
        $this->assertEquals('IPublishedFileService', $this->instance->getInterface());
        $this->assertEquals('QueryFiles', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([
            'page' => 1,
            'numberpage' => 10,
            'match_all_tags' => true,
            'cache_max_age_seconds' => 0,
            'include_recent_votes_only' => false,
            'totalonly' => false,
            'return_vote_data' => false,
            'return_tags' => false,
            'return_kv_tags' => false,
            'return_previews' => false,
            'return_children' => false,
            'return_short_description' => false,
            'return_for_sale_data' => false,
            'return_metadata' => false,
        ], $this->instance->getParams());
    }

    public function testSettingQueryType()
    {
        $this->instance->setQueryType(1);
        $this->assertParams(['query_type' => 1]);
    }

    public function testSettingPage()
    {
        $this->instance->setPage(2);
        $this->assertParams(['page' => 2]);
    }

    public function testSettingNumberPage()
    {
        $this->instance->setNumberPage(20);
        $this->assertParams(['numberpage' => 20]);
    }

    public function testSettingCreatorAppId()
    {
        $this->instance->setCreatorAppId(570);
        $this->assertParams(['creator_appid' => 570]);
    }

    public function testSettingAppId()
    {
        $this->instance->setAppId(570);
        $this->assertParams(['appid' => 570]);
    }

    public function testSettingRequiredTags()
    {
        $this->instance->setRequiredTags(['test']);
        $this->assertParams(['requiredtags' => 'test']);
    }

    public function testSettingExcludedTags()
    {
        $this->instance->setExcludedTags(['test']);
        $this->assertParams(['excludedtags' => 'test']);
    }

    public function testSettingMatchAllTags()
    {
        $this->instance->setMatchAllTags(false);
        $this->assertParams(['match_all_tags' => false]);
    }

    public function testSettingRequiredFlags()
    {
        $this->instance->setRequiredFlags(['test']);
        $this->assertParams(['required_flags' => 'test']);
    }

    public function testSettingOmittedFlags()
    {
        $this->instance->setOmittedFlags(['test']);
        $this->assertParams(['omitted_flags' => 'test']);
    }

    public function testSettingSearchTest()
    {
        $this->instance->setSearchText('test');
        $this->assertParams(['search_text' => 'test']);
    }

    public function testSettingFileType()
    {
        $this->instance->setFileType(1);
        $this->assertParams(['filetype' => 1]);
    }

    public function testSettingChildPublishedFileId()
    {
        $this->instance->setChildPublishedFileId(123);
        $this->assertParams(['child_publishedfileid' => 123]);
    }

    public function testSettingDays()
    {
        $this->instance->setDays(12);
        $this->assertParams(['days' => 12]);
    }

    public function testSettingIncludeRecentVotesOnly()
    {
        $this->instance->setIncludeRecentVotesOnly(true);
        $this->assertParams(['include_recent_votes_only' => true]);
    }

    public function testSettingCacheMaxAgeSeconds()
    {
        $this->instance->setCacheMaxAgeSeconds(1000);
        $this->assertParams(['cache_max_age_seconds' => 1000]);
    }

    public function testSettingTotalOnly()
    {
        $this->instance->setTotalOnly(true);
        $this->assertParams(['totalonly' => true]);
    }

    public function testSettingReturnVoteData()
    {
        $this->instance->setReturnVoteData(true);
        $this->assertParams(['return_vote_data' => true]);
    }

    public function testSettingReturnTags()
    {
        $this->instance->setReturnTags(true);
        $this->assertParams(['return_tags' => true]);
    }

    public function testSettingReturnKvTags()
    {
        $this->instance->setReturnKvTags(true);
        $this->assertParams(['return_kv_tags' => true]);
    }

    public function testSettingReturnPreviews()
    {
        $this->instance->setReturnPreviews(true);
        $this->assertParams(['return_previews' => true]);
    }

    public function testSettingReturnChildren()
    {
        $this->instance->setReturnChildren(true);
        $this->assertParams(['return_children' => true]);
    }

    public function testSettingReturnShortDescription()
    {
        $this->instance->setReturnShortDescription(true);
        $this->assertParams(['return_short_description' => true]);
    }

    public function testSettingReturnForSaleData()
    {
        $this->instance->setReturnForSaleData(true);
        $this->assertParams(['return_for_sale_data' => true]);
    }

    public function testSettingReturnMetadata()
    {
        $this->instance->setReturnMetadata(true);
        $this->assertParams(['return_metadata' => true]);
    }

    public function assertParams($params)
    {
        $this->assertEquals(array_merge([
            'page' => 1,
            'numberpage' => 10,
            'match_all_tags' => true,
            'cache_max_age_seconds' => 0,
            'include_recent_votes_only' => false,
            'totalonly' => false,
            'return_vote_data' => false,
            'return_tags' => false,
            'return_kv_tags' => false,
            'return_previews' => false,
            'return_children' => false,
            'return_short_description' => false,
            'return_for_sale_data' => false,
            'return_metadata' => false,
        ], $params), $this->instance->getParams());
    }
}
 