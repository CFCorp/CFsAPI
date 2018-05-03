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
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {
            // Get image name
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name']);

            $allowed = array(
                'jpeg'=>'image/jpeg',
                'jpg' => 'image/jpg',
                'png'=>'image/png',
                'gif'=>'image/gif',
            );
            $ext = array_search($mime,$allowed,true);

            $tijd = getdate();
            $tehashenNaam = $image.$image_tmp_name.$tijd[0].$tijd['weekday'].".$ext";
            $teller =0;
            $nieuweFotoNaam = md5($tehashenNaam).".$ext";
            while(file_exists("cdn/".$nieuweFotoNaam))
            {
                $tehashenNaam = $teller.$tehashenNaam;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                $teller++;
            }

            // image file directory
            $target = "/var/www/cdn/".basename($nieuweFotoNaam);
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("INSERT INTO anime (url) VALUES ('https://cdn.computerfreaker.cf/$nieuweFotoNaam')");

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $statement->execute();
            }else{
                $msg = "Failed to upload image";
            }
        }
        return $this->render('upload/anime.html.twig');

    }

    /**
     * @Route("/uploader/hentai", name="hentaiUploader")
     */
    public function hentaiAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {
            // Get image name
            $image = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name']);

            $allowed = array(
                'jpeg'=>'image/jpeg',
                'jpg' => 'image/jpg',
                'png'=>'image/png',
                'gif'=>'image/gif',
            );
            $ext = array_search($mime,$allowed,true);

            $tijd = getdate();
            $tehashenNaam = $image.$image_tmp_name.$tijd[0].$tijd['weekday'].".$ext";
            $teller =0;
            $nieuweFotoNaam = md5($tehashenNaam).".$ext";
            while(file_exists("hentai/".$nieuweFotoNaam))
            {
                $tehashenNaam = $teller.$tehashenNaam;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                $teller++;
            }

            // image file directory
            $target = "/var/www/hentai/".basename($nieuweFotoNaam);
            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("INSERT INTO anime (url) VALUES ('https://hentai.computerfreaker.cf/$nieuweFotoNaam')");

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $statement->execute();
            }else{
                $msg = "Failed to upload image";
            }
        }
        return $this->render('upload/hentai.html.twig');
    }
    /**
     * @Route("/uploader", name="Uploader")
     */
    public function uploaderAction()
    {
        return $this->render('upload/uploader.html.twig');
    }

}
