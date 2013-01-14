<?php

namespace JooS\Stream;

require_once "JooS/Stream/Entity/Deleted.php";

class Entity_DeletedTest extends \PHPUnit_Framework_TestCase
{

  public function testInstance() {
    require_once "JooS/Stream/Entity.php";
    
    $realEntity = Entity::newInstance(__FILE__);
    
    $deletedEntity = Entity_Deleted::newInstance($realEntity);
    $this->assertFalse($deletedEntity->file_exists());
    
    $this->assertEquals($realEntity, $deletedEntity->getRealEntity());
  }

}
