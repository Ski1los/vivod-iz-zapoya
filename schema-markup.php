<?php
/**
 * Schema.org микроразметка
 */

// Получаем данные
$siteName = get_bloginfo('name');
$siteUrl = home_url();
$logoUrl = get_template_directory_uri() . '/assets/image/logo.png';
$phone = THEME_SETTINGS['DATA']['PHONE'] ?? '+7 (999) 999-99-99';
$email = THEME_SETTINGS['DATA']['EMAIL'] ?? 'info@clinic.ru';
$address = 'г. Омск, ул. Примерная, д. 123';
$licenseNumber = 'ЛО-55-01-005678';

// Координаты клиники
$latitude = '54.9885';
$longitude = '73.3242';

// Часы работы
$openingHours = [
    'Mo-Fr 00:00-23:59',
    'Sa-Su 00:00-23:59'
];

// Агрегированный рейтинг
$ratingValue = '4.9';
$reviewCount = '127';

// Формируем JSON-LD
$schema = [
    '@context' => 'https://schema.org',
    '@graph' => []
];

// 1. MedicalOrganization
$schema['@graph'][] = [
    '@type' => ['MedicalOrganization', 'LocalBusiness', 'MedicalClinic'],
    '@id' => $siteUrl . '#organization',
    'name' => $siteName,
    'alternateName' => 'Наркологическая клиника',
    'url' => $siteUrl,
    'logo' => [
        '@type' => 'ImageObject',
        'url' => $logoUrl
    ],
    'image' => [
        '@type' => 'ImageObject',
        'url' => $logoUrl
    ],
    'description' => 'Профессиональная наркологическая помощь. Вывод из запоя, кодирование, реабилитация.',
    'telephone' => preg_replace('/[^0-9+]/', '', $phone),
    'email' => $email,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $address,
        'addressLocality' => 'Омск',
        'addressRegion' => 'Омская область',
        'addressCountry' => 'RU',
        'postalCode' => '644000'
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $latitude,
        'longitude' => $longitude
    ],
    'openingHoursSpecification' => [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        'opens' => '00:00',
        'closes' => '23:59'
    ],
    'priceRange' => '$$',
    'paymentAccepted' => 'Cash, Credit Card',
    'currenciesAccepted' => 'RUB',
    'medicalSpecialty' => [
        '@type' => 'MedicalSpecialty',
        'name' => 'Addiction Treatment',
        'code' => [
            '@type' => 'MedicalCode',
            'codeValue' => '404100',
            'codingSystem' => 'ICD-10'
        ]
    ],
    'license' => $licenseNumber,
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $ratingValue,
        'reviewCount' => $reviewCount,
        'bestRating' => '5',
        'worstRating' => '1'
    ]
];

// 2. ContactPoint
$schema['@graph'][] = [
    '@type' => 'ContactPoint',
    'telephone' => preg_replace('/[^0-9+]/', '', $phone),
    'contactType' => 'customer service',
    'availableLanguage' => ['Russian'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Омск'
    ],
    'contactOption' => ['TollFree', 'AvailableNow']
];

// 3. WebSite
$schema['@graph'][] = [
    '@type' => 'WebSite',
    '@id' => $siteUrl . '#website',
    'url' => $siteUrl,
    'name' => $siteName,
    'description' => 'Наркологическая клиника в Омске. Круглосуточная помощь.',
    'publisher' => [
        '@id' => $siteUrl . '#organization'
    ],
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => $siteUrl . '/?s={search_term_string}',
        'query-input' => 'required name=search_term_string'
    ],
    'inLanguage' => 'ru-RU'
];

// 4. WebPage (для главной)
if (is_front_page()) {
    $schema['@graph'][] = [
        '@type' => 'WebPage',
        '@id' => $siteUrl . '#webpage',
        'url' => $siteUrl,
        'name' => $siteName . ' - Наркологическая клиника',
        'isPartOf' => [
            '@id' => $siteUrl . '#website'
        ],
        'about' => [
            '@id' => $siteUrl . '#organization'
        ],
        'description' => 'Профессиональная наркологическая помощь. Анонимно. Круглосуточно.',
        'inLanguage' => 'ru-RU'
    ];
}

// 5. Service - Вывод из запоя
if (is_singular('service') || is_front_page()) {
    $schema['@graph'][] = [
        '@type' => 'MedicalProcedure',
        'name' => 'Вывод из запоя',
        'description' => 'Безопасный вывод из запоя на дому и в клинике',
        'provider' => [
            '@id' => $siteUrl . '#organization'
        ],
        'availableChannel' => [
            '@type' => 'ServiceChannel',
            'serviceUrl' => $siteUrl . '/service/vyvod-iz-zapoya/',
            'serviceType' => 'MedicalProcedure'
        ],
        'procedureType' => 'Detoxification',
        'bodySite' => [
            '@type' => 'AnatomicalStructure',
            'name' => 'Organism'
        ]
    ];
    
    // 6. Service - Кодирование
    $schema['@graph'][] = [
        '@type' => 'MedicalTherapy',
        'name' => 'Кодирование от алкоголизма',
        'description' => 'Эффективные методы кодирования',
        'provider' => [
            '@id' => $siteUrl . '#organization'
        ],
        'therapyDuration' => 'P1Y',
        'usedToTreat' => [
            '@type' => 'MedicalCondition',
            'name' => 'Alcohol Dependence',
            'code' => [
                '@type' => 'MedicalCode',
                'codeValue' => 'F10.2',
                'codingSystem' => 'ICD-10'
            ]
        ]
    ];
}

// 7. Physician (Врачи)
if (is_singular('doctor')) {
    global $post;
    $doctorName = get_the_title();
    $doctorSpecialty = get_field('doctor_specialty') ?: 'Нарколог';
    
    $schema['@graph'][] = [
        '@type' => 'Physician',
        'name' => $doctorName,
        'description' => $doctorName . ' - ' . $doctorSpecialty,
        'medicalSpecialty' => [
            '@type' => 'MedicalSpecialty',
            'name' => $doctorSpecialty
        ],
        'affiliation' => [
            '@id' => $siteUrl . '#organization'
        ],
        'availableAtOrFrom' => [
            '@id' => $siteUrl . '#organization'
        ]
    ];
}

// 8. FAQPage (для страницы с вопросами)
if (is_page('faq') || get_field('faq_block')) {
    $faqSchema = [
        '@type' => 'FAQPage',
        'mainEntity' => []
    ];
    
    // Здесь можно добавить реальные вопросы из ACF
    $faqSchema['mainEntity'][] = [
        '@type' => 'Question',
        'name' => 'Как быстро вы приезжаете?',
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => 'Мы приезжаем в течение 30-60 минут после звонка.'
        ]
    ];
    
    $schema['@graph'][] = $faqSchema;
}

// 9. BreadcrumbList
$schema['@graph'][] = [
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Главная',
            'item' => $siteUrl
        ]
    ]
];

// Добавляем хлебные крошки для внутренних страниц
if (!is_front_page()) {
    $schema['@graph'][count($schema['@graph']) - 1]['itemListElement'][] = [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => get_the_title(),
        'item' => get_permalink()
    ];
}

// 10. Review (если есть отзывы)
if (is_singular() && have_rows('reviews')) {
    $reviewSchema = [
        '@type' => 'Review',
        'itemReviewed' => [
            '@id' => $siteUrl . '#organization'
        ],
        'reviewRating' => [
            '@type' => 'Rating',
            'ratingValue' => '5',
            'bestRating' => '5'
        ],
        'author' => [
            '@type' => 'Person',
            'name' => 'Пациент'
        ]
    ];
    $schema['@graph'][] = $reviewSchema;
}

// Выводим JSON-LD
echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>' . "\n";