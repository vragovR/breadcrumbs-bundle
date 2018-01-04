<?php

namespace BreadcrumbsBundle\Twig;

use BreadcrumbsBundle\Service\BreadcrumbsService;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class BreadcrumbsExtension
 * @package BreadcrumbsBundle\Twig
 */
class BreadcrumbsExtension extends \Twig_Extension
{
    /**
     * @var BreadcrumbsService
     */
    protected $service;

    /**
     * @var EngineInterface
     */
    protected $engine;

    /**
     * BreadcrumbsExtension constructor.
     * @param BreadcrumbsService $service
     * @param EngineInterface $engine
     */
    public function __construct(BreadcrumbsService $service, EngineInterface $engine)
    {
        $this->service = $service;
        $this->engine = $engine;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction('breadcrumbs', [$this, 'breadcrumbs'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @return string
     */
    public function breadcrumbs(): string
    {
        return $this->engine->render($this->service->getTemplate(), [
            'separator' => $this->service->getSeparator(),
            'list' => $this->service->getList(),
            'breadcrumbs' => $this->service->getBreadcrumbs()
        ]);
    }
}