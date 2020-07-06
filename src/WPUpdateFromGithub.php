<?php

namespace FigoliQuinn\WPUpdateFromGithub;

if (!defined('ABSPATH')) exit;

class WPUpdateFromGithub 
{
    const GITHUB_URL = 'https://github.com/';
    protected $repository;
    protected $plugin_path;
    protected $plugin_name;

    public function __construct( string $repository, string $plugin_path, string $plugin_name, bool $private_repository = false )
    {
        $this->repository = $repository;
        $this->plugin_path = $plugin_path;
        $this->plugin_name = $plugin_name;

        $this->register_github_updating();
    }

    protected function register_github_updating(): void
    {
        require_once( './PluginUpdateChecker/plugin-update-checker.php' );
        $my_update_checker = \Puc_v4_Factory::buildUpdateChecker(
            $this->format_repository_url(),
            $this->plugin_path,
            $plugin_name
        );

        $my_update_checker->getVcsApi()->enableReleaseAssets();

        if ( $this->private_repository ) {
            $my_update_checker->setAuthentication( $this->get_github_access_token );
        }
    }

    protected function format_repository_url(): string 
    {
        return SELF::GITHUB_URL . $this->repository;
    }
}