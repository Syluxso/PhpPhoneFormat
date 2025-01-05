<?php

namespace Syluxso\PhpPhoneFormat\Tests;

use PHPUnit\Framework\TestCase;
use Syluxso\PhpPhoneFormat\PhoneFormat;

class PhoneFormatTest extends TestCase
{
  public function testPhoneFormatInvalidStartsWith1Number()
  {
    $phone = new PhoneFormat('(122) 333-4444');
    
    $this->assertEquals('1223334444', $phone->string);
    $this->assertFalse($phone->valid);
    $this->assertIsArray($phone->error);
    $this->assertContains('Phone numbers must be 10 characters.', $phone->error);
  }
  
  public function testPhoneFormatInvalidNumber()
  {
    $phone = new PhoneFormat('invalid');
    
    $this->assertFalse($phone->valid);
    $this->assertIsArray($phone->error);
    $this->assertContains('Phone numbers must be 10 characters.', $phone->error);
  }
  
  public function testPhoneFormatWithCountryCode()
  {
    $phone = new PhoneFormat('+1 (222) 333-4444');
    
    $this->assertTrue($phone->valid);
    $this->assertEquals('2223334444', $phone->string);
    $this->assertEquals('(222) 333-4444', $phone->brackets);
  }
}
