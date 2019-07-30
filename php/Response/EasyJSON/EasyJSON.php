<?php

/**
 * Created by PaNickApps - 2019
 * Visit http://www.panickapps.com
 *
 * EasyJSON - A simple JSON object library for PHP
 * Easy conversion and serialization of PHP objects to JSON.
 * Repository: https://github.com/panickapps/EasyJSON
 * Guide:
 *
 * You may view, modify but NOT sell any of the contents in this file.
 */

namespace EasyJSON {

    use ReflectionClass;
    use ReflectionProperty;

    class JsonObject {

        public function toJsonObject() {
            $jsonObject = null;
            try {
                $reflectedClass = new ReflectionClass($this);
                $properties = $reflectedClass->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
                foreach ($properties as $property) {
                    $property->setAccessible(true);
                    $propertyName = $property->getName();
                    $propertyValue = $property->getValue($this);
                    if ($propertyValue == null) {
                        return $jsonObject;
                    }
                    if ($propertyValue instanceof JsonObject) {
                        $nestedObject = $propertyValue->toJsonObject();
                        $jsonObject[$propertyName] = $nestedObject;
                    }
                    else if (is_array($propertyValue)) {
                        $outputArray = array();
                        foreach ($propertyValue as $arrayItem) {
                            if ($arrayItem instanceof JsonObject) {
                                $outputArrayObject = $arrayItem->toJsonObject();
                                array_push($outputArray, $outputArrayObject);
                            }
                            else {
                                array_push($outputArray, $arrayItem);
                            }
                        }
                        $jsonObject[$propertyName] = $outputArray;
                    }
                    else {
                        $jsonObject[$propertyName] = $propertyValue;
                    }
                }
            } catch (\ReflectionException $e) {
                die($e->getMessage());
            } finally {
                return $jsonObject;
            }
        }

        public function toJSON() {
            return json_encode($this->toJsonObject());
        }

    }

}