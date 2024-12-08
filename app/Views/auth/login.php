<?= $this->extend('layout/reader/main') ?>

<?= $this->section('title') ?>
<?= "Login"?>
<?= $this->endSection('title') ?>


<?= $this->section('content') ?>
    <div class="container-lg my-5">
        <?= $this->include('layout/_message')?>
        <form action="<?=base_url('login')?>"
              class="mx-auto" style="width: 350px"
              method="post">
            <h4 class="fs-4 text-center">login</h4>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email</label>
                <input type="email"
                       autocomplete="off"
                       name="email"
                       required
                       class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password"
                       required
                       name="password"
                       class="form-control"
                       id="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" onclick="showHide()" class="form-check-input border-black"
                       id="exampleCheck1" style="width: 15px;height: 15px">
                <label class="form-check-label" for="exampleCheck1">show password</label>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-secondary-color">Submit</button>

            </div>
        </form>
    </div>

    <script>
        // show password
        function showHide() {
            var inputan = document.getElementById("password");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }
    </script>

<?= $this->endSection('content') ?>