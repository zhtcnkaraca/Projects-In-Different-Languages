<?php
if ( !defined("SEC") ) {
    die("yapma bunu :)");
}
?>
<div id="aside" class="app-aside modal fade nav-dropdown">
    <div class="left navside dark dk aside__inner" layout="column">

        <div class="navbar no-radius">
            <a class="navbar-brand" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                    <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
                    <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
                    <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
                </svg>
            </a>
        </div>

        <div flex class="hide-scroll">
            <nav class="scroll nav-light">

                <ul class="nav" ui-nav="">

                    <li class="<?php echo $page == "index.php" ? "active" : ""; ?>">
                        <a href="index.php">
                            <span class="nav-icon">
                                <i class="material-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                        <path
                                            d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z"
                                            fill="#0cc2aa"></path>
                                    </svg>
                                </i>
                            </span>
                            <span class="nav-text">Anasayfa</span>
                        </a>
                    </li>

                    <li class="<?php echo $page != "index.php" ? "active" : ""; ?>">
                        <a>
                            <span class="nav-icon">
                                <i class="material-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                        <rect x="20" y="10" width="10" height="12" fill="#0cc2aa"></rect>
                                        <rect x="8" y="24" width="10" height="12" fill="#0cc2aa"></rect>
                                        <rect x="32" y="24" width="10" height="12" fill="#0cc2aa"></rect>
                                    </svg>
                                </i>
                            </span>
                            <span class="nav-text">Araçlar</span>
                        </a>
                        <ul class="nav-sub">
                            <li class="<?php echo $page == "arac-ekle.php" ? "active" : ""; ?>">
                                <a href="arac-ekle.php">
                                    <span class="nav-text">Araç Ekle</span>
                                </a>
                            </li>
                            <li class="<?php echo $page == "arac-listele.php" ? "active" : ""; ?>">
                                <a href="arac-listele.php">
                                    <span class="nav-text">Araç Listele</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
        </div>

        <div class="b-t">

            <?php 
                $menuUser = $user->userData($_SESSION["kullaniciadi"]); 
                $gravatar = md5($menuUser["eposta"]);
            ?>
            <div class="nav-fold ng-scope">
                <span class="pull-left">
                    <img src="https://www.gravatar.com/avatar/<?php echo $gravatar; ?>" class="w-40 img-circle">
                </span>
                <span class="clear hidden-folded p-x">
                    <span class="block _500 text-capitalize"><?php echo mb_strtolower( $menuUser["adi"] ." ". $menuUser["soyadi"] ); ?></span>
                    <a href="logout.php"><small class="block text-muted"><i
                                class="fa fa-unlock-alt text-success m-r-sm"></i>Çıkış</small></a>
                </span>
            </div>
        </div>

    </div>
</div>