<?php

namespace app\components;

use ArrayIterator;
use Countable;
use IteratorAggregate;

final class ParameterBag implements IteratorAggregate, Countable
{
    protected array $parameters;

    public function __construct(array $parameters = [])
    {
        $this->setParameters($parameters);
    }

    public function setParameters(array $parameters): void
    {
        $this->parameters = $this->dot($parameters);
    }

    public function add(array $parameters = []): void
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }

    public function get(string $key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    public function set(string $key, $value): void
    {
        $this->parameters[$key] = $value;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->parameters);
    }

    public function remove(string $key): void
    {
        unset($this->parameters[$key]);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->parameters);
    }

    public function count(): int
    {
        return count($this->parameters);
    }

    private function dot(array $array, string $prepend = ''): array
    {
        $results = [];

        foreach ($array as $key => $value) {
            if (is_array($value) && !empty($value)) {
                $results = array_merge($results, $this->dot($value, $prepend . $key . '.'));
            } else {
                $results[$prepend . $key] = $value;
            }
        }

        return $results;
    }
}
