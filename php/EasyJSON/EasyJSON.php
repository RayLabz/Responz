<?php

namespace EasyJSON {

    use ReflectionClass;
    use ReflectionProperty;

    interface JsonSerializable {

        public function toJSON();

    }

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
                    if ($propertyValue instanceof JsonObject) {
                        $nestedObject = $propertyValue->toJsonObject();
                        $jsonObject[$propertyName] = $nestedObject;
                    }
                    else if (is_array($propertyValue)) {
                        $outputArray = array();
                        foreach ($propertyValue as $arrayItem) { //arrayItem => Component
                            if ($arrayItem instanceof JsonObject) {
                                $outputArrayObject = $arrayItem->toJsonObject();
                                array_push($outputArray, $outputArrayObject);
                            }
                            else {
                                array_push($outputArray, $arrayItem);
                            }
                        }
                        $jsonObject = $outputArray;
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

    }

}