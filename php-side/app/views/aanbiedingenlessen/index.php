<?php require_once APPROOT . '/views/includes/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/base.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/nav-footer.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/lessen.css">
</head>

<body>
    <div class="cont">
        <?php require_once APPROOT . '/views/includes/navbar.php'; ?>
        <main>
            <div class="week">
                <i class="fa-solid fa-arrow-left"></i>
                <h1>week 5-9 juni</h1>
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <section>
                <?php
                if (!empty($data['lessen'])) {
                    $lessenByDay = [];
                    foreach ($data['lessen'] as $les) {
                        if (!empty($les->datum)) {
                            $timestamp = strtotime($les->datum);
                            $dayEnglish = date('l', $timestamp);
                        } else {
                            $dayEnglish = 'Unknown';
                        }

                        switch ($dayEnglish) {
                            case 'Monday':    $dayDutch = 'Maandag'; break;
                            case 'Tuesday':   $dayDutch = 'Dinsdag'; break;
                            case 'Wednesday': $dayDutch = 'Woensdag'; break;
                            case 'Thursday':  $dayDutch = 'Donderdag'; break;
                            case 'Friday':    $dayDutch = 'Vrijdag'; break;
                            case 'Saturday':  $dayDutch = 'Zaterdag'; break;
                            case 'Sunday':    $dayDutch = 'Zondag'; break;
                            default:        $dayDutch = $dayEnglish;
                        }

                        $lessenByDay[$dayDutch][] = $les;
                    }

                    
                    foreach ($lessenByDay as $dag => $lessenPerDag) {
                        ?>
                        <div class="dag">
                            <h2><?php echo htmlspecialchars($dag); ?></h2>
                            <div class="lessen">
                                <?php foreach ($lessenPerDag as $les) : ?>
                                    <div class="les-card">
                                        
                                        <img src="https://placeholder.pics/svg/100" alt="Les afbeelding">
                                        <div class="card-text">
                                            <h3><?php echo htmlspecialchars($les->titel); ?></h3>
                                            <div class="text">
                                                <p><?php echo htmlspecialchars($les->tijd); ?></p>
                                                <p>Lesgever: <?php echo htmlspecialchars($les->docent); ?></p>
                                                <p>Locatie: <?php echo htmlspecialchars($les->locatie); ?></p>
                                            </div>
                                        </div>
                                        <button class="btn">Inschrijven</button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Geen lessen gevonden.</p>";
                }
                ?>
            </section>
        </main>
        <?php require_once APPROOT . '/views/includes/footer.php'; ?>
    </div>
    <?php require_once APPROOT . '/views/includes/under.php'; ?>
</body>
</html>
