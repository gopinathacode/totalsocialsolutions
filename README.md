# TotalSocialSolutions.com

[![Build Status](https://dev.azure.com/aranasoft/Total%20Social%20Solutions/_apis/build/status/totalsocialsolutions.com?branchName=master)](https://dev.azure.com/aranasoft/Total%20Social%20Solutions/_build/latest?definitionId=58&branchName=master) ![Dependency Status](https://badgen.net/dependabot/aranasoft/totalsocialsolutions/275649090?icon=dependabot)

 - Test : ![Deployment Status](https://vsrm.dev.azure.com/aranasoft/_apis/public/Release/badge/7d214f79-4567-4ff4-8be2-b617a85faa87/1/1) https://totalsocialstg.wpengine.com
 - Production : ![Deployment Status](https://vsrm.dev.azure.com/aranasoft/_apis/public/Release/badge/7d214f79-4567-4ff4-8be2-b617a85faa87/1/2) https://www.totalsocialsolutions.com

## Bedrock Information
[Bedrock Website](https://roots.io) | [Documentation](https://roots.io/docs/bedrock/master/installation/)

## Required Dependencies

- PHP >= 7.4
- Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- Web Services via *any* of:
  - Apache
  - NGINX
  - Laravel Valet (macOS Only) - [Install](https://laravel.com/docs/valet#installation)
  - Docker - [Install](https://docs.docker.com/get-docker/)

## Getting started

1. Clone this repository
2. Create `.env` in the root folder to store environment variables. This file will be excluded and ignored by git. `.env.example` may be used as an example and template.
4. Update environment variables in the `.env` file. Wrap values that may contain non-alphanumeric characters with quotes, or they may be incorrectly parsed.

- Database variables
  - `DB_NAME` - Database name
  - `DB_USER` - Database user
  - `DB_PASSWORD` - Database password
  - `DB_HOST` - Database host
  - Optionally, you can define `DATABASE_URL` for using a DSN instead of using the variables above (e.g. `mysql://user:password@127.0.0.1:3306/db_name`)
- `WP_ENV` - Set to environment (`development`, `staging`, `production` | default: `production`)
- `WP_HOME` - Full URL to WordPress home (https://example.com)
- `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wp). This can reference other variables, such as `"${WP_HOME}/wp"`
- `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
  - Generate with [WordPress salts generator](https://roots.io/salts.html)
  - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)

4. Add theme(s) in `web/app/themes/` as you would for a normal WordPress site
5. Set the document root on your webserver to the `web` subfolder: `/path/to/site/web/`
6. Access WordPress admin at `https://example.com/wp/wp-admin/`

## Local Development Recommendations

### Laravel Valet

> **Requires:**
> - Operating System: macOS
> - Web Services: Laravel Valet
> - PHP: >=7.4
> - Composer

We recommend local development occur under Laravel Valet. This will give the most flexible access to local database access and to easily hosting the site under `https://your-project-folder-name.test`. The `WP_HOME` environment variable within `.env` should reflect this address.

**In `.env`:**
```
WP_HOME='http://your-project-folder-name.test'
```

## Local Development Alternatives

### Docker
> **Requires:**
> - Operating System: macOS
> - Web Services: Laravel Valet
> - PHP: >=7.4
> - Composer
> - Access to: [Arana's Docker Hub](https://hub.docker.com/orgs/aranasoft)

If you are not on macOS, or if you prefer to use Docker, a docker
container can be built with the following command executed within a
shell from the repository root:

```
docker-compose up --detach --build --force-recreate
```

This command will generate a new Docker container, linking the repository
directory to the container's NGINX instance.

Local development docker instances will be available at http://localhost:8080. The `WP_HOME` environment variable within `.env` should reflect this address.

**In `.env`:**
```
WP_HOME='http://localhost:8080'
```

## Remote Hosting

Bedrock can run on any web server that supports Composer and PHP >= 7.1.
The root document for the site must be pointed at the `web` subfolder.

### On NGINX

For remote development using NGINX, configure NGINX with the following
rules:

```
server {
  listen 80;
  server_name example.com;

  root /srv/www/example.com/web;
  index index.php index.htm index.html;

  # Prevent PHP scripts from being executed inside the uploads folder.
  location ~- /app/uploads/.*.php$ {
    deny all;
  }

  location / {
    try_files $uri $uri/ /index.php?$args;
  }
}
```

The `server_name` and `root` values should match the respective URL and path. Restart NGINX services after any updates to NGINX configuration.

## On Apache

For remote development using Apache, configure Apache with the following
rules:

```
<VirtualHost *:80>
    DocumentRoot /var/www/html/bedrock/web

    DirectoryIndex index.php index.html index.htm

    <Directory /var/www/html/bedrock/web>
        Options -Indexes

        # .htaccess isn't required if you include this
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteBase /
            RewriteRule ^index.php$ - [L]
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule . /index.php [L]
        </IfModule>
    </Directory>
</VirtualHost>
```

The `DocumentRoot` and `Directory` values should match the respective path for the `web` subfolder. Restart Apache services after any updates to Apache configuration.

Optionally, you can also add the suggested `.htaccess` file from
WordPress at `web/.htaccess`:

```
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

## Creating a New Project

Create a new project by generating a new repository from `aranasoft/bedrock` as a template.


