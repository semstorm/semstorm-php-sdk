# CHANGELOG

## 3.0.x
- 3.0.1 (2018-08-14)
  - New endpoints for Explorer and Monitoring.
  - Create ExplorerDomains->visibility endpoint - copy of ExplorerVisiblity->getData for backwards compability.
- 3.0.0 (2018-06-19)
  - Update files, tags, and descriptions to version 3.0.0.

## 0.0.x
- 0.0.7 (2018-06-19)
  - Add Technology API beta with documentation.
  - Add Keywords API beta with documentation.
- 0.0.6 (2018-05-14)
  - Add examples for explorer.
  - Add audits documentation.
- 0.0.6 (2018-04-10)
  - Disable endpoints explorer-urls and tools as they will be refactored.
  - Make simple filters and sorting available in explorer.
  - Create basic explorer documentation.
- 0.0.5 (2018-01-05)
  - Simplify filter usage. Remove SemstormFilters class, all filters are send as simple parameters.
  - Add more examples.
  - Extend documentation.
- 0.0.4 (2017-12-18)
  - Add retrieving detailed data for Keywords in 'monitoring-keyword/get-details' endpoint.
  - Add Campaign access management in 'monitoring-campaign/get-access', and 'monitoring-campaign/set-access' endpoints.
  - Change returning structure to assoc array everywhere.
- 0.0.3 (2017-12-05)
  - Add bulk operations for status changes for Monitoring entites (Campaign, Group, Keyword).
  - Groups now can have only one engine-country pair, and one location, for higher clearness.
  - Remove 'tags' functionallity from Monitoring.
  - Change ExplorerFilters class to SemstormFilters.
  - Complete examples for Monitoring functions.
- 0.0.2 (2017-07-17)
  - Composer autoload fix.
  - Upgrade examples.
  - Rename functions 'all' and 'list' to 'getList' and 'getData'.
- 0.0.1 (2017-06-27)
  - Create files for repository.
