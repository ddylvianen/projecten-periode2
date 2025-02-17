<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-2"></div>
    </div>


    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Relatienummer</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['ledenoverzicht'] as $lid) : ?>
                        <tr>
                            <td><?= $lid->Relatienummer; ?></td>
                            <td><?= $lid->Email; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">terug</a>
        </div>
        <div class="col-2"></div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>