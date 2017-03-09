<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php
            $current_url = current_url();
            $meta_tags = $this->common_model->getMetaTags($current_url);
            if ($meta_tags) {
                $METATITLE = $meta_tags['metatag_title'];
                $METAKEYWORDS = $meta_tags['metatag_keyword'];
                $METADESCRIPTION = $meta_tags['metatag_description'];
            }
            if ($METATITLE) {
                echo $this->config->item('sitename');
            } else {
                echo $this->config->item('sitename');
            }
            ?>
        </title>
        <?php if ($METAKEYWORDS) { ?>
            <meta name="keywords" content="<?php echo $METAKEYWORDS ?>" />
        <?php } else { ?>
            <meta name="keywords" content="<?php echo $this->config->item('meta_keywords'); ?>" />
        <?php } ?>
        <?php if ($METADESCRIPTION) { ?>
            <meta name="description" content="<?php echo $METADESCRIPTION ?>" />
        <?php } else { ?>
            <meta name="description" content="<?php echo $this->config->item('meta_description'); ?>" />
        <?php } ?>
        <!-- Styles -->
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/main.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>home/css/custom.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/animate.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>

        <script src="<?= $this->config->item('frontassets') ?>video-parralax/js/modernizr-2.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>