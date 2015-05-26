<?php

namespace Steam\Command\PublishedFileService;

use Steam\Command\CommandInterface;

class QueryFiles implements CommandInterface
{
    /**
     * enumeration EPublishedFileQueryType in clientenums.h.
     *
     * @var int
     */
    protected $queryType;

    /**
     * Current page
     *
     * @var int
     */
    protected $page = 1;

    /**
     * The number of results, per page to return.
     *
     * @var int
     */
    protected $numberPage = 10;

    /**
     * App that created the files.
     *
     * @var int
     */
    protected $creatorAppId;

    /**
     * App that consumes the files.
     *
     * @var int
     */
    protected $appId;

    /**
     * Tags to match on. See matchAllTags property.
     *
     * @var array
     */
    protected $requiredTags;

    /**
     * Tags that must NOT be present on a published file to satisfy the query.
     *
     * @var array
     */
    protected $excludedTags;

    /**
     * If true, then items must have all the tags specified, otherwise they must have at least one of the tags.
     *
     * @var bool
     */
    protected $matchAllTags = true;

    /**
     * Required flags that must be set on any returned items.
     *
     * @var array
     */
    protected $requiredFlags;

    /**
     * Flags that must not be set on any returned items.
     *
     * @var array
     */
    protected $omittedFlags;

    /**
     * Text to match in the item's title or description.
     *
     * @var string
     */
    protected $searchText;

    /**
     * EPublishedFileInfoMatchingFileType.
     *
     * @var int
     */
    protected $fileType;

    /**
     * Find all items that reference the given item.
     *
     * @var int
     */
    protected $childPublishedFileId;

    /**
     * If query_type is k_PublishedFileQueryType_RankedByTrend, then this is the number of days to get votes for [1,7].
     *
     * @var int
     */
    protected $days;

    /**
     * If query_type is k_PublishedFileQueryType_RankedByTrend, then limit result set just to items that have votes within the day range given.
     *
     * @var bool
     */
    protected $includeRecentVotesOnly = false;

    /**
     * Allow stale data to be returned for the specified number of seconds.
     *
     * @var int
     */
    protected $cacheMaxAgeSeconds = 0;

    /**
     * If true, only return the total number of files that satisfy this query.
     *
     * @var bool
     */
    protected $totalOnly = false;

    /**
     * Return vote data.
     *
     * @var bool
     */
    protected $returnVoteData = false;

    /**
     * Return tags in the file details.
     *
     * @var bool
     */
    protected $returnTags = false;

    /**
     * Return key-value tags in the file details.
     *
     * @var bool
     */
    protected $returnKvTags = false;

    /**
     * Return preview image and video details in the file details.
     *
     * @var bool
     */
    protected $returnPreviews = false;

    /**
     * Return child item ids in the file details.
     *
     * @var bool
     */
    protected $returnChildren = false;

    /**
     * Populate the short_description field instead of file_description.
     *
     * @var bool
     */
    protected $returnShortDescription = false;

    /**
     * Return pricing information, if applicable.
     *
     * @var bool
     */
    protected $returnForSaleData = false;

    /**
     * Populate the metadata.
     *
     * @var bool
     */
    protected $returnMetadata = false;

    /**
     * @param int $queryType
     *
     * @return self
     */
    public function setQueryType($queryType)
    {
        $this->queryType = (int) $queryType;
        return $this;
    }

    /**
     * @param int $page
     *
     * @return self
     */
    public function setPage($page)
    {
        $this->page = (int) $page;
        return $this;
    }

    /**
     * @param int $numberPage
     *
     * @return self
     */
    public function setNumberPage($numberPage)
    {
        $this->numberPage = (int) $numberPage;
        return $this;
    }

    /**
     * @param int $creatorAppId
     *
     * @return self
     */
    public function setCreatorAppId($creatorAppId)
    {
        $this->creatorAppId = (int) $creatorAppId;
        return $this;
    }

    /**
     * @param int $appId
     *
     * @return self
     */
    public function setAppId($appId)
    {
        $this->appId = (int) $appId;
        return $this;
    }

    /**
     * @param array $requiredTags
     *
     * @return self
     */
    public function setRequiredTags(array $requiredTags)
    {
        $this->requiredTags = $requiredTags;
        return $this;
    }

    /**
     * @param array $excludedTags
     *
     * @return self
     */
    public function setExcludedTags(array $excludedTags)
    {
        $this->excludedTags = $excludedTags;
        return $this;
    }

    /**
     * @param boolean $matchAllTags
     *
     * @return self
     */
    public function setMatchAllTags($matchAllTags)
    {
        $this->matchAllTags = (bool) $matchAllTags;
        return $this;
    }

    /**
     * @param array $requiredFlags
     *
     * @return self
     */
    public function setRequiredFlags(array $requiredFlags)
    {
        $this->requiredFlags = $requiredFlags;
        return $this;
    }

    /**
     * @param array $omittedFlags
     *
     * @return self
     */
    public function setOmittedFlags(array $omittedFlags)
    {
        $this->omittedFlags = $omittedFlags;
        return $this;
    }

    /**
     * @param string $searchText
     *
     * @return self
     */
    public function setSearchText($searchText)
    {
        $this->searchText = $searchText;
        return $this;
    }

    /**
     * @param int $fileType
     *
     * @return self
     */
    public function setFileType($fileType)
    {
        $this->fileType = (int) $fileType;
        return $this;
    }

    /**
     * @param int $childPublishedFileId
     *
     * @return self
     */
    public function setChildPublishedFileId($childPublishedFileId)
    {
        $this->childPublishedFileId = (int) $childPublishedFileId;
        return $this;
    }

    /**
     * @param int $days
     *
     * @return self
     */
    public function setDays($days)
    {
        $this->days = (int) $days;
        return $this;
    }

    /**
     * @param boolean $includeRecentVotesOnly
     *
     * @return self
     */
    public function setIncludeRecentVotesOnly($includeRecentVotesOnly)
    {
        $this->includeRecentVotesOnly = (bool) $includeRecentVotesOnly;
        return $this;
    }

    /**
     * @param int $cacheMaxAgeSeconds
     *
     * @return self
     */
    public function setCacheMaxAgeSeconds($cacheMaxAgeSeconds)
    {
        $this->cacheMaxAgeSeconds = (int) $cacheMaxAgeSeconds;
        return $this;
    }

    /**
     * @param boolean $totalOnly
     *
     * @return self
     */
    public function setTotalOnly($totalOnly)
    {
        $this->totalOnly = (bool) $totalOnly;
        return $this;
    }

    /**
     * @param boolean $returnVoteData
     *
     * @return self
     */
    public function setReturnVoteData($returnVoteData)
    {
        $this->returnVoteData = (bool) $returnVoteData;
        return $this;
    }

    /**
     * @param boolean $returnTags
     *
     * @return self
     */
    public function setReturnTags($returnTags)
    {
        $this->returnTags = (bool) $returnTags;
        return $this;
    }

    /**
     * @param boolean $returnKvTags
     *
     * @return self
     */
    public function setReturnKvTags($returnKvTags)
    {
        $this->returnKvTags = (bool) $returnKvTags;
        return $this;
    }

    /**
     * @param boolean $returnPreviews
     *
     * @return self
     */
    public function setReturnPreviews($returnPreviews)
    {
        $this->returnPreviews = (bool) $returnPreviews;
        return $this;
    }

    /**
     * @param boolean $returnChildren
     *
     * @return self
     */
    public function setReturnChildren($returnChildren)
    {
        $this->returnChildren = (bool) $returnChildren;
        return $this;
    }

    /**
     * @param boolean $returnShortDescription
     *
     * @return self
     */
    public function setReturnShortDescription($returnShortDescription)
    {
        $this->returnShortDescription = (bool) $returnShortDescription;
        return $this;
    }

    /**
     * @param boolean $returnForSaleData
     *
     * @return self
     */
    public function setReturnForSaleData($returnForSaleData)
    {
        $this->returnForSaleData = (bool) $returnForSaleData;
        return $this;
    }

    /**
     * @param boolean $returnMetadata
     *
     * @return self
     */
    public function setReturnMetadata($returnMetadata)
    {
        $this->returnMetadata = (bool) $returnMetadata;
        return $this;
    }

    public function getInterface()
    {
        return 'IPublishedFileService';
    }

    public function getMethod()
    {
        return 'QueryFiles';
    }

    public function getVersion()
    {
        return 'v1';
    }

    public function getRequestMethod()
    {
        return 'GET';
    }

    public function getParams()
    {
        $params = [
            'page' => $this->page,
            'numberpage' => $this->numberPage,
            'match_all_tags' => $this->matchAllTags,
            'cache_max_age_seconds' => $this->cacheMaxAgeSeconds,
            'include_recent_votes_only' => $this->includeRecentVotesOnly,
            'totalonly' => $this->totalOnly,
            'return_vote_data' => $this->returnVoteData,
            'return_tags' => $this->returnTags,
            'return_kv_tags' => $this->returnKvTags,
            'return_previews' => $this->returnPreviews,
            'return_children' => $this->returnChildren,
            'return_short_description' => $this->returnShortDescription,
            'return_for_sale_data' => $this->returnForSaleData,
            'return_metadata' => $this->returnMetadata,
        ];

        empty($this->queryType) ?: $params['query_type'] = $this->queryType;
        empty($this->creatorAppId) ?: $params['creator_appid'] = $this->creatorAppId;
        empty($this->appId) ?: $params['appid'] = $this->appId;
        empty($this->requiredTags) ?: $params['requiredtags'] = implode(',', $this->requiredTags);
        empty($this->excludedTags) ?: $params['excludedtags'] = implode(',', $this->excludedTags);
        empty($this->requiredFlags) ?: $params['required_flags'] = implode(',', $this->requiredFlags);
        empty($this->omittedFlags) ?: $params['omitted_flags'] = implode(',', $this->omittedFlags);
        empty($this->searchText) ?: $params['search_text'] = $this->searchText;
        empty($this->fileType) ?: $params['filetype'] = $this->fileType;
        empty($this->childPublishedFileId) ?: $params['child_publishedfileid'] = $this->childPublishedFileId;
        empty($this->days) ?: $params['days'] = $this->days;

        return $params;
    }
}
