<?php

/**
 * This file is part of Gush.
 *
 * (c) Luis Cordova <cordoval@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Gush\Adapter;

use Gush\Config;
use Gush\Exception\AdapterException;
use Gush\Util\ArrayUtil;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 */
class ElephantAdapter extends BaseAdapter implements IssueTracker
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var \Gush\Config
     */
    protected $globalConfig;

    /**
     * @param array  $config
     * @param Config $globalConfig
     */
    public function __construct(array $config, Config $globalConfig)
    {
        $this->config = $config;
        $this->globalConfig = $globalConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsRepository($remoteUrl)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function isAuthenticated()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenGenerationUrl()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function createFork($org)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function openIssue($subject, $body, array $options = [])
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getIssue($id)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getIssueUrl($id)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getIssues(array $parameters = [], $page = 1, $perPage = 30)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function updateIssue($id, array $parameters)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function closeIssue($id)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function createComment($id, $message)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getComments($id)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getLabels()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getMilestones(array $parameters = [])
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function openPullRequest($base, $head, $subject, $body, array $parameters = [])
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequest($id)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequestUrl($id)
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequestCommits($id)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function mergePullRequest($id, $message)
    {
        return '';
    }


    /**
     * {@inheritdoc}
     */
    public function updatePullRequest($id, array $parameters)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function closePullRequest($id)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequests($state = null, $page = 1, $perPage = 30)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getPullRequestStates()
    {
        return [
            'open',
            'closed',
            'all',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createRelease($name, array $parameters = [])
    {
        return [
            'url' => '',
            'id' => '',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getReleases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function removeRelease($id)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function createReleaseAssets($id, $name, $contentType, $content)
    {
        return null;
    }
}
