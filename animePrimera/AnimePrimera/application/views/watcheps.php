<?php  $this->load->view('comuns/header'); ?>
<?php  $this->load->view('comuns/menu'); ?>
<body>

    <div class="container-fluid">
        <video id=”my-player” class=”video-js” controls preload=”auto” poster=”//vjs.zencdn.net/v/oceans.png” data-setup=’{}’>
            <source src=”<?php echo base_url($query[0]->url);  ?>" type=”video/mp4"></source>
            <p class=”vjs-no-js”>
                <a href=”http://videojs.com/html5-video-support/” target=”_blank”>
                    supports HTML5 video
                </a>
            </p>
        </video>
    </div>


<?php $this->load->view('comuns/footer'); ?>