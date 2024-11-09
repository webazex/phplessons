<?php

class User
{
    private ?string $name = null;
    private ?string $email = null;
    private ?int $age = null;

    public function __construct(string $name, string $email, int $age )
    {
        $this->age = $age;
        $this->name = $name;
        $this->email = $email;
    }

    public function __call(string $name, array $arguments)
    {
        try {
            if (!method_exists($this, $name)) {
                Throw new \Exception("Метод не існує");
            }else{
                return call_user_func_array([$this, $name], $arguments);
            }
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function getAll(): array
    {
        $result = [];
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $value = $property->getName() === 'email' ? '' : $property->getValue($this); // поле email залишається порожнім
            $result[$property->getName()] = $value;
        }

        return $result;
    }
}
