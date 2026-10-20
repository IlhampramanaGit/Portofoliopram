CREATE TABLE
    IF NOT EXISTS profile (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        headline VARCHAR(150) NOT NULL,
        about TEXT NOT NULL,
        education VARCHAR(200) NOT NULL,
        email VARCHAR(150) NOT NULL,
        instagram_url VARCHAR(255) NOT NULL,
        location VARCHAR(150) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS skills (
        id INT AUTO_INCREMENT PRIMARY KEY,
        skill_name VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        icon VARCHAR(20) DEFAULT '✦',
        sort_order INT DEFAULT 0
    );

CREATE TABLE
    IF NOT EXISTS projects (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(150) NOT NULL,
        category VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        project_url VARCHAR(255) DEFAULT NULL
    );

INSERT INTO
    profile (
        full_name,
        headline,
        about,
        education,
        email,
        instagram_url,
        location
    )
SELECT
    'Ilham Pramana',
    'Lulusan D3 Manajemen Informatika',
    'Saya tertarik pada bidang teknologi informasi, pengembangan website, dan jaringan komputer. Saya senang belajar hal baru serta mengembangkan kemampuan melalui proyek dan pengalaman praktik.',
    'D3 Manajemen Informatika - Politeknik Ganesha Medan',
    'emailanda@example.com',
    'https://www.instagram.com/username/',
    'Medan, Sumatera Utara'
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            profile
    );

INSERT INTO
    skills (skill_name, description, icon, sort_order)
SELECT
    'HTML & CSS',
    'Membuat struktur halaman dan mengatur tampilan website.',
    'HTML',
    1
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            skills
        WHERE
            skill_name = 'HTML & CSS'
    );

INSERT INTO
    skills (skill_name, description, icon, sort_order)
SELECT
    'PHP & MySQL',
    'Dasar pengembangan website dinamis dan pengelolaan database.',
    'PHP',
    2
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            skills
        WHERE
            skill_name = 'PHP & MySQL'
    );

INSERT INTO
    skills (skill_name, description, icon, sort_order)
SELECT
    'Jaringan Komputer',
    'Dasar LAN, kabel UTP/RJ45, router, switch, dan access point.',
    'LAN',
    3
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            skills
        WHERE
            skill_name = 'Jaringan Komputer'
    );

INSERT INTO
    skills (skill_name, description, icon, sort_order)
SELECT
    'Troubleshooting Komputer',
    'Pemeriksaan awal masalah komputer, koneksi jaringan, dan perangkat.',
    'IT',
    4
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            skills
        WHERE
            skill_name = 'Troubleshooting Komputer'
    );

INSERT INTO
    projects (title, category, description, project_url)
SELECT
    'Sistem Informasi Perpustakaan',
    'Web Development',
    'Rancangan website perpustakaan dengan pengelolaan buku, peminjaman, pengembalian, dan ringkasan buku.',
    NULL
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            projects
        WHERE
            title = 'Sistem Informasi Perpustakaan'
    );

INSERT INTO
    projects (title, category, description, project_url)
SELECT
    'Praktik Jaringan & CCTV',
    'IT Support',
    'Pengalaman praktik dasar perakitan kabel LAN/RJ45 dan pengenalan instalasi CCTV.',
    NULL
WHERE
    NOT EXISTS (
        SELECT
            1
        FROM
            projects
        WHERE
            title = 'Praktik Jaringan & CCTV'
    );