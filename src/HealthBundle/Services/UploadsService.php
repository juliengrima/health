<?php
/**
 * Created by PhpStorm.
 * User: juliengrima
 * Date: 15/05/2017
 * Time: 19:34
 */

namespace src\HealthBundle\Services;

use HealthBundle\Entity\Familly;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class UploadsService extends Controller
{
//    protected $container;
//
//    public function __construct(Container $container) {
//        $this->container = $container;
//    }

    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function mediaUploads($familly){

            $fileName = md5(uniqid()).'.'.$familly->guessExtension();

            $familly->move($this->targetDir, $fileName);

            return $fileName;
        }

        public function getTargetDir()
        {
            return $this->targetDir;
        }

}