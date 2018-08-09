<nav class="navbar navbar-expand-lg navbar-dark nav-bg navbar-fixed-top">
    <button class="navbar-toggler container-fluid" type="button" data-toggle="collapse" data-target="#navbarsExample08"
            aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            {!! menu('main','layouts.mymenu') !!}

            <li class="nav-item">
                <a href="/cart" class="links">
                    <span class="fas fa-shopping-cart" style="font-size: 1.2em;">
                    </span>
                    <span data-bind="text: getProductCount()"></span>
                    </a>
            </li>

        </ul>
    </div>
</nav>
