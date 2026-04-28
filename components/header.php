<!doctype html>
<html lang="<?= $currentLang ?>-<?= strtoupper($currentLang) ?>" class="min-h-full scroll-smooth">
<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link
      rel="icon"
      type="image/png"
      href="/assets/img/favicon-96x96.png"
      sizes="96x96"
    />
    <link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="/assets/img/apple-touch-icon.png"
    />
    <link rel="manifest" href="/assets/misc/manifest.webmanifest" />
    <link rel="canonical" href="https://yoursite.com/uk/" />
    <link rel="alternate" hreflang="pl" href="https://yoursite.com/" />
    <link rel="alternate" hreflang="en" href="https://yoursite.com/en/" />
    <link rel="alternate" hreflang="uk" href="https://yoursite.com/uk/" />
    <link rel="alternate" hreflang="ru" href="https://yoursite.com/ru/" />
    <link rel="alternate" hreflang="x-default" href="https://yoursite.com/" />
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Салон Краси Варшава | Манікюр, педикюр і нігтьовий сервіс",
        "url": "https://yoursite.com",
        "description": "Наш Салон — салон краси у Варшаві, район Охота: манікюр, гібридний манікюр, педикюр, дизайн нігтів і ламінування брів з преміальним сервісом.",
        "inLanguage": ["pl", "en", "uk", "ru"],
        "publisher": {
          "@type": "Organization",
          "name": "Салон Краси Варшава | Манікюр, педикюр і нігтьовий сервіс",
          "logo": {
            "@type": "ImageObject",
            "url": "https://yoursite.com/Salon-logo-w220.svg"
          },
          "sameAs": [
            "https://www.instagram.com/Salon.warsaw",
            "https://www.facebook.com/share/18dnZPTrj1/?mibextid=wwXIfr",
            "https://t.me/Salon_warsaw",
            "https://api.whatsapp.com/send/?phone=48690647476&type=phone_number&app_absent=0",
            "viber://chat?number=48690647476"
          ]
        }
      }
    </script>
    <title><?= htmlspecialchars($seo["title"] ?? tr("seo_title", "Салон Краси Варшава | Манікюр, педикюр і нігтьовий сервіс")) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo["description"] ?? tr("seo_desc", "Наш Салон — салон краси у Варшаві")) ?>" />
    <meta property="og:url" content="https://yoursite.com/uk/" />
    <meta property="og:type" content="website" />
    <meta
      property="og:title"
      content="Салон Краси Варшава | Манікюр, педикюр і нігтьовий сервіс"
    />
    <meta
      property="og:description"
      content="Наш Салон — салон краси у Варшаві, район Охота: манікюр, гібридний манікюр, педикюр, дизайн нігтів і ламінування брів з преміальним сервісом."
    />
    <meta property="og:image" content="<?= htmlspecialchars($seo["og_image"] ?? "/og-Salon-image.jpg") ?>" />
    <meta property="og:site_name" content="Salon" />
    <meta property="og:locale" content="uk-UA" />
    <meta property="og:locale:alternate" content="pl-PL" />
    <meta property="og:locale:alternate" content="en-US" />
    <meta property="og:locale:alternate" content="ru-RU" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="Салон Краси Варшава | Манікюр, педикюр і нігтьовий сервіс"
    />
    <meta
      name="twitter:description"
      content="Наш Салон — салон краси у Варшаві, район Охота: манікюр, гібридний манікюр, педикюр, дизайн нігтів і ламінування брів з преміальним сервісом."
    />
    <meta name="twitter:image" content="/og-Salon-image.jpg" />
    
    
    
    
    
    <style>
      :root {
        --font-inter: "Inter", sans-serif;
        --font-gropled: "Inter", sans-serif;
      }
    </style>
    <link rel="stylesheet" href="/assets/css/photoswipe.DZU1WGtr.css" />
    <link rel="stylesheet" href="/assets/css/Layout.B5b12vDo.css" />
    <link rel="stylesheet" href="/assets/css/theme.css" />
    <style>
      salon-island,
      salon-slot,
      salon-static-slot {
        display: contents;
      }
    </style>
  
</head>
<body class="bg-shell-50 text-black-900 grid min-h-dvh min-w-90 grid-rows-[auto_1fr_auto] overflow-x-hidden font-sans" data-current-locale="<?= $currentLang ?>">
    <header class="theme-header">
      <div class="container">
        <div class="flex items-center justify-between">
          <div class="order-first lg:order-none lg:w-87.5 flex items-center">
            <img
              src="/assets/img/logo-w220.BCjd-2Q9_Z1SQT8.svg"
              alt="Salon Logo"
              loading="lazy"
              decoding="async"
              width="220"
              height="61"
              class="hidden h-auto w-45 sm:inline-flex xl:w-55"
            />
            <img
              src="/assets/img/square-w96.DCoLLcl9_Z2nQbFQ.svg"
              alt="Salon Logo"
              loading="lazy"
              decoding="async"
              width="96"
              height="96"
              class="aspect-square w-20 sm:hidden"
            />
          </div>
          <nav class="hidden lg:flex lg:grow lg:justify-center">
            <ul class="hidden items-center gap-8 font-medium lg:flex">
              <li>
                <a
                  class="text-black-900 hover:text-black-600 transition-[color] duration-200"
                  href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>#services"
                >
                  Послуги
                </a>
              </li>
              <li>
                <a
                  class="text-black-900 hover:text-black-600 transition-[color] duration-200"
                  href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>#aboutUs"
                >
                  Про нас
                </a>
              </li>
              <li>
                <a
                  class="text-black-900 hover:text-black-600 transition-[color] duration-200"
                  href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>jobs/"
                >
                  Вакансії
                </a>
              </li>
            </ul>
          </nav>
          <div class="order-last lg:hidden">
            <div
              class="starwind-dropdown relative"
              data-close-delay="200"
              data-slot="dropdown"
            >
              <div
                class="starwind-dropdown-trigger"
                data-slot="dropdown-trigger"
                data-as-child
              >
                <button
                  class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 hover:bg-foreground/10 hover:text-foreground focus-visible:outline-outline bg-transparent size-11"
                  data-slot="button"
                  aria-label="Toggle Lang Menu"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                    class="lucide lucide-menu"
                  >
                    <path d="M4 5h16"></path>
                    <path d="M4 12h16"></path>
                    <path d="M4 19h16"></path>
                  </svg>
                </button>
              </div>
              <ul
                class="starwind-dropdown-content bg-popover text-popover-foreground z-50 min-w-[9rem] overflow-x-hidden overflow-y-auto rounded-md border p-1 shadow-md data-[state=open]:animate-in fade-in zoom-in-95 data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards fade-out zoom-out-95 absolute will-change-transform slide-in-from-top-2 slide-out-to-top-2 top-full slide-in-from-right-1 slide-out-to-right-1 right-0"
                role="menu"
                data-side="bottom"
                data-align="end"
                data-state="closed"
                tabindex="-1"
                aria-orientation="vertical"
                style="
                  display: none;
                  animation-duration: 150ms;
                  margin-top: 4px;
                "
                data-slot="dropdown-content"
              >
                <li
                  class="focus:bg-accent focus:text-accent-foreground relative flex items-center gap-2 rounded-sm transition-colors outline-none select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 group/dropdown-item [&#38;>svg]:size-4 [&#38;>svg]:shrink-0 cursor-pointer p-0 text-sm font-medium"
                  role="menuitem"
                  tabindex="0"
                  data-slot="dropdown-item"
                >
                  <a
                    class="flex w-full p-1.5"
                    href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>#services"
                    title="Послуги"
                  >
                    Послуги
                  </a>
                </li>
                <li
                  class="focus:bg-accent focus:text-accent-foreground relative flex items-center gap-2 rounded-sm transition-colors outline-none select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 group/dropdown-item [&#38;>svg]:size-4 [&#38;>svg]:shrink-0 cursor-pointer p-0 text-sm font-medium"
                  role="menuitem"
                  tabindex="0"
                  data-slot="dropdown-item"
                >
                  <a
                    class="flex w-full p-1.5"
                    href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>#aboutUs"
                    title="Про нас"
                  >
                    Про нас
                  </a>
                </li>
                <li
                  class="focus:bg-accent focus:text-accent-foreground relative flex items-center gap-2 rounded-sm transition-colors outline-none select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 group/dropdown-item [&#38;>svg]:size-4 [&#38;>svg]:shrink-0 cursor-pointer p-0 text-sm font-medium"
                  role="menuitem"
                  tabindex="0"
                  data-slot="dropdown-item"
                >
                  <a
                    class="flex w-full p-1.5"
                    href="/<?= $currentLang === $defaultLang ? '' : $currentLang . '/' ?>jobs/"
                    title="Вакансії"
                  >
                    Вакансії
                  </a>
                </li>
              </ul>
            </div>
            <script
              type="module"
              src="/assets/js/Dropdown.js"
            ></script>
          </div>
          <!-- Logo moved to the top -->
          <div class="contents items-center justify-end md:w-87.5 lg:flex gap-4">
            <a
              class="theme-btn md:hidden"
              data-slot="button"
              href="https://booksy.com/pl-pl/dl/show-business/296324"
              target="_blank"
              rel="noopener"
            >
              <span class="sr-only"><?= tr("book_btn", "Записатись") ?></span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
                class="lucide lucide-calendar"
              >
                <path d="M8 2v4"></path>
                <path d="M16 2v4"></path>
                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                <path d="M3 10h18"></path>
              </svg>
            </a>
            <a
              class="theme-btn hidden md:inline-flex"
              data-slot="button"
              href="https://booksy.com/pl-pl/dl/show-business/296324"
              target="_blank"
              rel="noopener"
            >
              <span><?= tr("book_btn", "Записатись") ?></span>
            </a>
            
<?php
            $flags = [
                'pl' => '<svg viewBox="0 0 64 64" width="20" height="20" class="rounded-full shadow-sm"><path fill="#fff" d="M0 0h64v32H0z"/><path fill="#dc143c" d="M0 32h64v32H0z"/></svg>',
                'en' => '<svg viewBox="0 0 64 64" width="20" height="20" class="rounded-full shadow-sm"><path fill="#012169" d="M0 0h64v64H0z"/><path fill="#FFF" d="M0 0l64 64M64 0L0 64" stroke="#FFF" stroke-width="14"/><path fill="#C8102E" d="M0 0l64 64M64 0L0 64" stroke="#C8102E" stroke-width="6"/><path fill="#FFF" d="M25 0h14v64H25zM0 25h64v14H0z"/><path fill="#C8102E" d="M28 0h8v64h-8zM0 28h64v8H0z"/></svg>',
                'ru' => '<svg viewBox="0 0 64 64" width="20" height="20" class="rounded-full shadow-sm"><path fill="#fff" d="M0 0h64v21.3H0z"/><path fill="#0039a6" d="M0 21.3h64v21.3H0z"/><path fill="#d52b1e" d="M0 42.6h64v21.4H0z"/></svg>',
                'uk' => '<svg viewBox="0 0 64 64" width="20" height="20" class="rounded-full shadow-sm"><path fill="#0057b7" d="M0 0h64v32H0z"/><path fill="#ffd700" d="M0 32h64v32H0z"/></svg>',
                'cs' => '<svg viewBox="0 0 64 64" width="20" height="20" class="rounded-full shadow-sm"><path fill="#fff" d="M0 0h64v32H0z"/><path fill="#d7141a" d="M0 32h64v32H0z"/><path fill="#11457e" d="M0 0l32 32L0 64z"/></svg>',
            ];
            $fallbackFlag = '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>';
            ?>
            <div
              class="starwind-dropdown relative"
              data-close-delay="200"
              data-slot="dropdown"
            >
              <div
                class="starwind-dropdown-trigger"
                data-slot="dropdown-trigger"
                data-as-child
              >
                <button
                  class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 hover:bg-foreground/10 hover:text-foreground focus-visible:outline-outline bg-transparent size-11"
                  data-slot="button"
                  aria-label="Toggle Lang Menu"
                >
                  <?= $flags[$currentLang] ?? $fallbackFlag ?>
                </button>
              </div>
              <ul
                class="starwind-dropdown-content bg-popover text-popover-foreground z-50 min-w-[9rem] overflow-x-hidden overflow-y-auto rounded-md border p-1 shadow-md data-[state=open]:animate-in fade-in zoom-in-95 data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards fade-out zoom-out-95 absolute will-change-transform slide-in-from-top-2 slide-out-to-top-2 top-full slide-in-from-right-1 slide-out-to-right-1 right-0"
                role="menu"
                data-side="bottom"
                data-align="end"
                data-state="closed"
                tabindex="-1"
                aria-orientation="vertical"
                style="
                  display: none;
                  animation-duration: 150ms;
                  margin-top: 4px;
                "
                data-slot="dropdown-content"
              >
                <?php foreach ($langs as $l): 
                    $code = $l['code'];
                    $name = $l['name'] ?? strtoupper($code);
                    $url = $code === $defaultLang ? '/' : '/' . $code . '/';
                ?>
                <li
                  class="focus:bg-accent focus:text-accent-foreground relative flex items-center gap-2 rounded-sm transition-colors outline-none select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 group/dropdown-item cursor-pointer p-0 text-sm font-medium"
                  role="menuitem"
                  tabindex="0"
                  data-slot="dropdown-item"
                >
                  <a class="flex w-full items-center gap-2 p-2 hover:bg-black-100 rounded-md transition-colors" href="<?= $url ?>" title="<?= htmlspecialchars($name) ?>">
                    <?= $flags[$code] ?? $fallbackFlag ?>
                    <span><?= htmlspecialchars($name) ?></span>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
              class="lucide lucide-minus text-black-900 rotate-90 opacity-25 lg:hidden"
            >
              <path d="M5 12h14"></path>
            </svg>
          </div>
        </div>
      </div>
    </header>