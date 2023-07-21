<?php
session_start();
?>
    <div class="container row">
      <main class="col-6">
        <div class="p-3">
          <div class="text-center">
            <?php
              if (isset($_SESSION["message"])) {
                echo $_SESSION["message"];
                $_SESSION["message"] = null;
              }
            ?>
            <h4 class="mb-3">Ceritakan! Apa yang bisa kami bantu...</h4>
          </div>
          <form action="email.php" method="POST">
            <div class="row g-3">
              <div class="col-12">
                <label for="name" class="form-label">Nama :</label>
                <input
                  name="nama"
                  type="text"
                  class="form-control"
                  id="nama"
                  placeholder="Nama Kamu"
                />
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <label for="phone" class="form-label">Nomer Telephone :</label>
                <input
                  name="phone"
                  type="number"
                  class="form-control"
                  id="phone"
                  placeholder="Nomor yang bisa dihubungi"
                />
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <label for="email" class="form-label">Email :</label>
                <input
                  name="email"
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Email kamu untuk kami balas"
                />
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <label for="judul" class="form-label">Judul :</label>
                <input
                  name="judul"
                  type="judul"
                  class="form-control"
                  id="judul"
                  placeholder="Judul pelaporan"
                />
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-12">
                <label for="email" class="form-label">Pesan dan Kesan :</label>
                <div class="form-floating">
                  <textarea
                    name="pesan"
                    class="form-control"
                    placeholder="Leave a comment here"
                    id="floatingTextarea2"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea2">Pesan yang disampaikan</label>
                </div>
              </div>
            </div>

            <hr class="my-4" />

            <button class="w-100 btn btn-primary btn-lg" type="submit">
              Kirim
            </button>
          </form>
        </div>
      </main>
    </div>