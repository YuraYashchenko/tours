<?php

function convertToString($model)
{
    $attributes = $model->pluck('name')->toArray();

    return implode(', ', $attributes);
}
