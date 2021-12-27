<nav class="navbar navbar-light" style="background-color: #f7d217;">
    <!-- Navbar content -->
</nav>
<nav class="navbar navbar-light sticky-top" style="background-color: #06337b;">
    <div class="container-fluid">
        <a href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>assets/dist/img/HomeLogo.png" height="90px" alt="Main Logo" class="brand-image">
        </a>
    </div>
</nav>
<!-- Main content -->
<section class="content">
    <div class="container">
        <h2 class="text-center display-4 mt-5">Search Movie</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" id="search-input" placeholder="Movie Tittle..">
                    <button class="btn btn-primary" type="button" id="search-button">Search</button>
                </div>
            </div>
        </div>
        <hr>

        <div class="row justify-content-center" id="movie-list">

        </div>
    </div>
</section>
<!-- /.content -->