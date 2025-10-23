# DynamicConfig

[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Latest Version](https://img.shields.io/github/v/tag/mahankals/cakephp-plugin-dynamicconfig?label=Git%20Latest)](https://github.com/mahankals/cakephp-plugin-dynamicconfig)
[![Stable Version](https://img.shields.io/github/v/release/mahankals/cakephp-plugin-dynamicconfig?label=Git%20Stable&sort=semver)](https://github.com/mahankals/cakephp-plugin-dynamicconfig/releases)
[![Total Downloads](https://img.shields.io/github/downloads/mahankals/cakephp-plugin-dynamicconfig/total?label=Git%20Downloads)](https://github.com/mahankals/cakephp-plugin-dynamicconfig/releases)

[![GitHub Stars](https://img.shields.io/github/stars/mahankals/cakephp-plugin-dynamicconfig?style=social)](https://github.com/mahankals/cakephp-plugin-dynamicconfig/stargazers)
[![GitHub Forks](https://img.shields.io/github/forks/mahankals/cakephp-plugin-dynamicconfig?style=social)](https://github.com/mahankals/cakephp-plugin-dynamicconfig/network/members)
[![GitHub Watchers](https://img.shields.io/github/watchers/mahankals/cakephp-plugin-dynamicconfig?style=social)](https://github.com/mahankals/cakephp-plugin-dynamicconfig/watchers)


<!-- packagist details
[![Latest Stable Version](https://poser.pugx.org/mahankals/cakephp-plugin-dynamicconfig/v/stable)](https://packagist.org/packages/mahankals/cakephp-plugin-dynamicconfig)
[![Total Downloads](https://poser.pugx.org/mahankals/cakephp-plugin-dynamicconfig/downloads)](https://packagist.org/packages/mahankals/cakephp-plugin-dynamicconfig)
-->

Update config from UI instead of changing fron backend & store it into database.

---

## Features

- Load & Update configuration from database

## Installation

You can install this plugin directly from GitHub using Composer:

1. Add the GitHub repository to your app's `composer.json`:

   ```json
   "repositories": [
       {
           "type": "vcs",
           "url": "https://github.com/mahankals/cakephp-plugin-dynamicconfig"
       }
   ]
   ```

1. Require the plugin via Composer:

   ```bash
   composer require mahankals/cakephp-plugin-dynamicconfig
   ```

1. Load the plugin

   **Method 1: from terminal**

   ```bash
   bin/cake plugin load DynamicConfig
   ```

   **Method 2: load in `Application.php`, bootstrap method**

   ```bash
   $this->addPlugin('DynamicConfig');
   ```

## Create tables with migration

```bash
 bin/cake migrations migrate --plugin DynamicConfig
 ```

## Update config value

You can update config value from [http://localhost:8765/configuration](http://localhost:8765/configuration) url.

## Debug Config (optional)

```html
<div><b>TimeZone: </b><?= \Cake\Core\Configure::read('App.defaultTimezone') ?></div>
<div><b>Current Time: </b><?= \Cake\I18n\DateTime::now(); ?></div>
```
**Note:** Update `App.defaultTimezone` & check Current Time.

## Customization (optional)

You can publish templates for customization:

```bash
bin/cake dynamicconfig publish
```

## Contributing

Contributions, issues, and feature requests are welcome!

## Author

[Atul Devichand Mahankal](https://atulmahankal.github.io/atulmahankal/)

## License

This library is available as open source under the terms of the [MIT License](https://opensource.org/licenses/MIT).
