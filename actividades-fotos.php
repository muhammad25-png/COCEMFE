<?php
include 'includes/header.php';

// Definir las categorías de fotos y sus carpetas en disco
$categories = [
    "Jornadas y actos" => "Jornadas y actos",
    "Actividades y terapias" => "Actividades y terapias",
    "Transporte adaptado y ayudas tecnicas" => "Transporte adaptado y ayudas técnicas",
    "Playa" => "Playa",
    "Hipoterapia" => "Hipoterapia",
    "Fiestas tematicas" => "Fiestas temáticas",
    "Fisioterapia" => "Fisioterapia",
    "Cultura" => "Cultura",
    "Hidroterapia" => "Hidroterapia",
    "Ocio" => "Ocio"
];

// $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
$baseDir = 'images/';
?>
<!--
$_SERVER['DOCUMENT_ROOT'] sirve para obtener la ruta absoluta del directorio raíz del servidor web actual.
En lugar de una dirección web (URL), te devolverá la ubicación absoluta real, como:
Linux: /var/www/html/
Windows: C:/xampp/htdocs/
-->

<!-- Cabecera de Página -->
<section class="page-header">
    <div class="container">
        <h1>Galería Fotográfica</h1>
        <div class="breadcrumb">
            <a href="index.php">Inicio</a>
            <span>/</span>
            <span>Actividades</span>
            <span>/</span>
            <span>Fotos</span>
        </div>
    </div>
</section>

<!-- Contenido Principal -->
<section class="section-padding">
    <div class="container">
        <div class="internal-page-layout">
            <div class="content-block">
                <h2>Actividades en Imágenes</h2>
                <p style="margin-bottom: 30px;">
                    Explora los momentos destacados de nuestras jornadas, programas terapéuticos y actividades socioculturales. Haz clic en las categorías para filtrar las fotos.
                </p>

                <!-- Filtros de Categoría -->
                <div class="gallery-filters" style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 40px; justify-content: center;">
                    <button class="gallery-filter-btn active" data-filter="all" style="background-color: var(--primary-color); color: white; border: none; padding: 10px 20px; border-radius: var(--border-radius-md); font-family: var(--font-heading); font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                        Todas las fotos
                    </button>
                    <?php 
                    $catIndex = 1;
                    foreach ($categories as $folder => $title): 
                    ?>
                        <button class="gallery-filter-btn" data-filter="<?php echo strtolower(str_replace(' ', '-', $folder)); ?>" style="background-color: var(--bg-light); color: var(--primary-color); border: 1px solid var(--border-color); padding: 10px 20px; border-radius: var(--border-radius-md); font-family: var(--font-heading); font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                            <?php echo $title; ?>
                        </button>
                    <?php 
                    endforeach; 
                    ?>
                </div>

                <!-- Rejilla de Imágenes -->
                <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
                    <?php
                    foreach ($categories as $folder => $title) {
                        $classFilter = strtolower(str_replace(' ', '-', $folder));
                        $diskPath = $baseDir . $folder;
                        
                        if (is_dir($diskPath)) {
                            // Escanear imágenes de la carpeta
                            $files = scandir($diskPath);
                            foreach ($files as $file) {
                                if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                                    $webPath = 'images/' . $folder . '/' . $file;
                                    ?>
                                    <div class="gallery-item <?php echo $classFilter; ?>" style="border-radius: var(--border-radius-md); overflow: hidden; box-shadow: var(--shadow-sm); height: 220px; position: relative; transition: all 0.4s ease; cursor: pointer;">
                                        <img src="<?php echo $webPath; ?>" alt="<?php echo $title; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                        <div class="gallery-item-hover" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 60, 104, 0.7); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fa fa-search-plus"></i>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="galleryLightbox" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.9); z-index: 9999; display: none; align-items: center; justify-content: center;">
    <span id="closeLightbox" style="position: absolute; top: 20px; right: 30px; color: white; font-size: 2.5rem; cursor: pointer; font-weight: bold; transition: color 0.2s;">&times;</span>
    <img id="lightboxImg" src="" alt="" style="max-width: 90%; max-height: 85%; object-fit: contain; border-radius: 4px; box-shadow: 0 5px 25px rgba(0,0,0,0.5);">
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const closeLightbox = document.getElementById('closeLightbox');

    // 1. Filtrado de galería
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Quitar clase activa de todos y añadir al actual
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.backgroundColor = 'var(--bg-light)';
                btn.style.color = 'var(--primary-color)';
                btn.style.borderColor = 'var(--border-color)';
            });
            button.classList.add('active');
            button.style.backgroundColor = 'var(--primary-color)';
            button.style.color = 'white';
            button.style.borderColor = 'var(--primary-color)';

            const filterValue = button.getAttribute('data-filter');

            galleryItems.forEach(item => {
                if (filterValue === 'all') {
                    item.style.display = 'block';
                    setTimeout(() => { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 50);
                } else {
                    if (item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                        setTimeout(() => { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 50);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => { item.style.display = 'none'; }, 300);
                    }
                }
            });
        });
    });

    // 2. Efecto hover e inicialización de Lightbox
    galleryItems.forEach(item => {
        const hoverOverlay = item.querySelector('.gallery-item-hover');
        item.addEventListener('mouseenter', () => { hoverOverlay.style.opacity = '1'; });
        item.addEventListener('mouseleave', () => { hoverOverlay.style.opacity = '0'; });

        item.addEventListener('click', () => {
            const imgSrc = item.querySelector('img').src;
            lightboxImg.src = imgSrc;
            lightbox.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Evitar scroll
        });
    });

    // Cerrar Lightbox
    closeLightbox.addEventListener('click', () => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
});
</script>
<?php
include 'includes/footer.php';
?>
