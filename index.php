<?php
require_once __DIR__ . '/config.php';

$profile = $pdo->query("SELECT * FROM profile ORDER BY id ASC LIMIT 1")->fetch();
$skills = $pdo->query("SELECT * FROM skills ORDER BY sort_order ASC, id ASC")->fetchAll();
$projects = $pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();

if (!$profile) {
    $profile = [
        'full_name' => 'Ilham Pramana',
        'headline' => 'Lulusan D3 Manajemen Informatika',
        'about' => 'Saya tertarik pada bidang teknologi informasi, pengembangan website, dan jaringan komputer. Saya senang belajar hal baru serta mengembangkan kemampuan melalui proyek dan pengalaman praktik.',
        'education' => 'D3 Manajemen Informatika — Politeknik Ganesha Medan',
        'email' => 'emailanda@example.com',
        'instagram_url' => 'https://www.instagram.com/username/',
        'location' => 'Medan, Sumatera Utara'
    ];
}
$instagramUrl = $profile['instagram_url'] ?? 'https://www.instagram.com/';
if (!filter_var($instagramUrl, FILTER_VALIDATE_URL)) {
    $instagramUrl = 'https://www.instagram.com/';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portofolio pribadi <?= htmlspecialchars($profile['full_name']) ?>">
    <title>Portofolio | <?= htmlspecialchars($profile['full_name']) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="topbar">
        <a class="brand" href="#beranda">PORTOFOLIO<span></span></a>
        <nav>
            <a href="#tentang">Tentang</a>
            <a href="#kemampuan">Kemampuan</a>
            <a href="#proyek">Proyek</a>
            <a href="#kontak">Kontak</a>
        </nav>
    </header>

    <main>
        <section class="hero" id="beranda">
            <div class="hero-copy">
                <p class="eyebrow">HALO, SAYA</p>
                <h1><?= htmlspecialchars($profile['full_name']) ?><span>.</span></h1>
                <h2><?= htmlspecialchars($profile['headline']) ?></h2>
                <p class="intro"><?= htmlspecialchars($profile['about']) ?></p>
                <div class="hero-actions">
                    <a class="button primary" href="#proyek">Lihat Portofolio</a>
                    <a class="button secondary" href="#kontak">Hubungi Saya</a>
                </div>
            </div>
            <div class="hero-card" aria-label="Kartu profil">
                <div class="avatar">
                    <img src="images/profil.jpg" alt="Foto profil Ilham Pramana">
                </div>
                <p class="card-label">PROFIL SINGKAT</p>
                <h3><?= htmlspecialchars($profile['full_name']) ?></h3>
                <p><?= htmlspecialchars($profile['education']) ?></p>
                <div class="location"><span>⌖</span> <?= htmlspecialchars($profile['location']) ?></div>
            </div>
            <div class="decor decor-one"></div>
            <div class="decor decor-two"></div>
        </section>

        <section class="section" id="tentang">
            <div class="section-heading">
                <p class="eyebrow">KENALI SAYA</p>
                <h2>Tentang Saya</h2>
            </div>
            <div class="about-panel">
                <p><?= nl2br(htmlspecialchars($profile['about'])) ?></p>
                <div class="about-meta">
                    <div><span
                            class="meta-label">Pendidikan</span><strong><?= htmlspecialchars($profile['education']) ?></strong>
                    </div>
                    <div><span
                            class="meta-label">Domisili</span><strong><?= htmlspecialchars($profile['location']) ?></strong>
                    </div>
                </div>
            </div>
        </section>

        <section class="section skills-section" id="kemampuan">
            <div class="section-heading">
                <p class="eyebrow">YANG SAYA PELAJARI</p>
                <h2>Kemampuan</h2>
                <p class="section-subtitle">Kemampuan yang terus saya kembangkan melalui latihan dan pengalaman praktik.
                </p>
            </div>
            <div class="skill-grid">
                <?php if ($skills): ?>
                    <?php foreach ($skills as $skill): ?>
                        <article class="skill-card">
                            <div class="skill-icon"><?= htmlspecialchars($skill['icon'] ?: '✦') ?></div>
                            <h3><?= htmlspecialchars($skill['skill_name']) ?></h3>
                            <p><?= htmlspecialchars($skill['description']) ?></p>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <article class="skill-card">
                        <div class="skill-icon">⌘</div>
                        <h3>HTML & CSS</h3>
                        <p>Membuat struktur halaman dan mengatur tampilan website.</p>
                    </article>
                    <article class="skill-card">
                        <div class="skill-icon">⌁</div>
                        <h3>PHP & MySQL</h3>
                        <p>Dasar pengembangan website dinamis dan pengelolaan database.</p>
                    </article>
                    <article class="skill-card">
                        <div class="skill-icon">⌘</div>
                        <h3>Jaringan Komputer</h3>
                        <p>Dasar LAN, kabel UTP/RJ45, router, switch, dan access point.</p>
                    </article>
                <?php endif; ?>
            </div>
        </section>

        <section class="section" id="proyek">
            <div class="section-heading">
                <p class="eyebrow">PENGALAMAN & KARYA</p>
                <h2>Proyek Saya</h2>
                <p class="section-subtitle">Beberapa Pengalaman yang pernah saya kerjakan.</p>
            </div>
            <div class="project-grid">
                <?php if ($projects): ?>
                    <?php foreach ($projects as $project): ?>
                        <article class="project-card">
                            <div class="project-top"><span><?= htmlspecialchars($project['category']) ?></span><span>↗</span>
                            </div>
                            <h3><?= htmlspecialchars($project['title']) ?></h3>
                            <p><?= htmlspecialchars($project['description']) ?></p>
                            <?php if (!empty($project['project_url'])): ?>
                                <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank"
                                    rel="noopener noreferrer">Lihat proyek ↗</a>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <article class="project-card">
                        <div class="project-top"><span>Web Development</span><span>01</span></div>
                        <h3>Sistem Informasi Perpustakaan</h3>
                        <p>Rancangan website perpustakaan dengan pengelolaan buku, peminjaman, pengembalian, dan ringkasan
                            buku.</p><span class="project-note">Proyek akademik</span>
                    </article>
                    <article class="project-card">
                        <div class="project-top"><span>IT Support</span><span>02</span></div>
                        <h3>Praktik Jaringan & CCTV</h3>
                        <p>Pengalaman praktik dasar perakitan kabel LAN/RJ45 dan pengenalan instalasi CCTV.</p><span
                            class="project-note">Pengalaman praktik</span>
                    </article>
                <?php endif; ?>
            </div>
        </section>

        <section class="contact-section" id="kontak">
            <div>
                <p class="eyebrow">TERHUBUNG</p>
                <h2>Mari berkenalan dan bekerja sama.</h2>
                <p>Silakan hubungi saya atau kunjungi Instagram saya melalui tautan berikut.</p>
            </div>
            <div class="contact-actions">
                <a class="button primary" href="mailto:<?= htmlspecialchars($profile['email']) ?>">✉ Email Saya</a>
                <a class="button instagram" href="<?= htmlspecialchars($instagramUrl) ?>" target="_blank"
                    rel="noopener noreferrer">◎ Instagram Saya ↗</a>
            </div>
        </section>
    </main>

    <footer>
        <p>© <?= date('Y') ?> <?= htmlspecialchars($profile['full_name']) ?>. Dibuat dengan PHP, HTML, CSS, dan MySQL.
        </p>
        <a href="#beranda">Kembali ke atas ↑</a>
    </footer>
</body>

</html>