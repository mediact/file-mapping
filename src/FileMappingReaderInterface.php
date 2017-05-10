<?php
/**
 * Copyright Mediact. All rights reserved.
 * https://www.Mediact.nl
 */

namespace Mediact\FileMapping;

use Iterator;

interface FileMappingReaderInterface extends Iterator
{
    /**
     * Get the current file mapping.
     *
     * @return FileMappingInterface
     */
    public function current(): FileMappingInterface;
}
