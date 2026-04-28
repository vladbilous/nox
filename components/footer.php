    <footer class="theme-footer">
      <div class="container">
        <div class="mb-8 flex flex-col md:flex-row items-center justify-between gap-8">
          <ul class="flex flex-wrap items-center justify-center gap-6 text-sm">
            <li>
              <a href="/" class="hover:text-white transition-colors">Polski</a>
            </li>
            <li>
              <a href="/en/" class="hover:text-white transition-colors">English</a>
            </li>
            <li>
              <a href="/ru/" class="hover:text-white transition-colors">Русский</a>
            </li>
            <li>
              <a href="/uk/" class="hover:text-white transition-colors">Українська</a>
            </li>
          </ul>
          
          <div class="flex-shrink-0">
            <img src="/assets/img/footer-logo-w160.BbuADnzV_1ySvN2.svg" alt="Salon Footer Logo" width="160" height="160" class="h-20 w-auto opacity-90" />
          </div>

          <ul class="flex items-center justify-center gap-4 text-sm">
            <li>
              <a href="/uk/privacy-policy/" class="hover:text-white transition-colors">Політика конфіденційності</a>
            </li>
          </ul>
        </div>
        
        <div class="theme-divider" style="margin: 2rem 0;"></div>
        
        <div class="flex justify-center">
          <small class="text-sm font-medium opacity-50">© <?= date('Y') ?> Salon CMS. Всі права захищені.</small>
        </div>
      </div>
    </footer>
    
    <div
      class="starwind-dialog"
      id="specialOfferDialog"
      data-close-special-offer="true"
      data-slot="dialog"
      data-salon-cid-kjprtn36
    >
      <div
        class="starwind-dialog-trigger"
        data-slot="dialog-trigger"
        data-as-child
      >
        <button
          class="bg-golden-200 hover:bg-golden-300 fixed bottom-4 left-4 z-50 size-12 cursor-pointer rounded-full shadow-lg transition-transform hover:scale-110"
          data-open-special-dialog
          aria-label="Open Special Offer"
        >
          <span class="pointer-events-none">🔥</span>
        </button>
      </div>
      <!-- dialog overlay -->
      <div
        class="starwind-dialog-backdrop fixed inset-0 top-0 left-0 z-50 hidden h-screen w-screen bg-black/80 data-[state=open]:animate-in fade-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards fade-out"
        data-state="closed"
        data-slot="dialog-backdrop"
        style="animation-duration: 200ms"
        data-salon-cid-v47a3m4h
      ></div>
      <dialog
        class="starwind-dialog-content fixed top-16 left-[50%] z-50 translate-x-[-50%] sm:top-[50%] sm:translate-y-[-50%] bg-background w-full max-w-md rounded-lg border shadow-lg data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards transition-[translate,scale,opacity] fade-in zoom-in-95 slide-in-from-bottom-2 fade-out zoom-out-95 slide-out-to-bottom-2 data-[state=open]:data-[nested-dialog-open]:-translate-y-[calc(50%-var(--nested-offset)*var(--nested-dialogs,1))] data-[state=open]:data-[nested-dialog-open]:scale-[calc(1-var(--nested-scale)*var(--nested-dialogs,1))] max-sm:data-[state=open]:data-[nested-dialog-open]:translate-y-[calc(var(--nested-offset)*var(--nested-dialogs,1))] p-5 md:p-6"
        data-state="closed"
        style="animation-duration: 200ms"
        data-slot="dialog-content"
        data-salon-cid-v47a3m4h
      >
        <div class="prose md:prose-lg">
          <div class="font-heading text-center text-2xl md:text-3xl">
            Привіт, красуне!
          </div>
          <p class="grid place-items-center text-center">
            <span class="block">Час подбати про себе</span>
            <span
              class="bg-cove-600 block rounded-sm px-4 font-bold text-white"
            >
              15% знижки на перший візит!
            </span>
          </p>
          <p class="text-center text-base">
            Запишись сьогодні, щоб не пропустити цю пропозицію!
          </p>
          <form
            class="mx-auto grid max-w-lg space-y-6 min-[450px]:place-items-center"
            method="post"
            data-special-offer-form
          >
            <input type="hidden" name="formTitle" value="offer" />
            <label class="relative w-full">
              <span class="sr-only"> Введіть ваше імʼя </span>
              <input
                placeholder="Введіть ваше імʼя"
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
            <div class="relative flex w-full">
              <label class="sr-only">Field Name Add Later</label>
              <div
                class="starwind-native-select-wrapper group/native-select relative w-full has-[select:disabled]:opacity-50"
                data-slot="native-select-wrapper"
              >
                <select
                  class="starwind-native-select border-black-500 bg-white flex py-2 items-center justify-between rounded-md border focus:outline-outline focus:outline-2 focus:outline-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&#38;>span]:line-clamp-1 h-[50px] pr-9 pl-6 w-full text-base"
                  id="userServiceCategory"
                  name="userServiceCategory"
                  data-slot="native-select"
                >
                  <option
                    class="starwind-native-select-option"
                    value
                    disabled
                    data-slot="native-select-option"
                  >
                    Виберіть категорію послуги
                  </option>
                  <option
                    class="starwind-native-select-option"
                    value="Нігті"
                    data-slot="native-select-option"
                  >
                    Нігті
                  </option>
                  <option
                    class="starwind-native-select-option"
                    value="Візаж"
                    data-slot="native-select-option"
                  >
                    Візаж
                  </option>
                  <option
                    class="starwind-native-select-option"
                    value="Вії"
                    data-slot="native-select-option"
                  >
                    Вії
                  </option>
                  <option
                    class="starwind-native-select-option"
                    value="Масаж"
                    data-slot="native-select-option"
                  >
                    Масаж
                  </option>
                  <option
                    class="starwind-native-select-option"
                    value="Волосся"
                    data-slot="native-select-option"
                  >
                    Волосся
                  </option>
                </select>
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
                  data-slot="native-select-icon"
                  class="lucide lucide-chevron-down text-foreground pointer-events-none absolute top-1/2 -translate-y-1/2 opacity-50 right-3 size-4"
                >
                  <path d="m6 9 6 6 6-6"></path>
                </svg>
              </div>
              <span
                class="absolute bottom-0 left-0 -mb-[2lh] h-[2lh] text-xs text-red-500"
                data-error="userServiceCategory"
              ></span>
            </div>
            <div class="mb-0 grid gap-4">
              <button
                class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 bg-secondary text-secondary-foreground hover:bg-secondary/90 focus-visible:outline-secondary h-12 px-8 text-lg min-w-50 disabled:opacity-50"
                data-slot="button"
                type="submit"
              >
                Записатися зараз
              </button>
              <div
                class="starwind-dialog-close"
                data-slot="dialog-close"
                data-as-child
              >
                <button
                  class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 hover:bg-foreground/10 hover:text-foreground focus-visible:outline-outline bg-transparent h-9 px-4 text-sm min-w-50"
                  data-slot="button"
                  type="button"
                >
                  Ні, дякую. Можливо пізніше
                </button>
              </div>
            </div>
          </form>
        </div>
        <button
          type="button"
          class="starwind-dialog-close text-muted-foreground absolute top-5.5 right-5.5 rounded-sm [&#38;>svg]:opacity-70 hover:[&#38;>svg]:opacity-100 focus-visible:ring-outline/50 transition-[color,box-shadow] outline-none focus-visible:ring-3"
          data-dialog-close
          aria-label="Close dialog"
          data-salon-cid-v47a3m4h
        >
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
            data-salon-cid-v47a3m4h="true"
            class="lucide lucide-x size-5 transition-opacity"
          >
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
          <span class="sr-only" data-salon-cid-v47a3m4h>Close</span>
        </button>
      </dialog>
    </div>
    <script
      type="module"
      src="/assets/js/Dialog.js"
    ></script>
    <script
      type="module"
      src="/assets/js/SpecialOffer.js"
    ></script>
    <div
      class="starwind-dialog"
      id="successModal"
      data-slot="dialog"
      data-salon-cid-kjprtn36
    >
      <!-- dialog overlay -->
      <div
        class="starwind-dialog-backdrop fixed inset-0 top-0 left-0 z-50 hidden h-screen w-screen bg-black/80 data-[state=open]:animate-in fade-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards fade-out"
        data-state="closed"
        data-slot="dialog-backdrop"
        style="animation-duration: 200ms"
        data-salon-cid-v47a3m4h
      ></div>
      <dialog
        class="starwind-dialog-content fixed top-16 left-[50%] z-50 translate-x-[-50%] sm:top-[50%] sm:translate-y-[-50%] bg-background w-full max-w-md rounded-lg border p-8 shadow-lg data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards transition-[translate,scale,opacity] fade-in zoom-in-95 slide-in-from-bottom-2 fade-out zoom-out-95 slide-out-to-bottom-2 data-[state=open]:data-[nested-dialog-open]:-translate-y-[calc(50%-var(--nested-offset)*var(--nested-dialogs,1))] data-[state=open]:data-[nested-dialog-open]:scale-[calc(1-var(--nested-scale)*var(--nested-dialogs,1))] max-sm:data-[state=open]:data-[nested-dialog-open]:translate-y-[calc(var(--nested-offset)*var(--nested-dialogs,1))]"
        data-state="closed"
        style="animation-duration: 200ms"
        data-slot="dialog-content"
        data-salon-cid-v47a3m4h
      >
        <div
          class="flex flex-col space-y-2 text-center sm:text-left"
          data-slot="dialog-header"
        >
          <h2
            class="font-heading text-xl leading-none font-semibold tracking-tight text-center"
            data-slot="dialog-title"
          >
            😉
          </h2>
        </div>
        <div class="py-4 text-center">
          Ми успішно отримали ваше повідомлення.
        </div>
        <div
          class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-center"
          data-slot="dialog-footer"
        >
          <div
            class="starwind-dialog-close"
            data-slot="dialog-close"
            data-as-child
          >
            <button
              class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 bg-foreground text-background hover:bg-foreground/90 focus-visible:outline-outline h-11 px-5 text-base"
              data-slot="button"
            >
              Чудово
            </button>
          </div>
        </div>
        <button
          type="button"
          class="starwind-dialog-close text-muted-foreground absolute top-5.5 right-5.5 rounded-sm [&#38;>svg]:opacity-70 hover:[&#38;>svg]:opacity-100 focus-visible:ring-outline/50 transition-[color,box-shadow] outline-none focus-visible:ring-3"
          data-dialog-close
          aria-label="Close dialog"
          data-salon-cid-v47a3m4h
        >
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
            data-salon-cid-v47a3m4h="true"
            class="lucide lucide-x size-5 transition-opacity"
          >
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
          <span class="sr-only" data-salon-cid-v47a3m4h>Close</span>
        </button>
      </dialog>
    </div>
    <div
      class="starwind-dialog"
      id="errorModal"
      data-slot="dialog"
      data-salon-cid-kjprtn36
    >
      <!-- dialog overlay -->
      <div
        class="starwind-dialog-backdrop fixed inset-0 top-0 left-0 z-50 hidden h-screen w-screen bg-black/80 data-[state=open]:animate-in fade-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards fade-out"
        data-state="closed"
        data-slot="dialog-backdrop"
        style="animation-duration: 200ms"
        data-salon-cid-v47a3m4h
      ></div>
      <dialog
        class="starwind-dialog-content fixed top-16 left-[50%] z-50 translate-x-[-50%] sm:top-[50%] sm:translate-y-[-50%] bg-background w-full max-w-md rounded-lg border p-8 shadow-lg data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fill-mode-forwards transition-[translate,scale,opacity] fade-in zoom-in-95 slide-in-from-bottom-2 fade-out zoom-out-95 slide-out-to-bottom-2 data-[state=open]:data-[nested-dialog-open]:-translate-y-[calc(50%-var(--nested-offset)*var(--nested-dialogs,1))] data-[state=open]:data-[nested-dialog-open]:scale-[calc(1-var(--nested-scale)*var(--nested-dialogs,1))] max-sm:data-[state=open]:data-[nested-dialog-open]:translate-y-[calc(var(--nested-offset)*var(--nested-dialogs,1))]"
        data-state="closed"
        style="animation-duration: 200ms"
        data-slot="dialog-content"
        data-salon-cid-v47a3m4h
      >
        <div
          class="flex flex-col space-y-2 text-center sm:text-left"
          data-slot="dialog-header"
        >
          <h2
            class="font-heading text-xl leading-none font-semibold tracking-tight text-center"
            data-slot="dialog-title"
          >
            😲
          </h2>
        </div>
        <div class="py-4 text-center">
          Ваше повідомлення не було надіслано, будь ласка, спробуйте ще раз.
        </div>
        <div
          class="flex flex-col-reverse gap-2 sm:flex-row sm:justify-center"
          data-slot="dialog-footer"
        >
          <div
            class="starwind-dialog-close"
            data-slot="dialog-close"
            data-as-child
          >
            <button
              class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 bg-foreground text-background hover:bg-foreground/90 focus-visible:outline-outline h-11 px-5 text-base"
              data-slot="button"
            >
              Зрозуміло
            </button>
          </div>
        </div>
        <button
          type="button"
          class="starwind-dialog-close text-muted-foreground absolute top-5.5 right-5.5 rounded-sm [&#38;>svg]:opacity-70 hover:[&#38;>svg]:opacity-100 focus-visible:ring-outline/50 transition-[color,box-shadow] outline-none focus-visible:ring-3"
          data-dialog-close
          aria-label="Close dialog"
          data-salon-cid-v47a3m4h
        >
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
            data-salon-cid-v47a3m4h="true"
            class="lucide lucide-x size-5 transition-opacity"
          >
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
          <span class="sr-only" data-salon-cid-v47a3m4h>Close</span>
        </button>
      </dialog>
    </div>
    <div
      id="cookiePopup"
      class="fixed bottom-4 left-1/2 grid w-[95%] max-w-100 -translate-x-1/2 place-items-center gap-4 rounded-xl bg-white p-4 text-center shadow-2xl"
      style="transform: scale(0.4); opacity: 0; visibility: hidden"
    >
      <p class="text-black-900 text-sm text-pretty">
        Ми використовуємо файли cookie, щоб покращити ваш досвід та аналізувати
        трафік сайту; будь ласка, ознайомтеся з нашою Політикою Конфіденційності
        для отримання додаткової інформації.
      </p>
      <button
        class="inline-flex items-center justify-center gap-1.5 rounded-lg font-medium whitespace-nowrap starwind-transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] disabled:pointer-events-none disabled:opacity-50 aria-invalid:border-error aria-invalid:focus-visible:ring-error/40 bg-primary text-primary-foreground hover:bg-primary/90 focus-visible:outline-primary h-9 px-4 text-sm pointer-events-auto"
        data-slot="button"
        id="cookiePopupButton"
      >
        <span class="font-medium">Ok</span>
      </button>
    </div>
    <!-- <div class="sticky bottom-0 left-0 flex w-full justify-center p-4">
</div> -->
    <script
      type="module"
      src="/assets/js/CookiePopup.js"
    ></script>
    <script
      type="module"
      src="/assets/js/Layout.js"
    ></script>
  
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" /><script>document.addEventListener('DOMContentLoaded', function() { Fancybox.bind('[data-fancybox]', {}); });</script></body>
</html>
