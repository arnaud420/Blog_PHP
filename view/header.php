<header>
    <nav class="cyan accent-4 nav-extended">
        <div class="nav-wrapper container">
            <a href="/blog-ydays/index.html" class="brand-logo"><i class="material-icons">cloud</i>Voyageons</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li ><a class="lien-menu" href = "/blog-ydays/index.html" >Accueil</a></li>
                <?php
                    if (isset($_SESSION['pseudo']) == true) {
                        echo '<li ><a class="lien-menu" href = "#" > Profil</a></li>';
                        echo '<li ><a class="lien-menu" href = "/blog-ydays/membres/deconnexion.php" > Déconnexion</a></li>';
                            }
                            else
                            {
                                echo '<li ><a class="lien-menu" href = "connexion.html" > Connexion</a ></li >';
                                echo '<li ><a class="lien-menu" href = "inscription.html" > Inscription</a ></li >';
                            }
                            ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li ><a href = "index.html" >Accueil</a></li>
                <?php
                if (isset($_SESSION['pseudo']) == true) {
                    echo '<li ><a href = "#" > Profil</a></li>';
                    echo '<li><a href="/blog-ydays/membres/deconnexion.php">Déconnexion</a></li>';
                }
                else {
                    echo '<li><a href="connexion.html">Connexion</a></li>';
                    echo '<li><a href="inscription.html">Inscription</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="nav-content section">
            <h1 class="center"><a href="/blog-ydays/index.html">Carnet de voyage</a></h1>
        </div>
    </nav>
</header>