<?php
/**
 * Copyright MediaCT. All rights reserved.
 * https://www.mediact.nl
 */

namespace Mediact\FileMapping\Tests;

use Mediact\FileMapping\FileMappingInterface;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Mediact\FileMapping\UnixFileMappingReader;

/**
 * @coversDefaultClass \Mediact\FileMapping\UnixFileMappingReader
 */
class UnixFileMappingReaderTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getMappings
     * @covers ::next
     * @covers ::key
     * @covers ::valid
     * @covers ::rewind
     * @covers ::current
     */
    public function testIteration()
    {
        $fileSystem = vfsStream::setup(
            sha1(__METHOD__),
            null,
            [
                'files' => '{foo,bar}.php',
                'source' => [
                    'foo.php' => 'Foo'
                ],
                'destination' => []
            ]
        );

        $mappings = new UnixFileMappingReader(
            $fileSystem->getChild('source')->url(),
            $fileSystem->getChild('destination')->url(),
            $fileSystem->getChild('files')->url(),
            $fileSystem->getChild('files')->url()
        );

        foreach ($mappings as $offset => $mapping) {
            $this->assertInstanceOf(FileMappingInterface::class, $mapping);
            $this->assertInternalType('integer', $offset);
            $this->assertFileExists($mapping->getSource());
        }
    }
}
