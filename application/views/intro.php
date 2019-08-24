<div class="intro" style="background-image: url(images/bg.gif);">
    <div class="dtable hw100">
        <div class="dtable-cell hw100">
            <div class="container text-center">
                <h1 class="intro-title animated fadeInDown"> Selamat datang di <?php echo $this->Mcrud->nama_app(); ?> </h1>

                <p class="sub animateme fittext3 animated fadeIn">
                    Apakah Anda ingin mencari sesuatu?
                </p>

              <?php $this->load->view('pencarian'); ?>

            </div>
        </div>
    </div>
</div>
