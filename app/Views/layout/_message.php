
<?php
if(session()->getFlashdata("message") !== NULL) {
    $message = session()->getFlashdata('message');
    echo <<<HTML
        <div class="alert alert-info alert-dismissible fade show alert-overlay" role="alert">
        <i class="fa-solid fa-circle-info" style="color: #62a0ea;"></i>
        <span style="background-color: transparent">
            $message
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        HTML;
}elseif (session()->getFlashdata('validation') !== NULL) {
    $messages = session()->getFlashdata('validation');
    ?>
    <div class="alert alert-danger alert-dismissible fade show alert-overlay" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <span>error validation</span>
        <div>
            <ul class="list-group list-group-numbered">
                <?php foreach ($messages as $message): ?>
                    <li class="list-group-item"
                        style="background-color: transparent"
                    ><?= htmlspecialchars($message) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}elseif(!empty($message)){
    $messages = $message;
    echo <<<HTML
        <div class="alert alert-info alert-dismissible fade show alert-overlay" role="alert">
        <i class="fa-solid fa-circle-info" style="color: #62a0ea;"></i>
        <span style="background-color: transparent">
            $message
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        HTML;
}elseif(!empty($error)){
    $messages = $error;
    echo <<<HTML

    <div class="alert alert-danger alert-dismissible fade show alert-overlay" role="alert">
        <i class="fa-solid fa-exclamation"></i>
        <span style="background-color: transparent">
            $messages
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
HTML;
}elseif(session()->getFlashdata("error") !== NULL){
    $message = session()->getFlashdata('error');
    echo <<<HTML

    <div class="alert alert-danger alert-dismissible fade show alert-overlay" role="alert">
        <i class="fa-solid fa-exclamation"></i>
        <span style="background-color: transparent">
            $message
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
HTML;
}
?>