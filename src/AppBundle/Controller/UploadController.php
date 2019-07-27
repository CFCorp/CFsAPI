<?php

namespace AppBundle\Controller;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UploadController extends Controller
{
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

    /**
     * @Route("/uploader", name="Uploader")
     */
    public function uploaderAction()
    {
        return $this->render('upload/uploader.html.twig');
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
                $allowed = array(
                    'jpeg' => 'image/jpeg',
                    'jpg' => 'image/jpg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                );
                $ext = array_search($mime, $allowed, true);
                $tijd = getdate();
                $tehashenNaam = $image . $image_tmp_name . $tijd[0] . $tijd['weekday'] . ".$ext";
                $teller = 0;
                $nieuweFotoNaam = md5($tehashenNaam) . ".$ext";
                while (file_exists("/var/www/" . $subDomain . "/" . $nieuweFotoNaam)) {
                    $tehashenNaam = $teller . $tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam) . ".$ext";
                    $teller++;
                }
                // image file directory
                $target = "/var/www/" . $subDomain . "/" . basename($nieuweFotoNaam);
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
        $curDir = "/var/www/" . $subDomain . "/";
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT url FROM " . $subDomain);
        $helpMeSuffer = array($statement->execute());

        $ignoreList = array(".", "..", $helpMeSuffer);

        if (is_dir($curDir)){
            if($dh = opendir($curDir)){
                while (($file = readdir($dh)) !== false){
                    if(!in_array($file, $ignoreList)) {
                        try {
                            $em = $this->getDoctrine()->getManager();
                            $connection = $em->getConnection();
                            $statement = $connection->prepare("INSERT IGNORE INTO $subDomain (url) VALUES ('$file')");
                            $statement->execute();
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
