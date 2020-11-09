<?php

namespace App\Controller;

use League\Glide\Responses\SymfonyResponseFactory;
use League\Glide\ServerFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media", name="media_")
 */
class MediaController extends AbstractController
{
    private string $cachePath;
    private string $publicPath;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->cachePath = $parameterBag->get('kernel.cache_dir').'/images';
        $this->publicPath = $parameterBag->get('kernel.project_dir').'/public';
    }

    /**
     * @Route("/resize/{width}/{height}/{path}/{extension}", name="image_resizer",
     *      requirements={"width"="\d+", "height"="\d+", "path"=".+", "extension"=".+"})
     * @param int $width
     * @param int $height
     * @param string $path
     * @param string $extension
     * @return Response
     */
    public function image(int $width, int $height, string $path, string $extension): Response
    {
        $server = ServerFactory::create([
            'source' => $this->publicPath,
            'cache' => $this->cachePath,
            'driver' => 'imagick',
            'response' => new SymfonyResponseFactory()
        ]);

        $path .= '.' . $extension;

        return $server->getImageResponse($path, ['w' => $width, 'h' => $height, 'fit' => 'crop-top']);
    }
}
