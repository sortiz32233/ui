<?php

declare(strict_types=1);

namespace atk4\ui\Table\Column;

use atk4\ui\Table;

/**
 * Column for formatting image.
 */
class Image extends Table\Column
{
    /**
     * Overrides custom attributes that will be applied on head, body or foot.
     *
     * @var array
     */
    public $attr = ['all' => ['class' => ['center aligned single line']]];

    /**
     * Extend parent method.
     *
     * @param \atk4\data\Field $f
     *
     * @return string
     */
    public function getDataCellTemplate(\atk4\data\Field $f = null)
    {
        $caption = $f ? $f->getCaption() : $this->short_name;

        return '<img src="' . parent::getDataCellTemplate($f) . '" alt="' . $caption . '" border="0" />';
    }
}