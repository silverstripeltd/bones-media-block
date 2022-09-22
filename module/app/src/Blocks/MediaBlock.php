<?php

namespace App\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use UncleCheese\DisplayLogic\Wrapper;

class MediaBlock extends BaseElement
{
    private static string $icon = 'font-icon-block-media';

    private static array $db = [
        'MediaType' => 'Enum("Video, Image", "Image")',
        'VideoLink' => 'Text',
        'FitSize' => 'Enum("Full, Contained", "Full")',
    ];

    private static array $has_one = [
        'Image' => Image::class,
    ];

    private static $inline_editable = false;

    private static string $table_name = 'MediaBlock';

    private static string $singular_name = 'media block';

    private static string $plural_name = 'media blocks';

    private static string $description = 'Block with a container to embed an iFrame';

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $media_type = [
            'Image' => 'Image',
            'Video' => 'Video',
        ];

        $size = [
            'Full' => 'Full',
            'Contained' => 'Contained',
        ];

        $fields->removeByName(['Image', 'VideoLink', 'FitSize']);

        $fields->addFieldsToTab(
            'Root.Main',
            [
                $typeField = DropdownField::create('MediaType', 'Media Type')
                    ->setSource($media_type)
                    ->setValue('Image')
                    ->setDescription('Select media type.'),
                $uploadImageField = UploadField::create('Image', 'Upload Image'),
                $videoLinkField = TextareaField::create('VideoLink', 'Video Link')
                    ->setDescription('Insert a video link in this field.'),
                $sizeField = DropdownField::create('FitSize', 'Fit Size')
                    ->setSource($size)
                    ->setValue('Full')
                    ->setDescription('Select paddings of the media file'),
            ]
        );

        $videoLinkField->displayIf('MediaType')->isEqualTo('Video');
        $uploadImageField->displayIf('MediaType')->isEqualTo('Image');

        return $fields;
    }

    public function getType(): string
    {
        return _t(self::class . '.BlockType', 'Media');
    }

    public function getFitSizeClasses(): string
    {
        $str = 'full';
        if ($this->FitSize === 'Contained') {
            $str = 'contained';
        }

        return $str;
    }
    
}
