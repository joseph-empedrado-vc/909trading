<!-- Top Content -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">ss</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand no-padding" href="<?=_base_url;?>">
                <img src="<?=_assets_url;?>images/909trading-logo.png" />
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?=(_url_1=='home' || _url_1 == '' )? 'active':'';?>">
                    <a href="<?=_site_root_url;?>home">Home</a>
                </li>
                <li class="<?=(_url_1=='about-us')? 'active':'';?>">
                    <a href="<?=_site_root_url;?>about-us">About Us</a>
                </li>
                <li class="<?=(_url_1=='company-profile')? 'active':'';?>">
                    <a href="<?=_site_root_url;?>company-profile">Company Profile</a>
                </li>
                <li class="<?=(_url_1=='stocks')? 'active':'';?>">
                    <a href="<?=_site_root_url;?>stocks">Stocks</a>
                </li>
                <li class="<?=(_url_1=='contact')? 'active':'';?>">
                    <a href="<?=_site_root_url;?>contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>