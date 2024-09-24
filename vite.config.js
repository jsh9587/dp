import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fg from 'fast-glob';

export default defineConfig(async () => {
    // Use fast-glob to gather input files
    const inputs = await fg([
        'resources/css/**/*.css',   // All CSS files, including subdirectories
        'resources/scss/**/*.scss', // All SCSS files, including subdirectories
        'resources/js/**/*.js',     // All JavaScript files, including subdirectories
        'resources/img/**/*.*',     // All image files (any extension)
        'resources/vendor/**/*.js', // Vendor JS files
        'resources/vendor/**/*.css', // Vendor JS files
    ]);

    return {
        plugins: [
            laravel({
                input: inputs,
                refresh: true,
            }),
        ],
    };
});
