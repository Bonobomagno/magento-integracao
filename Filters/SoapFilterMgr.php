<?php

namespace Filters;

class SoapFilterMgr implements IFilterMgr {

    public function GetFilter(IFilter $filter) {
        $reflect = new \ReflectionClass($filter);

        $properties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);

        $filters = array('filter' => array(), 'complex_filter' => array());
        foreach ($properties as $property) {
            $value = $filter->{$property->name};

            if (get_class($value) === 'integracao\Magento\Filters\FilterRangeValue') {
                $item1 = array('key' => $property->name, 'value' => array('key' => 'from', 'value' => $value->from));
                $item2 = array('key' => $property->name, 'value' => array('key' => 'to', 'value' => $value->to));
                array_push($filters['complex_filter'], $item1);
                array_push($filters['complex_filter'], $item2);
            }

            if (get_class($value) === 'integracao\Magento\Filters\FilterEqualValue') {
                $item = array('key' => $property->name, 'value' => array('key' => 'eq', 'value' => $value->value));
                array_push($filters['complex_filter'], $item);
            }

            if (get_class($value) === 'integracao\Magento\Filters\FilterLikeValue') {
                $item = array('key' => $property->name, 'value' => array('key' => 'like', 'value' => '%' . trim($value->value) . '%'));
                array_push($filters['complex_filter'], $item);
            }

            if (is_array($filter->{$property->name})) {
                $value = $filter->{$property->name};
                $item1 = array('key' => $property->name, 'value' => $value[0]);
                $item2 = array('key' => $property->name, 'value' => $value[1]);
                array_push($filters['complex_filter'], $item1);
                array_push($filters['complex_filter'], $item2);
            }
            if (strlen($filter->{$property->name})) {
                $item = array('key' => $property->name, 'value' => $filter->{$property->name});
                array_push($filters['filter'], $item);
            }
        }

        return $filters;
    }

}
