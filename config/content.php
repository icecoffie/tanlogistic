<?php
return [

    /* ------------------------------------------------------------------ */
    /* Company identity                                                   */
    /* ------------------------------------------------------------------ */
    'company' => [
        'name' => 'PT. Tetuko Anugerah Nusantara',
        'brand' => 'TAN Logistic',
        'tagline' => 'Integrated one stop logistics from Indonesia to the world',
        'email' => 'info@tanlogistic.com',
        'website' => 'www.tanlogistic.com',
        'phone' => '+62 21 3831 7340',
        // WhatsApp contact. 'number' is the international format without "+" or spaces,
        // used for wa.me links. Set 'number' to '' to hide WhatsApp everywhere.
        'whatsapp' => [
            'number' => '6281282725889',
            'display' => '+62 812 8272 5889',
            'name' => 'Mr. Tantowi',
            'title' => 'Managing Director',
            'message' => 'Hello Mr. Tantowi, I would like to ask about TAN Logistic services.',
        ],
        // WeChat has no reliable web link, so visitors copy the ID. Leave empty to hide.
        'wechat' => 'sandradyta',
        'address' => 'Jl. Villa Tengah Blok G No.15, RT008/RW 002, Pekayon Jaya, Bekasi Selatan, Bekasi, Jawa Barat, 17148',
        'street' => 'Jl. Villa Tengah Blok G No.15, RT008/RW 002, Pekayon Jaya, Bekasi Selatan',
        'city' => 'Bekasi',
        'region' => 'Jawa Barat',
        'postal_code' => '17148',
        // Official accounts. Items with an empty URL are hidden.
        'social' => [
            ['name' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://www.instagram.com/tanlogistic_indonesia/'],
            ['name' => 'TikTok', 'icon' => 'tiktok', 'url' => 'https://www.tiktok.com/@tanlogisticindonesia'],
            ['name' => 'LinkedIn', 'icon' => 'linkedin', 'url' => ''],
            ['name' => 'Facebook', 'icon' => 'facebook', 'url' => ''],
        ],
        // Logo files in public/images
        'logo' => 'images/brand/tan-logo.png',           // for light backgrounds (black text)
        'logo_dark' => 'images/brand/tan-logo-dark.png', // for dark backgrounds (white text)
        'emblem' => 'images/brand/tan-logo.png',       
    ],

    // Company Profile PDF. Stored outside public/ and opened in the browser
    // through the /company-profile route. Replace the file to update it.
    'company_profile' => [
        // Web optimised copy (5 MB, SEO metadata). The untouched original is kept in
        // storage/app/company-profile/original/. To update, replace the file below.
        'path' => 'app/company-profile/tan-logistic-company-profile-2026.pdf', // relative to storage/
        'filename' => 'TAN-Logistic-Company-Profile-2026.pdf',
        'label' => 'View Company Profile',
        'short_label' => 'Company Profile',
        'meta' => 'PDF · 2026 Edition',
    ],

    'nav' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Services', 'route' => 'services'],
        ['label' => 'Clients', 'route' => 'clients'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    /* ------------------------------------------------------------------ */
    /* Shared labels                                                      */
    /* ------------------------------------------------------------------ */
    'ui' => [
        'contact_cta' => 'Contact Us',
        'explore_services' => 'Explore Services',
        'learn_services' => 'Our Services',
        'all_clients' => 'View All Clients',
        'about_us' => 'About Us',
        'request_quote' => 'Request a Quote',
        'skip_to_content' => 'Skip to content',
        'main_navigation' => 'Main navigation',
        'open_menu' => 'Open menu',
        'home_label' => 'Home',
        'certifications_eyebrow' => 'Standards and Memberships',
        'certifications_title' => 'Certifications',
        'certifications_text' => 'Our quality management system is ISO 9001:2015 certified by CQM Registrar, and we are a JCTrans Premium member (ID 150870) of the Global Logistics Network.',
        'badges_title' => 'Certified and Trusted',
        'footer_company' => 'Company',
        'footer_services' => 'Services',
        'footer_contact' => 'Contact',
        'footer_social' => 'Social',
        'rights' => 'All rights reserved.',
        'maps' => 'Maps',
        'not_found_title' => 'Page Not Found',
        'not_found_text' => 'The page you are looking for has moved or no longer exists.',
        'back_home' => 'Back to Home',
    ],

    /* ------------------------------------------------------------------ */
    /* SEO per page                                                       */
    /* ------------------------------------------------------------------ */
    // Titles stay around 60 characters and descriptions around 155 so
    // Google shows them in full. Keywords follow the Company Profile.
    'seo' => [
        'site_name' => 'TAN Logistic',
        'default_image' => 'images/og-image.jpg',
        'home' => [
            'title' => 'TAN Logistic | PT. Tetuko Anugerah Nusantara Freight Forwarder',
            'description' => 'TAN Logistic (PT. Tetuko Anugerah Nusantara) is an Indonesian freight forwarder for sea and air export import, customs clearance, trucking and warehousing.',
        ],
        'about' => [
            'title' => 'About TAN Logistic | PT. Tetuko Anugerah Nusantara',
            'description' => 'Over a decade representing Indonesia in international trade and logistics. Discover the vision, mission and strategic advantages of TAN Logistic.',
            'image' => 'images/port.jpg',
        ],
        'services' => [
            'title' => 'Sea, Air, Customs and Trucking Services | TAN Logistic',
            'description' => 'Export and import by sea (FCL, LCL) and air, customs management, domestic freight forwarding and trucking, plus warehousing and distribution in Indonesia.',
            'image' => 'images/ocean.jpg',
        ],
        'clients' => [
            'title' => 'Clients and ISO Certifications | TAN Logistic',
            'description' => 'Trusted by CGV, Yamaha, SCHOTT, Carrier, Skyworth and more. ISO 9001:2015 certified by CQM Registrar and a JCTrans Premium member (ID 150870).',
            'image' => 'images/partnership.jpg',
        ],
        'contact' => [
            'title' => 'Contact TAN Logistic | Offices in Bekasi, Surabaya, Semarang',
            'description' => 'Contact PT. Tetuko Anugerah Nusantara at our head office in Bekasi or branch offices in Surabaya, Semarang, Pekalongan, Batang and Yogyakarta.',
            'image' => 'images/land.jpg',
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* HOME                                                               */
    /* ------------------------------------------------------------------ */
    'hero' => [
        'eyebrow' => 'TAN Logistic · PT. Tetuko Anugerah Nusantara',
        'title' => 'Integrated Logistics from Indonesia to the World',
        'subtitle' => 'Export and import by sea and air, customs management, inland transportation and warehousing. One stop logistics built on efficiency, compliance and reliability.',
        'image' => 'images/hero.jpg',
        'image_alt' => 'Aerial view of a container port with a cargo ship at the quay',
        'cta_secondary' => ['label' => 'Explore Services', 'route' => 'services'],
        'card_left' => [
            'image' => 'images/ocean.jpg',
            'label' => 'Ocean and Air Freight',
            'text' => 'FCL · LCL · Priority Air',
        ],
        'card_right' => [
            'label' => 'Global Network',
            'value' => '10,000+',
            'text' => 'agents in 200 countries',
            'from' => 'Indonesia',
            'to' => 'Worldwide',
        ],
    ],

    'home_services' => [
        'eyebrow' => 'Our main services',
        'title' => 'Our Services',
        'items' => [
            [
                'title' => 'Ocean Freight',
                'tag' => 'Sea',
                'image' => 'images/ocean.jpg',
                'description' => 'Reliable Full Container Load (FCL) and Less than Container Load (LCL) services connecting major global ports.',
                'anchor' => 'export-import',
            ],
            [
                'title' => 'Air Freight',
                'tag' => 'Air',
                'image' => 'images/air.jpg',
                'description' => 'Fast and efficient solutions for high priority, time sensitive shipments.',
                'anchor' => 'export-import',
            ],
            [
                'title' => 'Land Express',
                'tag' => 'Land',
                'image' => 'images/land.jpg',
                'description' => 'A diverse fleet from small vans to CDD, Fuso, wingbox and trailer trucks for inland distribution.',
                'anchor' => 'domestic',
            ],
        ],
        'summary' => 'Our services are designed to ensure efficiency, compliance and reliability across every stage of the supply chain, all handled by one team under one roof.',
    ],

    'stats' => [
        ['value' => '10+', 'label' => 'Years of Experience', 'icon' => 'award'],
        ['value' => '10,000+', 'label' => 'Global Network Agents', 'icon' => 'network'],
        ['value' => '200', 'label' => 'Countries Reached', 'icon' => 'globe'],
        ['value' => '6', 'label' => 'Offices in Indonesia', 'icon' => 'building'],
    ],

    'end_to_end' => [
        'eyebrow' => 'End to end management',
        'title' => 'We Take Full Responsibility for Every Shipment',
        'description' => 'From secure pickup at your location to final mile delivery, we manage the entire shipment lifecycle with precise documentation and seamless carrier coordination.',
        'image' => 'images/port.jpg',
        'image_alt' => 'Container ship docked at a terminal with cranes',
        'cards' => [
            [
                'icon' => 'file-check',
                'text' => 'Precise preparation of all shipping and legal documents, plus handling of customs formalities for a safe, on time arrival.',
                'tags' => ['Documentation', 'Customs'],
                'highlight' => false,
            ],
            [
                'icon' => 'package',
                'text' => 'Secure cargo collection from your designated location and seamless communication with major shipping lines and airlines.',
                'tags' => ['Pickup', 'Carriers'],
                'highlight' => true,
            ],
        ],
        // Interactive route card. The first item of each list is selected by default.
        'mockup' => [
            'title' => 'Plan your route',
            'from_label' => 'Origin',
            'to_label' => 'Destination',
            'mode_label' => 'Shipping mode',
            'cta' => 'Get a quote for this route',
            'origins' => [
                'Bekasi, Indonesia',
                'Surabaya, Indonesia',
                'Semarang, Indonesia',
                'Pekalongan, Indonesia',
                'Batang, Indonesia',
                'Yogyakarta, Indonesia',
            ],
            // 'domestic' => true sends the quote request as a domestic service
            'destinations' => [
                ['name' => 'Port of Rotterdam, NL', 'domestic' => false],
                ['name' => 'Singapore, SG', 'domestic' => false],
                ['name' => 'Shanghai, CN', 'domestic' => false],
                ['name' => 'Tokyo, JP', 'domestic' => false],
                ['name' => 'Busan, KR', 'domestic' => false],
                ['name' => 'Jebel Ali, Dubai, AE', 'domestic' => false],
                ['name' => 'Hamburg, DE', 'domestic' => false],
                ['name' => 'Los Angeles, US', 'domestic' => false],
                ['name' => 'Sydney, AU', 'domestic' => false],
                ['name' => 'Medan, Indonesia', 'domestic' => true],
                ['name' => 'Makassar, Indonesia', 'domestic' => true],
                ['name' => 'Balikpapan, Indonesia', 'domestic' => true],
            ],
            // Shipping modes shown depend on the destination type
            'modes' => [
                'international' => [
                    ['label' => 'By Ocean', 'icon' => 'ship'],
                    ['label' => 'By Air', 'icon' => 'plane'],
                ],
                'domestic' => [
                    ['label' => 'By Inland', 'icon' => 'truck'],
                    ['label' => 'By Ocean', 'icon' => 'ship'],
                    ['label' => 'By Air', 'icon' => 'plane'],
                ],
            ],
        ],
    ],

    'transport' => [
        'title' => 'Navigating Global Trade with Confidence',
        'description' => 'We are committed to navigating the complexities of global trade and regulatory requirements with accuracy and professionalism.',
        'cta' => ['label' => 'Our Services', 'route' => 'services'],
    ],

    'global' => [
        'eyebrow' => 'Member of JCTrans Global Logistics Network',
        'title' => 'Effortless Global Shipping',
        'description' => 'Connected to a world class alliance of more than 10,000 reliable agents across 200 countries, combined with our robust domestic infrastructure.',
        'image' => 'images/map.jpg',
        'image_alt' => 'Earth at night showing city lights',
        'points' => ['Global reach', 'Verified partnerships', 'Competitive pricing', 'Local expertise, global standards'],
        'nodes' => ['ship', 'plane', 'truck', 'warehouse', 'file-check', 'package', 'anchor', 'globe'],
    ],

    /* ------------------------------------------------------------------ */
    /* ABOUT                                                              */
    /* ------------------------------------------------------------------ */
    'about' => [
        'eyebrow' => 'About Us',
        'header_title' => 'About TAN Logistic',
        'title' => 'Representing Indonesia in International Trade and Logistics',
        'header_subtitle' => 'More than a decade of dependable, transparent and efficient logistics.',
        'image' => 'images/port.jpg',
        'image_alt' => 'Container ship docked at a port terminal',
        'image_secondary' => 'images/partnership.jpg',
        'image_secondary_alt' => 'Logistics professionals shaking hands in front of shipping containers',
        'badge_value' => '10+',
        'badge_text' => 'Years in logistics and customs',
        'paragraphs' => [
            'PT. Tetuko Anugerah Nusantara is a professionally established logistics service provider, representing Indonesia in international trade and logistics activities. With more than a decade of industry experience, we offer integrated one stop logistics services, including export and import operations by sea and by air, customs management, inland transportation and warehousing solutions.',
            'Supported by a highly competent professional team and a strong global network of international agents, we combine in depth local knowledge with internationally recognized standards. Through our dedication to operational excellence, we consistently deliver dependable, transparent and efficient logistics solutions, tailored to the specific needs of our partners worldwide.',
        ],
        'profile_title' => 'Read the full Company Profile',
        'profile_text' => 'Services, strategic advantages, clients, certifications and all six office addresses in one document.',
        'vision_eyebrow' => 'Our Vision',
        'vision_title' => 'Vision',
        'vision' => "To be Indonesia's most reliable and innovative logistics partner, seamlessly connecting domestic and global markets through excellence in service, technology driven solutions and sustainable growth.",
        'mission_eyebrow' => 'Our Mission',
        'mission_title' => 'Mission',
        'mission_intro' => 'To achieve our vision, we commit to:',
        'mission' => [
            ['icon' => 'award', 'title' => 'Excellence in Service', 'text' => 'Delivering superior and customized logistics solutions that exceed customer expectations through our 10+ years of industry expertise.'],
            ['icon' => 'cpu', 'title' => 'Technological Integration', 'text' => 'Adopting digital logistics management to provide real time transparency and operational efficiency for our clients.'],
            ['icon' => 'handshake', 'title' => 'Global and Local Synergy', 'text' => 'Strengthening our network of global agents and local infrastructure to ensure seamless end to end connectivity.'],
            ['icon' => 'scale', 'title' => 'Operational Compliance', 'text' => 'Maintaining the highest standards of integrity and compliance in customs and international trade regulations.'],
            ['icon' => 'leaf', 'title' => 'Sustainable Logistics', 'text' => 'Growing responsibly by optimizing transport routes and operational efficiency to contribute to a greener future.'],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* STRATEGIC ADVANTAGES (Workflow section)                            */
    /* ------------------------------------------------------------------ */
    'advantages' => [
        'eyebrow' => 'Why TAN Logistic',
        'title' => 'Our Strategic Advantages',
        'description' => 'Choosing PT. Tetuko Anugerah Nusantara means partnering with a team dedicated to your business success. Here is what sets us apart.',
        'items' => [
            [
                'number' => '#1',
                'title' => 'Decade of Expertise',
                'text' => 'With over 10 years of experience in the logistics and customs industry, we have the deep rooted knowledge to navigate complex supply chain challenges and provide reliable solutions.',
                'points' => [],
            ],
            [
                'number' => '#2',
                'title' => 'Comprehensive Global and Local Network',
                'text' => 'As a proud member of the JCTrans Global Logistics Network, we are connected to more than 10,000 reliable agents across 200 countries.',
                'points' => ['Global reach, door to door worldwide', 'Verified, pre vetted partners', 'Competitive direct freight rates', 'Local expertise, global standards'],
            ],
            [
                'number' => '#3',
                'title' => 'Integrated One Stop Service',
                'text' => 'From international freight forwarding and complex customs clearance to domestic trucking and warehousing, we handle the entire process under one roof.',
                'points' => [],
            ],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* SERVICES                                                           */
    /* ------------------------------------------------------------------ */
    'services_page' => [
        'eyebrow' => 'Our Services',
        'title' => 'Our Main Services',
        'header_subtitle' => 'Four service lines and one partner for your entire supply chain.',
        'image' => 'images/ocean.jpg',
        'process_eyebrow' => 'End to end management',
        'process_title' => 'From Pickup to Final Delivery',
        'process' => [
            ['icon' => 'package', 'title' => 'Cargo Pickup and Handling', 'text' => 'Secure collection from your designated location.'],
            ['icon' => 'clipboard', 'title' => 'Documentation and Compliance', 'text' => 'Precise preparation of all shipping and legal documents.'],
            ['icon' => 'route', 'title' => 'Carrier Coordination', 'text' => 'Seamless communication with major shipping lines and airlines.'],
            ['icon' => 'shield-check', 'title' => 'Customs and Delivery', 'text' => 'Customs formalities and final mile delivery for a safe, on time arrival.'],
        ],
    ],

    'services' => [
        [
            'id' => 'export-import',
            'icon' => 'ship',
            'title' => 'Export and Import Services',
            'subtitle' => 'Sea and Air Freight',
            'image' => 'images/ocean.jpg',
            'description' => 'We provide integrated export and import solutions tailored to your logistics requirements and delivery timelines. Whether you need cost effective ocean transport or time sensitive air freight, we make sure your cargo moves seamlessly across global borders.',
            'features' => [
                ['icon' => 'ship', 'title' => 'Ocean Freight', 'text' => 'Reliable Full Container Load (FCL) and Less than Container Load (LCL) services connecting major global ports.'],
                ['icon' => 'plane', 'title' => 'Air Freight', 'text' => 'Fast and efficient solutions for high priority, time sensitive shipments.'],
                ['icon' => 'route', 'title' => 'End to End Management', 'text' => 'Pickup and handling, documentation and compliance, carrier coordination, customs and final mile delivery.'],
            ],
        ],
        [
            'id' => 'customs',
            'icon' => 'file-check',
            'title' => 'Customs Management Services',
            'subtitle' => 'Customs Clearance',
            'image' => 'images/customs.jpg',
            'description' => 'Navigating the intricacies of international trade regulations requires a strategic approach. Our customs management goes beyond standard documentation: a holistic management system that moves your cargo through borders with maximum efficiency and full legal compliance.',
            'features' => [
                ['icon' => 'clipboard', 'title' => 'Customs Documentation', 'text' => 'Accurate preparation and processing of every export and import document.'],
                ['icon' => 'scale', 'title' => 'Full Legal Compliance', 'text' => 'Every shipment follows customs and international trade regulations.'],
                ['icon' => 'clock', 'title' => 'Efficient Clearance', 'text' => 'A strategic approach that keeps border time and costs to a minimum.'],
            ],
        ],
        [
            'id' => 'domestic',
            'icon' => 'truck',
            'title' => 'Domestic Freight Forwarding and Trucking',
            'subtitle' => 'Across the Indonesian Archipelago',
            'image' => 'images/land.jpg',
            'description' => 'Reliable and expansive domestic distribution across the Indonesian archipelago. Our domestic services bridge the gap between islands and cities, delivering your goods efficiently through an integrated multimodal network.',
            'features' => [
                ['icon' => 'truck', 'title' => 'Land Transportation', 'text' => 'A diverse fleet from small vans to heavy duty CDD, Fuso, wingbox and trailer trucks for point to point inland distribution.'],
                ['icon' => 'anchor', 'title' => 'Inter Island Freight', 'text' => 'Door to door or port to port delivery using sea freight (LCL or FCL) and domestic air freight.'],
                ['icon' => 'container', 'title' => 'Project Cargo', 'text' => 'Specialized handling for oversized or heavy equipment that needs specific transport planning.'],
                ['icon' => 'activity', 'title' => 'Real Time Monitoring', 'text' => 'Updates on your shipment\'s journey for peace of mind and on time arrival.'],
            ],
        ],
        [
            'id' => 'warehousing',
            'icon' => 'warehouse',
            'title' => 'Warehousing and Distribution Management',
            'subtitle' => 'Storage and Distribution',
            'image' => 'images/warehouse.jpg',
            'description' => 'Our warehousing is a strategic part of your supply chain, not just storage. Secure, scalable and well managed facilities keep your inventory preserved and ready for distribution whenever your business demands.',
            'features' => [
                ['icon' => 'lock', 'title' => 'Secure Storage Facilities', 'text' => '24/7 security and professional handling to protect the safety and integrity of your goods.'],
                ['icon' => 'chart', 'title' => 'Inventory Management', 'text' => 'Systematic recording and monitoring of stock levels for accuracy and real time visibility.'],
                ['icon' => 'container', 'title' => 'Stuffing and Stripping', 'text' => 'Professional loading and unloading of containers for efficient cargo handling.'],
                ['icon' => 'arrows', 'title' => 'Cross Docking and Distribution', 'text' => 'Goods move directly from receiving to shipping, cutting storage time and speeding up your time to market.'],
            ],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* CLIENTS AND CERTIFICATIONS                                         */
    /* ------------------------------------------------------------------ */
    'clients_section' => [
        'eyebrow' => 'Our Customers',
        'header_title' => 'Our Clients',
        'title' => 'Trusted by Leading Companies',
        'description' => 'National and multinational companies across many industries rely on TAN Logistic to move their goods.',
        'header_subtitle' => 'The logistics partner for national and multinational companies.',
        'image' => 'images/partnership.jpg',
        'home_limit' => 12,
    ],

    // Logos in public/images/clients/. When a logo file is missing, the name is shown as text.
    'clients' => [
        ['name' => 'CGV', 'logo' => 'images/clients/cgv.png'],
        ['name' => 'PT Fumakilla Indonesia', 'logo' => 'images/clients/fumakilla.png'],
        ['name' => 'Patra Jasa', 'logo' => 'images/clients/patra-jasa.png'],
        ['name' => 'Skyworth', 'logo' => 'images/clients/skyworth.png'],
        ['name' => 'Georg Fischer', 'logo' => 'images/clients/georg-fischer.png'],
        ['name' => 'Lasallefood Indonesia', 'logo' => 'images/clients/lasallefood.png'],
        ['name' => 'Berca', 'logo' => 'images/clients/berca.png'],
        ['name' => 'Carrier', 'logo' => 'images/clients/carrier.png'],
        ['name' => 'SCHOTT', 'logo' => 'images/clients/schott.png'],
        ['name' => 'Yahata Japan', 'logo' => 'images/clients/yahata.png'],
        ['name' => 'Yupi', 'logo' => 'images/clients/yupi.png'],
        ['name' => 'Yamazen', 'logo' => 'images/clients/yamazen.png'],
        ['name' => 'Vistachem', 'logo' => 'images/clients/vistachem.png'],
        ['name' => 'Kay Collection', 'logo' => 'images/clients/kay-collection.png'],
        ['name' => 'Yamaha', 'logo' => 'images/clients/yamaha.png'],
        ['name' => 'Papertech', 'logo' => 'images/clients/papertech.png'],
        ['name' => 'SMS group', 'logo' => 'images/clients/sms-group.png'],
        ['name' => 'PT. Cosmetic Mirror Indonesia', 'logo' => 'images/clients/cosmetic-mirror.png'],
    ],

    // 'images' are shown side by side on each card (files in public/images/certifications)
    'certifications' => [
        [
            'icon' => 'badge-check',
            'title' => 'ISO 9001:2015',
            'text' => 'Quality Management System, certified by CQM Registrar',
            'images' => ['images/certifications/iso-9001-cqm.png', 'images/certifications/iso.png', 'images/certifications/cqm-registrar.png'],
        ],
        [
            'icon' => 'network',
            'title' => 'JCTrans Premium Member',
            'text' => 'Member ID 150870 · Global Logistics Network with 10,000+ agents in 200 countries',
            'images' => ['images/certifications/jctrans.png'],
        ],
    ],

    // Badge row in the footer (and wherever partials.badges is included)
    'badges' => [
        ['image' => 'images/certifications/cqm-registrar.png', 'alt' => 'CQM Registrar, Comprehensive Quality Management'],
        ['image' => 'images/certifications/iso.png', 'alt' => 'ISO'],
        ['image' => 'images/certifications/iso-9001-cqm.png', 'alt' => 'ISO 9001:2015 Certified by CQM Registrar'],
        ['image' => 'images/certifications/jctrans.png', 'alt' => 'JCTrans Premium Membership, ID 150870'],
    ],

    /* ------------------------------------------------------------------ */
    /* FAQ                                                                */
    /* ------------------------------------------------------------------ */
    'faq' => [
        'eyebrow' => 'FAQ',
        'title' => 'Frequently Asked Questions',
        'description' => 'Can\'t find what you\'re looking for? Our team is happy to help.',
        'items' => [
            [
                'question' => 'What services does TAN Logistic provide?',
                'answer' => 'TAN Logistic (PT. Tetuko Anugerah Nusantara) provides integrated one stop logistics: export and import by sea (FCL and LCL) and by air, customs management, domestic freight forwarding and trucking, inter island freight, project cargo, and warehousing and distribution management.',
            ],
            [
                'question' => 'Do you handle international exports and imports?',
                'answer' => 'Yes. As a member of the JCTrans Global Logistics Network, we work with more than 10,000 reliable agents in 200 countries. We take care of cargo pickup, documentation and compliance, carrier coordination, customs and final mile delivery.',
            ],
            [
                'question' => 'How can I track my shipment?',
                'answer' => 'We provide real time monitoring and keep you updated on your shipment\'s journey. You can also reach our team anytime by email or phone with your shipment reference number.',
            ],
            [
                'question' => 'Do you offer warehousing?',
                'answer' => 'Yes. Our warehousing and distribution management includes secure storage with 24/7 security, inventory management with real time visibility, container stuffing and stripping, and cross docking and distribution.',
            ],
            [
                'question' => 'Where are TAN Logistic offices located?',
                'answer' => 'Our head office is in Bekasi, with branch offices in Surabaya, Semarang, Pekalongan, Batang (KEK Industropolis Batang) and Yogyakarta.',
            ],
            [
                'question' => 'Is TAN Logistic ISO certified?',
                'answer' => 'Yes. We are ISO 9001:2015 certified by CQM Registrar for quality management.',
            ],
            [
                'question' => 'Is TAN Logistic a member of any logistics associations or networks?',
                'answer' => 'Yes, TAN Logistic is a JCtrans Premium Member with Membership ID 150870.',
            ],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /* CONTACT                                                            */
    /* ------------------------------------------------------------------ */
    'contact' => [
        'eyebrow' => 'Contact Us',
        'header_title' => 'Contact Us',
        'title' => 'Let\'s Talk About Your Logistics Needs',
        'header_subtitle' => 'Our team is ready to help from six offices across Indonesia.',
        'image' => 'images/land.jpg',
        'form' => [
            'name' => 'Full Name',
            'name_placeholder' => 'Your name',
            'company' => 'Company',
            'company_placeholder' => 'Company name',
            'email' => 'Email',
            'email_placeholder' => 'you@company.com',
            'phone' => 'Phone or WhatsApp',
            'phone_placeholder' => '+62 812 3456 7890',
            'service' => 'Service',
            'service_placeholder' => 'Choose a service',
            'service_other' => 'Other',
            'message' => 'Message',
            'message_placeholder' => 'Tell us about your shipment: origin, destination, type and volume of cargo.',
            'submit' => 'Send via Email',
            'submit_whatsapp' => 'Send via WhatsApp',
            'note' => 'This opens your email app with the message ready to send to info@tanlogistic.com.',
            'sent' => 'Your email app should now be open. If it didn\'t open, write to us directly at',
            // Email template built by the form (resources/js/app.js)
            'mail_subject' => 'Website enquiry',
            'mail_labels' => ['name' => 'Name', 'company' => 'Company', 'email' => 'Email', 'phone' => 'Phone', 'service' => 'Service'],
            // Used when arriving from the route card on the home page
            'prefill' => ['route' => 'Route', 'to' => 'to', 'mode' => 'Mode'],
        ],
        'direct_title' => 'Get in Touch',
        'email_label' => 'Email',
        'phone_label' => 'Head Office Phone',
        'website_label' => 'Website',
        'whatsapp_label' => 'WhatsApp',
        'wechat_label' => 'WeChat ID',
        'copy' => 'Copy',
        'copied' => 'Copied',
        'whatsapp_cta' => 'Chat on WhatsApp',
        'offices_eyebrow' => 'Six Locations',
        'offices_title' => 'Our Offices',
    ],

    'offices' => [
        [
            'name' => 'Head Office',
            'city' => 'Bekasi',
            'region' => 'Jawa Barat',
            'address' => 'Jl. Villa Tengah Blok G No.15, RT008/RW 002, Pekayon Jaya, Bekasi Selatan, Bekasi, Jawa Barat, 17148',
            'postal_code' => '17148',
            'phone' => '+62 21 3831 7340',
            'head' => true,
        ],
        [
            'name' => 'Surabaya Office',
            'city' => 'Surabaya',
            'region' => 'Jawa Timur',
            'address' => 'Graha Delta Building (New), 3rd Floor No. B.304, Jl. Tanjung Sadari No. 2, Surabaya',
            'postal_code' => null,
            'phone' => '+62 31 350 3189',
            'head' => false,
        ],
        [
            'name' => 'Semarang Office',
            'city' => 'Semarang',
            'region' => 'Jawa Tengah',
            'address' => 'Taman Oleander Blok B5 No. 26, Perumahan Graha Padma, Semarang Barat, Kota Semarang, Jawa Tengah 50149',
            'postal_code' => '50149',
            'phone' => '+62 21 3831 7340',
            'head' => false,
        ],
        [
            'name' => 'Pekalongan Office',
            'city' => 'Pekalongan',
            'region' => 'Jawa Tengah',
            'address' => 'Jl. Sulawesi No. 38, Pekalongan 51113',
            'postal_code' => '51113',
            'phone' => '+62 21 3831 7340',
            'head' => false,
        ],
        [
            'name' => 'Batang Office',
            'city' => 'Batang',
            'region' => 'Jawa Tengah',
            'address' => 'Gedung Pengelola Lantai 5, PT Kawasan Ekonomi Khusus (KEK) Industropolis Batang, Jl. Tol Semarang Batang KM 371+800, Ketanggan, Gringsing, Kabupaten Batang, Jawa Tengah',
            'postal_code' => null,
            'phone' => '+62 21 3831 7340',
            'head' => false,
        ],
        [
            'name' => 'Yogyakarta Office',
            'city' => 'Bantul',
            'region' => 'Daerah Istimewa Yogyakarta',
            'address' => 'Mantup, Baturetno, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55197',
            'postal_code' => '55197',
            'phone' => '+62 21 3831 7340',
            'head' => false,
        ],
    ],

    'cta' => [
        'title' => 'Have a Shipment in Mind?',
        'text' => 'Tell us about your plans and our team will put together the most efficient solution.',
        'button' => 'Contact Us',
    ],

];
