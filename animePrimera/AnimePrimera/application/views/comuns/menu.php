<nav id="navbar" class="navbar navbar-expand-lg navbar-custom navShadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url('/resources/img/logo/animeprimeralargenewc.png')?>" alt="logo" class="img-fluid" id="logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <form class="form-inline ml-auto">
                <input class="form-control ml-auto " type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url('login')?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('episodio')?>">GERIR</a>
                </li>
        </div>
    </div>
</nav>
