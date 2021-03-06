<?php

namespace JooS\Stream;

class EntityTest extends \PHPUnit_Framework_TestCase
{

  /**
   * @dataProvider providerGetRelativePath
   */
  public function testFixPath($path)
  {
    $this->assertEquals("dir1/dir2", Entity::fixPath($path));
  }

  public function providerGetRelativePath()
  {
    return array(
      array('dir1/dir2/'),
      array('/dir1//dir2'),
      array('\dir1\dir2'),
      array('\\\\dir1\\dir2\\'),
    );
  }
  
  
  public function testInstance()
  {
    $instance = Entity::newInstance(__FILE__);

    $this->assertEquals(basename(__FILE__), $instance->basename());

    $unixPathToFile = str_replace("\\", "/", __FILE__);
    $this->assertEquals($unixPathToFile, $instance->path());

    $this->assertEquals(is_writable(__FILE__), $instance->is_writable());
    $this->assertEquals(is_readable(__FILE__), $instance->is_readable());

    $this->assertFalse($instance->is_dir());
    $this->assertTrue($instance->is_file());
    $this->assertTrue($instance->file_exists());
  }

}
