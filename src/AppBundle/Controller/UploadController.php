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

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/cdn/".$nieuweFotoNaam))
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

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
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

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/hentai/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/hentai/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO hentai (url) VALUES ('https://hentai.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/hentai.html.twig');
    }

    /**
     * @Route("/uploader/dva", name="dvaUploader")
     */
    public function dvaAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/dva/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/dva/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO dva (url) VALUES ('https://dva.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/dva.html.twig');
    }

    /**
     * @Route("/uploader/trap", name="trapUploader")
     */
    public function trapAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/trap/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/trap/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO trap (url) VALUES ('https://trap.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/trap.html.twig');
    }

    /**
     * @Route("/uploader/hug", name="hugUploader")
     */
    public function hugAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/hug/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/hug/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO hug (url) VALUES ('https://hug.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/hug.html.twig');
    }


    /**
     * @Route("/uploader/baguette", name="baguetteUploader")
     */
    public function baguetteAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/baguette/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/baguette/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO baguette (url) VALUES ('https://baguette.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/baguette.html.twig');
    }

    /**
     * @Route("/uploader/neko", name="nekoUploader")
     */
    public function nekoAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/neko/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/neko/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO neko (url) VALUES ('https://neko.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/neko.html.twig');
    }

    /**
     * @Route("/uploader/nsfwneko", name="nsfwnekoUploader")
     */
    public function nsfwnekoAction()
    {
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {

            $total = count($_FILES['image']['name']);

            // Loop through each file
            for($i=0; $i<$total; $i++) {
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
                $teller =0;
                $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                while(file_exists("/var/www/nsfwneko/".$nieuweFotoNaam))
                {
                    $tehashenNaam = $teller.$tehashenNaam;
                    $nieuweFotoNaam = md5($tehashenNaam).".$ext";
                    $teller++;
                }

                // image file directory
                $target = "/var/www/nsfwneko/".basename($nieuweFotoNaam);
                $em = $this->getDoctrine()->getManager();
                $connection = $em->getConnection();
                $statement = $connection->prepare("INSERT INTO nsfwneko (url) VALUES ('https://neko.computerfreaker.cf/$nieuweFotoNaam')");

                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
                    $statement->execute();
                }else{
                    $msg = "Failed to upload image";
                    return $msg;
                }
            }
        }
        return $this->render('upload/nsfwneko.html.twig');
    }

    /**
     * @Route("/uploader", name="Uploader")
     */
    public function uploaderAction()
    {
        return $this->render('upload/uploader.html.twig');
    }

}
