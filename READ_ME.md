This is a WordPress plugin used to help other plugins update directly from Github via the WordPress updater. At the moment, this only works with public repositories.

## Installation / Usage Instructions

1. Add this plugin to your `wp-content/plugins` folder.
2. Your plugin you'd like to add this to needs to be a publically accessible repository on Github.
3. Add the following to your plugin php code using the repository name / name of your plugin.

```
add_action( 'admin_init', array( $this, 'add_github_updating' ) );

/**
 * Allow this plugin to update from Github.
 *
 * @return void
 */
    public function add_github_updating() {

	    if ( ! is_plugin_active( 'wp-update-from-github/wp-update-from-github.php' ) ) {
			return;
		}

        require_once( ABSPATH . 'wp-content/plugins/wp-update-from-github/vendor/autoload.php' );
        use FigoliQuinn\WPUpdateFromGithub\WPUpdateFromGithub;
        new WPUpdateFromGithub( 'organization/repository-name', $path_to_your_plugin, $name_of_your_plugin );
	}
```
