<?php

class ValueObject
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function setRed(int $red): void
    {
        $this->red = $this->checkValue($red, 'red');
    }

    public function setGreen(int $green): void
    {
        $this->green = $this->checkValue($green, 'green');
    }

    public function setBlue(int $blue): void
    {
        $this->blue = $this->checkValue($blue, 'blue');
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function checkValue(int $val, string $colorName): int
    {
        try {
            if ($val < 0 || $val > 255) {
                Throw new \Exception("The value for {$colorName} ({$val}) must be an integer between 0 and 255.");
            }
            return $val;
        } catch (\Exception $e){
            echo $e->getMessage();
            return 0;
        }
    }

    public function equals(ValueObject $other): bool
    {
        // use reflection
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true); // делаю читабельным

            if ($property->getValue($this) !== $property->getValue($other)) {
                return false;
            }
        }
        return true;
    }

    static public function random():object {
        return new ValueObject(rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(ValueObject $other): ValueObject {
        $reflectionThis = new \ReflectionClass($this);
        $reflectionOther = new \ReflectionClass($other);

        // Перевірка на те що кількість змінних однакова
        if (count($reflectionThis->getProperties()) !== count($reflectionOther->getProperties())) {
            throw new \RuntimeException('Оба объекта должны иметь одинаковое количество свойств.');
        }

        $newValues = [];

        foreach ($reflectionThis->getProperties() as $property) {
            $property->setAccessible(true);
            $newValues[] = round(($property->getValue($this) + $property->getValue($other)) / 2);
        }

        return new ValueObject(...$newValues); // Используем распаковку массива
    }


}