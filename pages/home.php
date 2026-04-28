<?php
// pages/home.php
?>
<main class="pb-20">
      <div class="container">
        <div class="grid gap-8" data-first-screen>
          <div
            class="px-6 py-10 md:p-12 rounded-[2rem] grid content-start justify-items-start gap-8 sm:col-span-2 lg:col-span-1 lg:row-span-2 relative isolate overflow-hidden"
            style="grid-area: intro; background: var(--theme-bg-secondary); border: 1px solid rgba(17, 94, 65, 0.05);"
          >
            <div class="grid gap-3">
              <h1
                class="font-heading text-3xl text-balance md:text-4xl lg:text-5xl"
              >
                <?= tr('hero_title', 'У Salon ми втілюємо не лише мрії, а й стильні фантазії!') ?>
              </h1>
              <p class="text-lg">
                <?= tr('hero_desc', 'Професійний манікюр і педикюр, гібридний манікюр, моделювання нігтів та догляд за бровами у Варшаві - все, щоб ви почувалися впевнено та особливо. Наші фахівці подбають про кожну деталь, а ви можете просто... бути собою.') ?>
              </p>
            </div>
            <a
              class="theme-btn text-lg w-full md:w-auto"
              data-slot="button"
              href="https://booksy.com/pl-pl/dl/show-business/296324"
              target="_blank"
              rel="noopener"
            >
              <?= tr("hero_button", "Забронювати час") ?>
            </a>
            <small class="text-black-500 text-xs font-medium"
              ><?= tr("hero_small_text", "Salon - краса починається саме тут. Запишіться на прийом сьогодні!") ?></small
            >
            <div
              id="rotatedStar"
              class="pointer-events-none absolute -right-17.5 -bottom-17.5 z-[-1] inline-flex size-50 lg:-right-30 lg:-bottom-30 lg:size-75"
            ></div>
          </div>
          <script
            type="module"
            src="/assets/js/FirstScreenIntro.js"
          ></script>
          <div
            class="starwind-carousel group/carousel relative flex min-w-0 flex-col gap-4"
            role="region"
            aria-roledescription="carousel"
            data-slot="carousel"
            data-axis="x"
            data-opts="{&#34;align&#34;:&#34;start&#34;,&#34;loop&#34;:true}"
            data-auto-init="true"
            data-slider="hero-slider"
            style="grid-area: slider"
          >
            <div class="overflow-hidden grow" data-slot="carousel-content">
              <div
                class="flex group-data-[axis=y]/carousel:flex-col group-data-[axis=x]/carousel:-ml-4 group-data-[axis=y]/carousel:-mt-4 lg:h-full"
                data-slot="carousel-container"
              >
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-01.BLjGY7Tt.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-01.BLjGY7Tt_1ggL5J.webp"
                      alt="Фото результату 1"
                      fetchpriority="high"
                      loading="eager"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-02.B6QS6ABQ.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-02.B6QS6ABQ_NaqWT.webp"
                      alt="Фото результату 2"
                      fetchpriority="high"
                      loading="eager"
                      data-slot="image"
                      decoding="async"
                      width="833"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-03.uxZQsQSE.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-03.uxZQsQSE_Z1f55u.webp"
                      alt="Фото результату 3"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-04.DIgV1dWw.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-04.DIgV1dWw_1CSoJW.webp"
                      alt="Фото результату 4"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-05.DK2cK-Is.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-05.DK2cK-Is_1Tm2o4.webp"
                      alt="Фото результату 5"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-06.BHFJqsXQ.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-06.BHFJqsXQ_2ggQVj.webp"
                      alt="Фото результату 6"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="1250"
                      height="834"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-07.CI7nJox7.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-07.CI7nJox7_ZH3xHp.webp"
                      alt="Фото результату 7"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-08.r1yclwGx.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-08.r1yclwGx_ZKRrAg.webp"
                      alt="Фото результату 8"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-09.B6vK9DYb.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-09.B6vK9DYb_ZWa1pX.webp"
                      alt="Фото результату 9"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-10.CCWLUVQQ.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-10.CCWLUVQQ_ZB6MGz.webp"
                      alt="Фото результату 10"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-11.BCUSUzih.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-11.BCUSUzih_ZMSBoh.webp"
                      alt="Фото результату 11"
                      fetchpriority="auto"
                      loading="lazy"
                      data-slot="image"
                      decoding="async"
                      width="834"
                      height="1250"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
                <div
                  role="group"
                  aria-roledescription="slide"
                  data-slot="carousel-item"
                  class="min-w-0 shrink-0 grow-0 group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 basis-full"
                >
                  <a
                    class="inline-flex aspect-square w-full overflow-hidden theme-hero-img-wrapper lg:h-full"
                    href="/assets/img/slider-image-12.D91Ql-NB.webp"
                    data-fancybox="gallery" 
                    
                    target="_blank"
                  >
                    <img
                      src="/assets/img/slider-image-12.D91Ql-NB_2d7X3R.webp"
                      alt="Фото результату 12"
                      fetchpriority="high"
                      loading="eager"
                      data-slot="image"
                      decoding="async"
                      width="1250"
                      height="834"
                      class="starwind-image size-full object-cover object-center"
                    />
                  </a>
                </div>
              </div>
            </div>
            <div
              class="pointer-events-none absolute top-1/2 left-0 right-0 z-10 flex -translate-y-1/2 items-center justify-between px-4 sm:px-6"
            >
              <button
                class="pointer-events-auto starwind-carousel-previous flex size-12 items-center justify-center rounded-full bg-white text-black shadow-md transition-transform hover:scale-110"
                data-slot="carousel-previous"
                aria-label="Previous slide"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                <span class="sr-only">Previous slide</span>
              </button>
              <button
                class="pointer-events-auto starwind-carousel-next flex size-12 items-center justify-center rounded-full bg-white text-black shadow-md transition-transform hover:scale-110"
                data-slot="carousel-next"
                aria-label="Next slide"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="lucide lucide-arrow-right"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                <span class="sr-only">Next slide</span>
              </button>
            </div>
          </div>
          <script
            type="module"
            src="/assets/js/Carousel.js"
          ></script>
          <script
            type="module"
            src="/assets/js/FirstScreenSlider.js"
          ></script>
          <div
            id="aboutUs"
            class="theme-card space-y-4"
            style="grid-area: aboutus"
          >
            <h2 class="font-heading text-4xl text-balance lg:text-5xl"><?= tr("about_title", "Трохи про нас") ?></h2>
            <p class="text-base md:text-lg">
              <?= tr("about_text_1", "Наша студія — це більше, ніж просто місце для косметичних послуг у Варшаві. Це простір, де мистецтво зустрічається з пристрастю. Ми створюємо манікюр, дизайн нігтів і педикюр, а також дбаємо про брови та повний beauty-образ. Наші досвідчені професіонали використовують високоякісні продукти та сучасні інновації у сфері краси.") ?>
            </p>
            <p class="text-base md:text-lg">
              <?= tr("about_text_2", "Залишайтеся на зв&#39;язку з нами в соціальних мережах! Слідкуйте за нами, щоб отримувати останні оновлення, спеціальні пропозиції та натхнення. Дізнайтеся про закулісні моменти та подивіться, чому наші клієнти нас люблять. Приєднуйтесь до нашої зростаючої спільноти сьогодні!") ?>
            </p>
            <p class="text-base md:text-lg">
              <a
                class="text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline"
                href="https://www.instagram.com/Salon.warsaw"
                rel="noopener"
                target="_blank"
              >
                <span> <?= tr("about_ig_link", "Підпишіться на наш Instagram") ?> </span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  class="lucide lucide-external-link"
                >
                  <path d="M15 3h6v6"></path>
                  <path d="M10 14 21 3"></path>
                  <path
                    d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"
                  ></path>
                </svg>
              </a>
            </p>
            <hr />
            <p class="text-base md:text-lg"><?= tr("about_socials_title", "Інші наші соціальні мережі:") ?></p>
            <ul class="custom-list flex flex-wrap items-center gap-6">
              <li>
                <a
                  href="https://www.facebook.com/share/18dnZPTrj1/?mibextid=wwXIfr"
                  class="text-black-900 cursor-pointer font-bold underline transition-[color] duration-200 hover:no-underline"
                  target="_blank"
                  rel="noopener"
                >
                  Facebook
                </a>
              </li>
              <li>
                <a
                  href="https://t.me/Salon_warsaw"
                  class="text-black-900 cursor-pointer font-bold underline transition-[color] duration-200 hover:no-underline"
                  target="_blank"
                  rel="noopener"
                >
                  Telegram
                </a>
              </li>
              <li>
                <a
                  href="https://api.whatsapp.com/send/?phone=48690647476&type=phone_number&app_absent=0"
                  class="text-black-900 cursor-pointer font-bold underline transition-[color] duration-200 hover:no-underline"
                  target="_blank"
                  rel="noopener"
                  >Whatsapp</a
                >
              </li>
              <li>
                <a
                  href="viber://chat?number=48690647476"
                  class="text-black-900 cursor-pointer font-bold underline transition-[color] duration-200 hover:no-underline"
                  target="_blank"
                  rel="noopener"
                  >Viber</a
                >
              </li>
            </ul>
          </div>
          <div
            class="theme-card space-y-4"
            style="grid-area: reviews"
          >
            <strong class="font-heading mb-3 flex text-3xl lg:text-4xl">
              <?= tr("reviews_title", "Щось пішло не за планом? Ми все виправимо!") ?>
            </strong>
            <p class="text-base lg:text-lg">
              <?= tr("reviews_text", "У нашому салоні ваше задоволення є нашим головним пріоритетом. Наші кваліфіковані фахівці використовують лише преміальні продукти та дотримуються найвищих стандартів, щоб щоразу забезпечувати виняткові результати.") ?>
            </p>
            <hr />
            <a
              target="_blank"
              class="text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline"
              href="https://maps.app.goo.gl/MNJ9LVHxZKGLBDd86?g_st=com.google.maps.preview.copy"
              rel="noopener noreferrer"
            >
              <span> <?= tr("reviews_link", "Перегляньте наші останні відгуки") ?> </span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
                class="lucide lucide-external-link"
              >
                <path d="M15 3h6v6"></path>
                <path d="M10 14 21 3"></path>
                <path
                  d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"
                ></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <section class="pt-12">
        <div class="container">
          <div class="grid gap-4">
            <h2 class="font-heading text-4xl text-balance lg:text-5xl"><?= tr("gallery_title", "Галерея наших робіт") ?></h2>
            <p class="max-w-4xl text-lg">
              <?= tr("gallery_text_1", "Від тонких вдосконалень до сміливих фірмових образів, наше портфоліо демонструє широту нашого ремесла: дбайливий стиль, майстерність кольору та всебічний догляд за зовнішністю, який підкреслює унікальну красу та впевненість кожного клієнта.") ?>
            </p>
            <p class="max-w-4xl text-lg">
              <?= tr("gallery_text_2", "Хочете більше? <a class=\"text-black-900 inline-flex cursor-pointer items-center gap-1 font-semibold underline hover:no-underline\" href=\"https://www.instagram.com/Salon.warsaw\" target=\"_blank\" rel=\"noopener\"><span>Перегляньте наш Instagram</span><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" aria-hidden=\"true\" class=\"lucide lucide-external-link\"><path d=\"M15 3h6v6\"></path><path d=\"M10 14 21 3\"></path><path d=\"M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6\"></path></svg></a>, щоб побачити останні оновлення, прев’ю та трансформації клієнтів.") ?>
            </p>
          </div>
        </div>
        <div
          class="starwind-carousel group/carousel relative mt-6 flex w-dvw min-w-0 flex-col gap-4"
          role="region"
          aria-roledescription="carousel"
          data-slot="carousel"
          data-axis="x"
          data-opts="{&#34;align&#34;:&#34;start&#34;}"
          data-auto-init="false"
          id="carousel-autoplay"
        >
          <div class="overflow-hidden grow" data-slot="carousel-content">
            <div
              class="flex group-data-[axis=y]/carousel:flex-col group-data-[axis=x]/carousel:-ml-4 group-data-[axis=y]/carousel:-mt-4"
              data-slot="carousel-container"
            >
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-1.BWNU52GE.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-1.BWNU52GE_Z1qlEN2.webp"
                    alt="Image 1"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-10.B65sMmJg.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-10.B65sMmJg_ZXRNiA.webp"
                    alt="Image 2"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="720"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-11.CAxC705y.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-11.CAxC705y_2d68Gd.webp"
                    alt="Image 3"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1249"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-2.DQc_ouVF.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-2.DQc_ouVF_1FGO0o.webp"
                    alt="Image 4"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-27.BV35obP6.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-27.BV35obP6_Zls9eL.webp"
                    alt="Image 5"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-28.DYgT3cm6.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-28.DYgT3cm6_2iHFrH.webp"
                    alt="Image 6"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-29.BuB576S_.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-29.BuB576S__Z1o1uzo.webp"
                    alt="Image 7"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-3.BseZE_hV.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-3.BseZE_hV_O3FO8.webp"
                    alt="Image 8"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-30.CjA5y-N9.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-30.CjA5y-N9_NqyYH.webp"
                    alt="Image 9"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1707"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-31.TdQY_Cei.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-31.TdQY_Cei_2pFcXm.webp"
                    alt="Image 10"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-32.B1zUkhor.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-32.B1zUkhor_1PFp0q.webp"
                    alt="Image 11"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-33.DgI-ZcJP.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-33.DgI-ZcJP_ZUUX1P.webp"
                    alt="Image 12"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-34.NC4Kw58J.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-34.NC4Kw58J_1T4eMO.webp"
                    alt="Image 13"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-35.BtYIENtp.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-35.BtYIENtp_ZNPENJ.webp"
                    alt="Image 14"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-36.Cz7STPAp.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-36.Cz7STPAp_PgM0B.webp"
                    alt="Image 15"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-37.B4m8pYsR.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-37.B4m8pYsR_Zsrain.webp"
                    alt="Image 16"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-38.DgELJWsJ.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-38.DgELJWsJ_Z2vG7Yt.webp"
                    alt="Image 17"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="480"
                    height="640"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-39.Y9vnvNyB.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-39.Y9vnvNyB_10Tyx1.webp"
                    alt="Image 18"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="960"
                    height="1280"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-40.Ino3eaxO.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-40.Ino3eaxO_1RmWje.webp"
                    alt="Image 19"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="1050"
                    height="1575"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-41.BsJaqvIT.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-41.BsJaqvIT_Xxa8G.webp"
                    alt="Image 20"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="1041"
                    height="1562"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-42.WRWJ25En.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-42.WRWJ25En_Z2eNh2z.webp"
                    alt="Image 21"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="2080"
                    height="3120"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-43.BbER1T5J.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-43.BbER1T5J_1yJBUe.webp"
                    alt="Image 22"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="1470"
                    height="1960"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-44.DDf4URBZ.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-44.DDf4URBZ_14gSKy.webp"
                    alt="Image 23"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="1027"
                    height="1541"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-45.DXS986e3.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-45.DXS986e3_ZKESyb.webp"
                    alt="Image 24"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="915"
                    height="1220"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
              <div
                role="group"
                aria-roledescription="slide"
                data-slot="carousel-item"
                class="min-w-0 shrink-0 grow-0 basis-full group-data-[axis=x]/carousel:pl-4 group-data-[axis=y]/carousel:pt-4 min-[375px]:basis-1/2 md:basis-1/3 lg:basis-1/4"
              >
                <a
                  class="inline-flex aspect-square w-full overflow-hidden rounded-xl lg:h-full"
                  href="/assets/img/example-46.DtNaiMAD.webp"
                  data-fancybox="gallery" 
                  
                  target="_blank"
                >
                  <img
                    src="/assets/img/example-46.DtNaiMAD_1yV74Q.webp"
                    alt="Image 25"
                    loading="lazy"
                    data-slot="image"
                    decoding="async"
                    width="1277"
                    height="1702"
                    class="starwind-image size-full object-cover object-center"
                  />
                </a>
              </div>
            </div>
          </div>
          <div
            class="pointer-events-none absolute top-1/2 left-0 right-0 z-10 flex -translate-y-1/2 items-center justify-between px-4"
          >
            <button
              class="pointer-events-auto starwind-carousel-previous flex size-12 items-center justify-center rounded-full bg-white text-black shadow-md transition-transform hover:scale-110"
              data-slot="carousel-previous"
              aria-label="Previous slide"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
              <span class="sr-only">Previous slide</span>
            </button>
            <button
              class="pointer-events-auto starwind-carousel-next flex size-12 items-center justify-center rounded-full bg-white text-black shadow-md transition-transform hover:scale-110"
              data-slot="carousel-next"
              aria-label="Next slide"
            >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="lucide lucide-arrow-right"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
              <span class="sr-only">Next slide</span>
            </button>
          </div>
        </div>
      </section>
      <script
        type="module"
        src="/assets/js/SectionOurWorks.js"
      ></script>
      <section id="services" class="py-12">
        <div class="container">
          <div class="flex flex-wrap gap-6 xl:justify-between xl:gap-8">
            <div class="space-y-3 text-lg xl:max-w-140 2xl:max-w-3xl">
              <h2 class="font-heading text-4xl text-balance lg:text-5xl"><?= tr("services_title", "Прайс-лист послуг") ?></h2>
              <p class="min-w-0">
                <?= tr("services_desc", "Відкрийте всі наші послуги: нігті, класичний і гібридний манікюр, педикюр, стилізація брів та інші beauty-процедури у Варшаві. Інтерактивні картки категорій дозволяють фільтрувати перегляд та зосередитись на тому, що вас цікавить.") ?>
              </p>
            </div>
            <?php
            $db_categories = DB::fetchAll("SELECT * FROM service_categories ORDER BY sort_order ASC");
            $db_subcategories = DB::fetchAll("SELECT * FROM service_subcategories ORDER BY sort_order ASC");
            $db_items = DB::fetchAll("SELECT * FROM service_items ORDER BY sort_order ASC");
            
            $cats = [];
            foreach ($db_categories as $c) {
                $c["name"] = $c["name_{$currentLang}"] ?: $c["name_pl"];
                $c["subs"] = [];
                $cats[$c["id"]] = $c;
            }
            foreach ($db_subcategories as $s) {
                $s["name"] = $s["name_{$currentLang}"] ?: $s["name_pl"];
                $s["items"] = [];
                if (isset($cats[$s["category_id"]])) {
                    $cats[$s["category_id"]]["subs"][$s["id"]] = $s;
                }
            }
            foreach ($db_items as $i) {
                $i["name"] = $i["name_{$currentLang}"] ?: $i["name_pl"];
                $i["price"] = $i["price_{$currentLang}"] ?: $i["price_pl"];
                foreach ($cats as &$c) {
                    if (isset($c["subs"][$i["subcategory_id"]])) {
                        $c["subs"][$i["subcategory_id"]]["items"][] = $i;
                        break;
                    }
                }
            }
            ?>
            <div class="grid w-full grid-cols-2 flex-nowrap items-center gap-1 overflow-x-auto sm:flex xl:w-auto">
              <?php $first = true; foreach ($cats as $cat): ?>
              <button
                class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 hover:bg-foreground/10 hover:text-foreground focus-visible:outline-outline bg-transparent h-11 flex-grow px-6 text-base md:flex-shrink-0 xl:px-5"
                data-slot="button"
                data-filter="<?= htmlspecialchars($cat["slug"]) ?>"
                aria-pressed="<?= $first ? "true" : "false" ?>"
              >
                <span class="hidden"></span>
                <?= htmlspecialchars($cat["name"]) ?>
              </button>
              <?php $first = false; endforeach; ?>
            </div>
            <script type="module" src="/assets/js/TabControl.js"></script>
          </div>
          <script>
            (() => {
              var a = (s, i, o) => {
                let r = async () => {
                    await (
                      await s()
                    )();
                  },
                  t = typeof i.value == "object" ? i.value : void 0,
                  c = { rootMargin: t == null ? void 0 : t.rootMargin },
                  n = new IntersectionObserver((e) => {
                    for (let l of e)
                      if (l.isIntersecting) {
                        (n.disconnect(), r());
                        break;
                      }
                  }, c);
                for (let e of o.children) n.observe(e);
              };
              (self.salon || (self.salon = {})).visible = a;
              window.dispatchEvent(new Event("salon:visible"));
            })();
          </script>
          
          <?php $first = true; foreach ($cats as $cat): ?>
          <div id="tab-<?= htmlspecialchars($cat["slug"]) ?>" class="mt-4 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:col-span-2 2xl:grid-cols-4 tab-content <?= $first ? "grid" : "hidden" ?>">
              <?php foreach ($cat["subs"] as $sub): ?>
              <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
                  <h3 class="text-xl font-bold"><?= htmlspecialchars($sub["name"]) ?></h3>
                  <ul class="space-y-3 flex-grow">
                      <?php foreach ($sub["items"] as $item): ?>
                      <li class="flex justify-between border-b border-gray-100 pb-2">
                          <span><?= htmlspecialchars($item["name"]) ?></span>
                          <span class="font-bold"><?= htmlspecialchars($item["price"]) ?></span>
                      </li>
                      <?php endforeach; ?>
                  </ul>
                  <button class="w-full py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors"><?= tr("btn_book", "Записатись") ?></button>
              </div>
              <?php endforeach; ?>
          </div>
          <?php $first = false; endforeach; ?>

          </div>
        </div>
      </section>
      <section class="relative isolate overflow-x-clip">
        <div class="container">
          <div
            class="mb-12 space-y-4 text-center text-base sm:text-lg lg:text-xl"
          >
            <h2 class="font-heading text-3xl text-balance sm:text-4xl">
              <?= tr("contact_title", "Зв&#39;яжіться з Нами Легко всього за Два Кроки") ?>
            </h2>
            <p class="text-black-600 mx-auto max-w-3xl">
              <?= tr("contact_desc_1", "Маєте запитання або хочете зв&#39;язатися? Наша проста форма полегшує зв&#39;язок з нами. Просто заповніть деталі, а ми подбаємо про решту!") ?>
            </p>
            <p class="text-black-600 mx-auto max-w-3xl">
              <?= tr("contact_desc_2", "Хочете швидшої відповіді? Напишіть нам у <a href=\"https://ig.me/m/Salon.warsaw\" target=\"_blank\" rel=\"noopener\" class=\"hover:text-cove-600 font-medium underline transition-[color] duration-200\">Instagram Direct</a> і ми швидко вам відповімо!") ?>
            </p>
          </div>
          <div class="relative isolate mx-auto max-w-5xl">
            <div
              class="theme-form"
            >
              <form
                class="mx-auto grid max-w-lg place-items-center space-y-8"
                method="post"
                data-contact-form
              >
                <label class="relative w-full">
                  <span class="sr-only"><?= tr("form_name", "Введіть ваше імʼя") ?></span>
                  <input
                    placeholder="<?= tr("form_name", "Введіть ваше імʼя") ?>"
                    required
                    type="text"
                    name="userName"
                    class="border-black-500 placeholder:text-black-300 w-full rounded-md border bg-white px-6 py-3"
                  />
                  <span
                    class="absolute bottom-0 left-0 -mb-[2lh] h-[2lh] text-xs text-red-500"
                    data-error="userName"
                  ></span>
                </label>
                <label class="relative w-full">
                  <span class="sr-only">+48 XXX XXX XXX</span>
                  <input
                    placeholder="+48 XXX XXX XXX"
                    required
                    type="text"
                    inputmode="numeric"
                    name="userPhone"
                    class="border-black-500 placeholder:text-black-300 w-full rounded-md border bg-white px-6 py-3"
                  />
                  <span
                    class="absolute bottom-0 left-0 -mb-[2lh] h-[2lh] text-xs text-red-500"
                    data-error="userPhone"
                  ></span>
                </label>
                <script
                  type="module"
                  src="/assets/js/UserPhone.js"
                ></script>
                <label class="relative w-full">
                  <span class="sr-only"><?= tr("form_email", "Введіть вашу пошту") ?></span>
                  <input
                    placeholder="<?= tr("form_email", "Введіть вашу пошту") ?>"
                    required
                    type="email"
                    name="userEmail"
                    class="border-black-500 placeholder:text-black-300 w-full rounded-md border bg-white px-6 py-3"
                  />
                  <span
                    class="absolute bottom-0 left-0 -mb-[2lh] h-[2lh] text-xs text-red-500"
                    data-error="userEmail"
                  ></span>
                </label>
                <label class="relative w-full">
                  <span class="sr-only"><?= tr("form_message", "Введіть ваше повідомлення") ?></span>
                  <textarea
                    required
                    placeholder="<?= tr("form_message", "Введіть ваше повідомлення") ?>"
                    name="userMessage"
                    class="border-black-500 placeholder:text-black-300 h-44 w-full resize-none rounded-md border bg-white px-6 py-3"
                  ></textarea>
                  <span
                    class="absolute bottom-0 left-0 -mb-[2lh] h-[2lh] text-xs text-red-500"
                    data-error="userMessage"
                  ></span>
                </label>
                
<label class="relative flex w-full items-start gap-2">
    <input type="checkbox" name="rodo_consent" required class="mt-1" />
    <span class="text-sm text-black-600">
        <?= tr('rodo_consent', 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu kontaktu zgodnie z polityką prywatności.') ?>
    </span>
</label>
<input type="hidden" name="lang" value="<?= $currentLang ?>" />
<input type="text" name="website_url_hp" style="display:none" tabindex="-1" autocomplete="off" />

<button class="theme-btn w-full" data-slot="button" type="submit"><?= tr("form_submit", "Надіслати") ?></button>
              </form>
            </div>
            <script
              type="module"
              src="/assets/js/ContactForm.js"
            ></script>
            <div
              id="rotatedText"
              class="hidden"
            ></div>
          </div>
        </div>
        <span
          class="hidden"
        ></span>
      </section>
      <script
        type="module"
        src="/assets/js/SectionContact.js"
      ></script>
    </main>
