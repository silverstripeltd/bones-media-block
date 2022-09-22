<?php

namespace App\Tests\MediaBlock;

use App\MediaBlock\MediaBlock;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class MediaBlockTest extends FunctionalTest
{

    /**
     * Ensure the correct block type name
     *
     * @return void
     * @throws Exception
     */
    public function testGetType(): void
    {
        $block = singleton(MediaBlock::class);
        $name = $block->getType();
        $this->assertEquals('Media', $name);
    }

    /**
     * Ensure the correct style class name
     *
     * @return void
     * @throws Exception
     */
    public function testGetFitSizeClasses(): void
    {
        $block = singleton(MediaBlock::class);
        $block->FitSize = 'Full';
        $block->write();

        $styleClassName = $block->getFitSizeClasses();
        $this->assertEquals('full', $styleClassName);

        $block->FitSize = 'Contained';
        $block->write();
        
        $styleClassName = $block->getFitSizeClasses();
        $this->assertEquals('contained', $styleClassName);
    }

    /**
     * Tests if expected CMS fields exist for Block
     *
     * @return void
     */
    public function testGetCMSFields(): void
    {
        $block = singleton(MediaBlock::class);
        $fields = $block->getCMSFields();

        $expectedFieldCount = 5;

        $this->assertCount($expectedFieldCount, $fields->dataFieldNames());

        $expectedInstances = [
            'Title' => TextField::class,
            'MediaType' => DropdownField::class,
            'VideoLink' => TextareaField::class,
            'FitSize' => DropdownField::class,
            'Image' => UploadField::class,
        ];

        foreach ($expectedInstances as $key => $class) {
            $msg = 'The field'. $key .'should be an instance of'. $class .'::class';
            $this->assertInstanceOf($class, $fields->dataFieldByName($key), $msg);
        }
    }

}
