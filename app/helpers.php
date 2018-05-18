<?php

/**
 * Implode collection to a string.
 *
 * @param $model
 * @return string
 */
function convertToString($model)
{
    $attributes = $model->pluck('name')->toArray();

    return implode(', ', $attributes);
}
