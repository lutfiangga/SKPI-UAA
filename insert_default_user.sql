-- Masukkan data ke tabel 'user' di schema 'skpi'
INSERT INTO
    skpi.user (nama, alamat)
VALUES (
        'Mahasiswa Universitas Alma Ata',
        'Sekitaran kampus pokoknya'
    ),
    (
        'Dosen UAA',
        'Ya masih di sekitaran Jogja'
    ),
    (
        'Admin Kemahasiswaan',
        'masih sama disekitaran jogja'
    ),
    (
        'Admin Akademik',
        'masih sama juga disekitaran jogja'
    ),
    (
        'Admin Operator',
        'Dimana saja bisa'
    );

-- Masukkan data ke tabel 'auth' di schema 'skpi' tanpa hashing password
-- all password: Pass123
INSERT INTO
    skpi.auth (
        id_user,
        email,
        password,
        role
    )
VALUES (
        1,
        'mahasiswa@almaata.ac.id',
        '$argon2id$v=19$m=16,t=2,p=1$T1BhODhZZTV2WTBtSVJEMQ$PyVa1vL+WCz8zQA5/RTRwQ',
        'mahasiswa'
    ),
    (
        2,
        'dosen@almaata.ac.id',
        '$argon2id$v=19$m=16,t=2,p=1$T1BhODhZZTV2WTBtSVJEMQ$PyVa1vL+WCz8zQA5/RTRwQ',
        'dosen'
    ),
    (
        3,
        'kemahasiswaan@almaata.ac.id',
        '$argon2id$v=19$m=16,t=2,p=1$T1BhODhZZTV2WTBtSVJEMQ$PyVa1vL+WCz8zQA5/RTRwQ',
        'kemahasiswaan'
    ),
    (
        4,
        'akademik@almaata.ac.id',
        '$argon2id$v=19$m=16,t=2,p=1$T1BhODhZZTV2WTBtSVJEMQ$PyVa1vL+WCz8zQA5/RTRwQ',
        'akademik'
    ),
    (
        5,
        'administrator@almaata.ac.id',
        '$argon2id$v=19$m=16,t=2,p=1$T1BhODhZZTV2WTBtSVJEMQ$PyVa1vL+WCz8zQA5/RTRwQ',
        'admin'
    );
