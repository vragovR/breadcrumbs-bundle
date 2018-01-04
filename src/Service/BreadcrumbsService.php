<?php

namespace BreadcrumbsBundle\Service;

use BreadcrumbsBundle\Model\Breadcrumbs;

/**
 * Class BreadcrumbsService
 * @package BreadcrumbsBundle\Service
 */
class BreadcrumbsService
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var Breadcrumbs
     */
    protected $breadcrumbs;

    /**
     * BreadcrumbsService constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
        $this->breadcrumbs = new Breadcrumbs();
    }

    /**
     * @param string $text
     * @param string|null $url
     * @return BreadcrumbsService
     */
    public function addItem(string $text, string $url = null): BreadcrumbsService
    {
        $this->breadcrumbs->addItem($text, $url);

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->options['template'];
    }

    /**
     * @return array
     */
    public function getSeparator(): array
    {

        return $this->options['separator'];
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->options['list'];
    }

    /**
     * @return Breadcrumbs
     */
    public function getBreadcrumbs(): Breadcrumbs
    {
        return $this->breadcrumbs;
    }
}