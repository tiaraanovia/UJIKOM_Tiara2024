<body class="vertical-layout vertical-compact-menu content-detached-right-sidebar   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="content-detached-right-sidebar">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
      <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item d-md-none"><a class="navbar-brand" href="index.html"><img class="brand-logo d-none d-md-block" alt="CryptoDash admin logo" src="../app-assets/images/logo/logo.png"><img class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm" src="../app-assets/images/logo/logo-sm.png"></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v">   </i></a></li>
          </ul>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
              
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"></span><span class="mr-1"><span class="user-name text-bold-700"><?= $_SESSION['username']; ?></span></span></a>
                <div class="dropdown-menu dropdown-menu-right">             <a class="dropdown-item" href="account-profile.html"><i class="ft-award"></i><?= $_SESSION['username']; ?></a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
      <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="index.php"><img class="brand-logo" alt="CryptoDash admin logo" src="../app-assets/images/logo/logo.png"/></a>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="data_barang.php"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Data barang</span></a>
          </li>
          
          <li class="active"><a href="pembelian.php"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">pembelian</span></a>
          </li>
        </ul>
      </div>
    </div>