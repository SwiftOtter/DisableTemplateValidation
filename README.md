# Disable Template Validation (M2 Toolkit)
### Credits go to Alan Storm (@astorm)

Magento 2 does not allow symlinked files. This is a security feature. However for some development environments (like ours at SwiftOtter)
this can cause issues as we *really* like keep our files completely separate from Magento (so we don't accidentally mix some core code
into the website repository). This also keeps the `.gitignore` to a minimum.

To solve this, Alan Storm [posted this article](http://magento-quickies.alanstorm.com/post/146627295610/magento-2-symlinks-for-modules). It,
as usual, is an excellent read.

That said, if you want to take this even a step easier, just use this module:

* `composer require-dev swiftotter/disable-template-validation`
* `php bin/magento module:enable SwiftOtter_DisableTemplateValidation`
* `php bin/magento setup:upgrade`

## Notes:

* This only runs if the [deploy mode](http://devdocs.magento.com/guides/v2.0/config-guide/cli/config-cli-subcommands-mode.html)
is set to development.
* Be aware of the fact that installing the module in the `dev` composer area means that it isn't installed on production sites
(as I hope you are installing composer there with `--no-dev`). Depending on how you get code to production, and if you track all of Magento
in your repository, you may have some issues with modules not being found.