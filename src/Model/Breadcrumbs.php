<?php
namespace BreadcrumbsBundle\Model;

/**
 * Class Breadcrumbs
 * @package BreadcrumbsBundle\Model
 */
class Breadcrumbs implements \Iterator, \ArrayAccess, \Countable
{
    /**
     * @var Item[]
     */
    protected $items = [];

    /**
     * @param string $text
     * @param string|null $url
     * @return Breadcrumbs
     */
    public function addItem(string $text, string $url = null): Breadcrumbs
    {
        $item = (new Item())
            ->setText($text)
            ->setUrl($url);

        $this->items[] = $item;

        return $this;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->items[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Item) {
            throw new \LogicException('Invalid value type');
        }

        $this->items[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->items[$offset]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->items);
    }

    /**
     * @return Item
     */
    public function current(): Item
    {
        return current($this->items);
    }

    /**
     * @return void
     */
    public function next(): void
    {
        next($this->items);
    }

    /**
     * @return int|null
     */
    public function key(): ?int
    {
        return key($this->items);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->key() !== null;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        reset($this->items);
    }
}