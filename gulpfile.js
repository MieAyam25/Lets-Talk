const gulp = require('gulp');
const browserSync = require('browser-sync').create();

// Tugas untuk menjalankan server lokal dan live reload
gulp.task('serve', function () {
    browserSync.init({
        proxy: 'localhost/letsTalk/index.php', // Ganti dengan alamat proyek PHP Anda
        port: 3000,
        open: false // Agar browser tidak terbuka otomatis
    });

    // Pantau perubahan pada file PHP dan reload browser
    gulp.watch('*.php').on('change', browserSync.reload);
});

// Tugas default
gulp.task('default', gulp.series('serve'));
