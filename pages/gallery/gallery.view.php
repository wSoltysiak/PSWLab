<section class="mb-5 text-center">
    <h2>
        <h1>Witaj, <?php echo $_SESSION['login']; ?>.</h1>
        Zdjęcia z naszej biblioteki
    </h2>
    <div class="container mt-4">
        <div id="carouselExampleControls" class="carousel carousel-overflow slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/photo1.jpg" alt="1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/photo2.jpg" alt="2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/photo3.jpg" alt="3">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/photo4.jpg" alt="4">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
        </div>
    </div>

</section>