<?php

namespace ITE\DemoBundle\Form\ChoiceList;

/**
 * Class ChoiceListBuilder
 * @package ITE\DemoBundle\Form\ChoiceList
 */
class ChoiceListBuilder
{
    /**
     * @param $start
     * @param $end
     * @return array
     */
    public static function getChoicesByRange($start, $end)
    {
        $range = range($start, $end);
        $choices = array_combine($range, $range);

        return static::getChoices($choices);
    }

    /**
     * @param array $values
     * @return array
     */
    public static function getChoicesByValues(array $values)
    {
        $choices = array_combine($values, $values);

        return static::getChoices($choices);
    }

    /**
     * @param array $choices
     * @return array
     */
    protected static function getChoices(array $choices)
    {
        $numberToWordConverter = new \Numbers_Words();

        return array_map(function($number) use ($numberToWordConverter) {
            return str_replace('-', ' ', $numberToWordConverter->toWords($number));
        }, $choices);
    }
} 