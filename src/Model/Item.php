<?php
namespace BreadcrumbsBundle\Model;

/**
 * Class Item
 * @package BreadcrumbsBundle\Model
 */
class Item
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Item
     */
    public function setUrl(string $url = null): Item
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Item
     */
    public function setText(string $text): Item
    {
        $this->text = $text;

        return $this;
    }
}