<?= $this->extend('layout/admin/main') ?>


<?= $this->section('content') ?>
    <h2 class="fw-bold">user data</h2>

    <div class="my-3 rounded-1 border border-primary">
        <div class="my-callout-content rounded-1">

            <div class="p-2 rounded-1"
                 style="border-left: 7px solid dodgerblue;background-color: #c8d5ef">
                <strong class="ms-3 d-block">ℹ️ info</strong>
                <div class="ps-3 ">
                    1. sample callout information
                </div>
            </div>

        </div>
    </div>

<div>
    <button id="tooltip" class=" btn btn-primary">hover me</button>
</div>
    <div class="my-5">

        <div id="table"></div>

    </div>


    <script src="<?=base_url("resources/js/data-display/user.js")?>"></script>
    <script>
        tippy('#tooltip', {
            content: 'sample tooltip!',
        });
    </script>


<?= $this->endSection('content') ?>
