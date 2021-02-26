<?php

namespace App\Controller;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UploadController extends AbstractController{
    /**
     * @Route("/uploader/anime", name="animeUploader")
     */
    public function animeAction()
    {
        $name = "anime";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/anime.html.twig');

    }

    /**
     * @Route("/uploader/hentai", name="hentaiUploader")
     */
    public function hentaiAction()
    {
        $name = "hentai";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/hentai.html.twig');
    }

    /**
     * @Route("/uploader/dva", name="dvaUploader")
     */
    public function dvaAction()
    {
        $name = "dva";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/dva.html.twig');
    }

    /**
     * @Route("/uploader/trap", name="trapUploader")
     */
    public function trapAction()
    {
        $name = "trap";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/trap.html.twig');
    }

    /**
     * @Route("/uploader/hug", name="hugUploader")
     */
    public function hugAction()
    {
        $name = "hug";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/hug.html.twig');
    }


    /**
     * @Route("/uploader/baguette", name="baguetteUploader")
     */
    public function baguetteAction()
    {
        $name = "baguette";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/baguette.html.twig');
    }

    /**
     * @Route("/uploader/neko", name="nekoUploader")
     */
    public function nekoAction()
    {
        $name = "neko";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/neko.html.twig');
    }

    /**
     * @Route("/uploader/nsfwneko", name="nsfwnekoUploader")
     */
    public function nsfwnekoAction()
    {
        $name = "nsfwneko";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/nsfwneko.html.twig');
    }

    /**
     * @Route("/uploader/yuri", name="yuriUploader")
     */
    public function yuriAction()
    {
        $name = "yuri";
        self::updateImageList($name);
        self::SaveUploads($name);
        return $this->render('upload/yuri.html.twig');
    }

    public function SaveUploads($subDomain)
    {
        if (isset($_POST['upload'])) {
            $total = count($_FILES['image']['name']);
            $success = true;

            // Loop through each file
            for ($i = 0; $i < $total; $i++) {
                // Get image name
                $image = $_FILES['image']['name'][$i];
                $image_tmp_name = $_FILES['image']['tmp_name'][$i];
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($_FILES['image']['tmp_name'][$i]);
                $ext = $mime;
                $tijd = getdate();
                $tehashenNaam = $image . $image_tmp_name . $tijd[0] . $tijd['weekday'] . ".$ext";
                $teller = 0;
                $nieuweFotoNaam = md5($tehashenNaam) . ".$ext";
                while (file_exists("/srv/http/" . $subDomain . "/" . $nieuweFotoNaam)) {
                    $tehashenNaam = $teller . $tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam) . ".$ext";
                    $teller++;
                }
                // image file directory
                $target = "/srv/http/" . $subDomain . "/" . basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO " . $subDomain . " (url) VALUES ('$nieuweFotoNaam')");
                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                } else {
                    /* $msg = "Failed to upload image";
                    return $msg; */
                    $success = false;
                }
            }
            return $success;
        }
    }

    public function updateImageList($subDomain){
        $curDir = "/srv/http/" . $subDomain . "/tmp/";
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT url FROM " . $subDomain);
        $helpMeSuffer = array($statement->execute());

        $ignoreList = array(".", "..", $helpMeSuffer);

        $endingDir =  "/srv/http/" . $subDomain . "/";


        if (is_dir($curDir)){
            if($dh = opendir($curDir)){
                while (($file = readdir($dh)) !== false){
                    if(!in_array($file, $ignoreList)) {
                        try {
                            $em = $this->getDoctrine()->getManager();
                            $connection = $em->getConnection();
                            $statement = $connection->prepare("INSERT IGNORE INTO $subDomain (url) VALUES ('$file')");
                            $statement->execute();
                            rename($curDir . $file, $endingDir . $file);
                        } catch (UniqueConstraintViolationException $e){
                            $this->getDoctrine()->resetManager();
                        }
                    }
                }
                closedir($dh);
            }
        }

    }
}
