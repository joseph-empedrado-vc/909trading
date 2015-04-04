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

            <?php if(is_signed_in() == true){ ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=_index_url;?>admin">Control Panel</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=_index_url;?>admin/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>

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