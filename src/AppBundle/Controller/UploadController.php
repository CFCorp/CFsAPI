<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UploadController extends Controller
{
    /**
     * @Route("/uploader/anime", name="animeUploader")
     */
    public function animeAction()
    {
        SaveUploads("anime");
        return $this->render('upload/anime.html.twig');

    }

    /**
     * @Route("/uploader/hentai", name="hentaiUploader")
     */
    public function hentaiAction()
    {
        SaveUploads("hentai");
        return $this->render('upload/hentai.html.twig');
    }

    /**
     * @Route("/uploader/dva", name="dvaUploader")
     */
    public function dvaAction()
    {
        SaveUploads("dva");
        return $this->render('upload/dva.html.twig');
    }

    /**
     * @Route("/uploader/trap", name="trapUploader")
     */
    public function trapAction()
    {
        SaveUploads("trap");
        return $this->render('upload/trap.html.twig');
    }

    /**
     * @Route("/uploader/hug", name="hugUploader")
     */
    public function hugAction()
    {
        SaveUploads("hug");
        return $this->render('upload/hug.html.twig');
    }


    /**
     * @Route("/uploader/baguette", name="baguetteUploader")
     */
    public function baguetteAction()
    {
        SaveUploads("baguette");
        return $this->render('upload/baguette.html.twig');
    }

    /**
     * @Route("/uploader/neko", name="nekoUploader")
     */
    public function nekoAction()
    {
        SaveUploads("neko");
        return $this->render('upload/neko.html.twig');
    }

    /**
     * @Route("/uploader/nsfwneko", name="nsfwnekoUploader")
     */
    public function nsfwnekoAction()
    {
        SaveUploads("nsfwneko");
        return $this->render('upload/nsfwneko.html.twig');
    }

    /**
     * @Route("/uploader/yuri", name="yuriUploader")
     */
    public function yuriAction()
    {
        SaveUploads("yuri");
        return $this->render('upload/yuri.html.twig');
    }

    public function SaveUploads($subDomain)
    {
        $total = count($_FILES['image']['name']);
        $success = true;
        
        // Loop through each file
        for($i=0; $i < $total; $i++) {
            // Get image name
            $image = $_FILES['image']['name'][$i];
            $image_tmp_name = $_FILES['image']['tmp_name'][$i];
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name'][$i]);
            $allowed = array(
                'jpeg'=>'image/jpeg',
                'jpg' => 'image/jpg',
                'png'=>'image/png',
                'gif'=>'image/gif',
            );
            $ext = array_search($mime,$allowed,true);
            $tijd = getdate();
            $tehashenNaam = $image.$image_tmp_name.$tijd[0].$tijd['weekday'].".$ext";
            $teller = 0;
            $nieuweFotoNaam = md5($tehashenNaam).".$ext";
            while(file_exists("/var/www/". $subDomain ."/".$nieuweFotoNaam))
            {
                $tehashenNaam = $teller.$tehashenNaam;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                $teller++;
            }
            // image file directory
            $target = "/var/www/". $subDomain ."/".basename($nieuweFotoNaam);
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("INSERT INTO ". $subDomain ." (url) VALUES ('$nieuweFotoNaam')");
            if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                $statement->execute();
            }else{
                /* $msg = "Failed to upload image";
                return $msg; */
                $success = false;
            }
        }
        return $success;
    }

    /**
     * @Route("/uploader", name="Uploader")
     */
    public function uploaderAction()
    {
        return $this->render('upload/uploader.html.twig');
    }

}
