<?php require_once APPROOT . '/views/includes/header.php'; ?>

<link rel="stylesheet" href="./public/css/base.css">
<link rel="stylesheet" href="./public/css/nav-footer.css">
<link rel="stylesheet" href="./public/css/overzicht.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="cont">
        <?php require_once APPROOT . '/views/includes/navbar.php'; ?>
        <main>
            <!-- 1 table = one week -->
             <?php require_once APPROOT . '/views/view-functions/lessen.php'; ?>
             <?php
                    $template = new Lessen();
                    $template->page($data);
                ?>
        </main>
        <?php require_once APPROOT . '/views/includes/footer.php'; ?>
    </div>

    <!-- <div class="modal">
        <div class="modal-content">
            <div class="modal-header border">
                <h2>Delete ****?</h2>
                <i class="fa-solid fa-x modal-close"></i>
            </div>
            
            <div class="text border">
                <p>Are you sure you want to delete ****?</p>
                <p>This action cant be undone.</p>
            </div>
            <div class="modal-actions">
                <button class="btn">Cancel</button>
                <button class="btn">Delete</button>
            </div>
        </div>    
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <?php require_once APPROOT . '/views/includes/under.php'; ?>