<div class="intro" style="background-image: url(images/bg.jpg);">
    <div class="dtable hw100">
        <div class="dtable-cell hw100">
            <div class="container text-center">
                <h1 class="intro-title animated fadeInDown"> Selamat datang di <?php echo $this->Mcrud->nama_app(); ?> </h1>

                <p class="sub animateme fittext3 animated fadeIn">
                    Apakah Anda ingin mencari sesuatu?
                </p>

              <form action="pencarian" method="post">
                <div class="row search-row animated fadeInUp">
                    <div class="col-xl-10 col-sm-10 search-col relative"><i class="icon-docs icon-append"></i>
                        <input type="text" name="txtcari" class="form-control has-icon" id="autocomplete"
                               placeholder="Aplikasi, Buku, dll" value="">
                    </div>
                    <div class="col-xl-2 col-sm-2 search-col">
                        <button type="submit" name="btncari" class="btn btn-primary btn-search btn-block"><i
                                class="icon-search"></i><strong>Cari</strong></button>
                    </div>
                </div>
              </form>

            </div>
        </div>
    </div>
</div>
