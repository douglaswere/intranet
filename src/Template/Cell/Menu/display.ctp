<div class="col-md-12 text-center nav-color">
    <div class="nav  navbar-expand-lg navbar-dark ">

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ">
                <?php
                foreach ($menu as $parent => $child) {

                    echo '<li class="nav-item dropdown"><a class="nav-link " href="#" aria-expanded="false">' .$child->title  . '</a>';
                    echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';

                    foreach ($child->childmenus as $key => $value) {

                        echo '	<a class="dropdown-item" href="'. $value->destination .'"">' . $value->title  . '</a>';
                    }
                    echo '</div></li>';
                }
                ?>

            </ul>

        </div>
    </div>

</div>
