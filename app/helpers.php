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

/**
 * Transform key-value array in needed form.
 *
 * @param array $array
 * @param array $transformValues
 * @return array
 */
function transformPricesArray(array $array, array $transformValues)
{
    $result = [];
    $id = 1;

    foreach ($array as $key => $value)
    {
        $result[$key] = [
            'id' => $id++,
            'name' => $transformValues[$key],
            'price' => $value * 100
        ];
    }

    return $result;
}
