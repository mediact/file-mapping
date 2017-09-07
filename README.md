[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mediact/file-mapping/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mediact/file-mapping/?branch=master)
# file-mapping

A PHP package for mapping files from one location to another. It is used by the file installer package to move files, according to the location mapping.

## Usage examples

```php
<?php 
/** 
* Create a mapping.
*/
 $mapping = new UnixFileMapping(
      __DIR__ . '/../templates/files',
      getcwd(),
      ...$this->getFilePaths()
  );

/**
* Get the relative path to the source file.
*/
$mapping->getRelativeSource();

/**
* Get the absolute path to the source file.
*/
$mapping->getSource();

/**
* Get the relative path to the destination file.
*/
$mapping->getRelativeDestination();

/**
* Get the absolute path to the destination file.
*/
$mapping->getDestination();

```

