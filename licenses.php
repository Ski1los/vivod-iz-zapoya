<?php
// Путь к папке с сертификатами
$certDir = WP_CONTENT_DIR . '/certificates';
$certUrl = content_url('/certificates');

// Сканируем папку
$certFiles = [];
if (is_dir($certDir)) {
    $files = scandir($certDir);
    foreach ($files as $file) {
        if (preg_match('/\.(jpg|jpeg|png|pdf|webp)$/i', $file)) {
            $certFiles[] = [
                'name' => $file,
                'url' => $certUrl . '/' . $file,
                'title' => pathinfo($file, PATHINFO_FILENAME)
            ];
        }
    }
}
?>

<section class="section licenses-section">
    <div class="container">
        <div class="section__header">
            <h1 class="section__title">Лицензии и сертификаты</h1>
            <p class="section__subtitle">Мы работаем официально на основании медицинской лицензии</p>
        </div>
        
        <!-- Основная информация -->
        <div class="license-info">
            <div class="license-info__main">
                <div class="license-info__icon">📋</div>
                <div class="license-info__content">
                    <h2 class="license-info__title">Медицинская лицензия</h2>
                    <div class="license-info__number">
                        <span class="license-label">№</span>
                        <span class="license-number">ЛО-55-01-005678</span>
                    </div>
                    <p class="license-info__desc">
                        Выдана Министерством здравоохранения Омской области<br>
                        Действует бессрочно
                    </p>
                    <a href="https://roszdravnadzor.gov.ru/" target="_blank" class="license-info__link" rel="nofollow">
                        Проверить в реестре Росздравнадзора →
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Галерея -->
        <?if (!empty($certFiles)):?>
        <div class="certificates-gallery">
            <h3 class="gallery-title">Документы клиники</h3>
            
            <div class="certificates-grid">
                <?foreach ($certFiles as $cert):?>
                    <a href="<?=$cert['url']?>" class="certificate-card" data-fancybox="licenses" data-caption="<?=$cert['title']?>">
                        <div class="certificate-card__image">
                            <?if (preg_match('/\.pdf$/i', $cert['name'])):?>
                                <div class="certificate-card__placeholder certificate-card__placeholder_pdf">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                                        <path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2Z" stroke="white" stroke-width="2"/>
                                        <path d="M14 2V8H20" stroke="white" stroke-width="2"/>
                                        <text x="6" y="18" fill="white" font-size="6" font-weight="bold">PDF</text>
                                    </svg>
                                    <span>PDF документ</span>
                                </div>
                            <?else:?>
                                <img src="<?=$cert['url']?>" alt="<?=$cert['title']?>" loading="lazy">
                            <?endif;?>
                            
                            <div class="certificate-card__overlay">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                                    <circle cx="11" cy="11" r="8" stroke="white" stroke-width="2"/>
                                    <path d="M21 21L16.65 16.65" stroke="white" stroke-width="2"/>
                                    <path d="M11 8V14" stroke="white" stroke-width="2"/>
                                    <path d="M8 11H14" stroke="white" stroke-width="2"/>
                                </svg>
                                <span>Увеличить</span>
                            </div>
                        </div>
                        <div class="certificate-card__title"><?=$cert['title']?></div>
                    </a>
                <?endforeach;?>
            </div>
        </div>
        <?endif;?>
    </div>
</section>

<style>
.licenses-section { padding: 60px 0; background: #fff; }
.license-info { background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 16px; padding: 40px; margin-bottom: 50px; }
.license-info__main { display: flex; gap: 25px; align-items: flex-start; }
.license-info__icon { font-size: 48px; }
.license-info__content { flex-grow: 1; }
.license-info__title { font-size: 24px; margin: 0 0 15px 0; }
.license-info__number { display: flex; align-items: baseline; gap: 8px; margin-bottom: 10px; }
.license-label { font-size: 16px; color: #666; font-weight: 600; }
.license-number { font-size: 28px; font-weight: 800; color: #e74c3c; }
.license-info__desc { color: #666; line-height: 1.6; margin-bottom: 15px; }
.license-info__link { color: #e74c3c; text-decoration: none; font-weight: 600; }
.gallery-title { font-size: 24px; text-align: center; margin-bottom: 30px; }
.certificates-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
.certificate-card { display: block; text-decoration: none; }
.certificate-card__image { position: relative; aspect-ratio: 0.75; background: #f8f9fa; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
.certificate-card__image img { width: 100%; height: 100%; object-fit: cover; }
.certificate-card__placeholder { width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 15px; background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: #fff; }
.certificate-card__overlay { position: absolute; inset: 0; background: rgba(231, 76, 60, 0.9); display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 10px; opacity: 0; transition: opacity 0.3s; }
.certificate-card:hover .certificate-card__overlay { opacity: 1; }
.certificate-card__title { margin-top: 12px; text-align: center; font-weight: 600; }
@media (max-width: 768px) {
    .license-info__main { flex-direction: column; }
    .certificates-grid { grid-template-columns: 1fr; }
}
</style>