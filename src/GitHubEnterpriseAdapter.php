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

use Github\Client;
use Github\HttpClient\CachedHttpClient;
use Guzzle\Plugin\Log\LogPlugin;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Pierre du Plessis <pdples@gmail.com>
 */
class GitHubEnterpriseAdapter extends GitHubAdapter
{
    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return 'github_enterprise';
    }

    /**
     * @return Client
     */
    protected function buildGitHubClient()
    {
        $config = $this->configuration->get('github_enterprise');

        $cachedClient = new CachedHttpClient(
            [
                'cache_dir' => $this->configuration->get('cache-dir'),
                'base_url'  => $config['base_url'],
            ]
        );

        $client = new Client($cachedClient);

        if (false !== getenv('GITHUB_DEBUG')) {
            $logPlugin = LogPlugin::getDebugPlugin();
            $httpClient = $client->getHttpClient();
            $httpClient->addSubscriber($logPlugin);
        }

        $client->setOption('base_url', $config['base_url']);
        $this->url = rtrim($config['base_url'], '/');
        $this->domain = rtrim($config['repo_domain_url'], '/');

        return $client;
    }

    /**
     * {@inheritdoc}
     */
    public static function doConfiguration(OutputInterface $output, DialogHelper $dialog)
    {
        $config = [];

        $output->writeln('<comment>Enter your GitHub Enterprise URL: </comment>');

        while (empty($config['base_url'])) {
            $config['base_url'] = $dialog->askAndValidate(
                $output,
                'Api url: ',
                function ($url) {
                    return filter_var($url, FILTER_VALIDATE_URL);
                }
            );
        }

        while (empty($config['repo_domain_url'])) {
            $config['repo_domain_url'] = $dialog->askAndValidate(
                $output,
                'Repo domain url: ',
                function ($url) {
                    return filter_var($url, FILTER_VALIDATE_URL);
                }
            );
        }

        return $config;
    }
}

