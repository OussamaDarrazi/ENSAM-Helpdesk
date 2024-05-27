<div class="h-screen flex flex-col bg-gray-100">
  <?php
  require 'components/navbar.php'; ?>

  <div class="flex justify-center min-w-fit flex-grow h-full overflow-hidden">
    <div class="w-1/2 min-w-lg flex flex-col h-full pt-8  overflow-hidden ">

      <div class="flex flex-col flex-grow overflow-hidden relative rounded-t-lg border border-gray-200 ">
        <!-- CUSTOMER INFO MODAL -->
        <div id="hs-slide-up-animation-modal"
          class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
          <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto ">
              <div class="flex justify-between items-center py-3 px-4 border-b ">
                <h3 class="font-bold text-gray-800 ">
                  Info
                </h3>
                <button type="button"
                  class="hs-dropup-toggle flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none "
                  data-hs-overlay="#hs-slide-up-animation-modal">
                  <span class="sr-only">Close</span>
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="p-4 overflow-y-auto flex flex-col gap-2">
              <p class="font-medium text-xs text-gray-500">Nom</p>
              <p><?= $ticket_owner->first_name . " " . $ticket_owner->last_name ?></p>

              <p class="font-medium text-xs text-gray-500">Departement</p>
              <p><?= $ticket_owner_department ?></p>

                <p class="font-medium text-xs text-gray-500">Adresse mail</p>
                <!-- INPUT COPY -->
                <div>
                  <input type="hidden" id="hs-clipboard-tooltip-on-hover" value="<?= $ticket_owner->email ?>">

                  <button type="button"
                    class="js-clipboard-example [--is-toggle-tooltip:false] hs-tooltip relative py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-mono rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-clipboard-target="#hs-clipboard-tooltip-on-hover" data-clipboard-action="copy"
                    data-clipboard-success-text="Copied">
                    <?= $ticket_owner->email ?>

                    <span class="border-s ps-3.5">
                      <svg class="js-clipboard-default size-4 group-hover:rotate-6 transition"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                      </svg>

                      <svg class="js-clipboard-success hidden size-4 text-blue-600 rotate-6"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                      </svg>
                    </span>

                    <span
                      class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm"
                      role="tooltip">
                      <span class="js-clipboard-success-text">Copy</span>
                    </span>
                  </button>
                </div>
                <!-- END INPUT COPY -->
                <p class="font-medium text-xs text-gray-500">Telephone</p>
                <!-- INPUT COPY -->
                <div>
                  <input type="hidden" id="hs-clipboard-tooltip-on-hover" value="<?= $ticket_owner->phone_number ?>">

                  <button type="button"
                    class="js-clipboard-example [--is-toggle-tooltip:false] hs-tooltip relative py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-mono rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-clipboard-target="#hs-clipboard-tooltip-on-hover" data-clipboard-action="copy"
                    data-clipboard-success-text="Copied">
                    <?= $ticket_owner->phone_number ?>
                    <span class="border-s ps-3.5">
                      <svg class="js-clipboard-default size-4 group-hover:rotate-6 transition"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                      </svg>

                      <svg class="js-clipboard-success hidden size-4 text-blue-600 rotate-6"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                      </svg>
                    </span>

                    <span
                      class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm"
                      role="tooltip">
                      <span class="js-clipboard-success-text">Copy</span>
                    </span>
                  </button>
                </div>
                <!-- END INPUT COPY -->
              </div>
              <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t ">
                <button type="button"
                  class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                  data-hs-overlay="#hs-slide-up-animation-modal">
                  OK
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- END CUSTOMER INFO MODAL -->
        <!-- TICKET TITLE -->
        <div
          class="sticky top-0 w-full bg-white border-b border-gray-200 p-4 text-lg font-bold text-gray-600 flex justify-between items-center">
          #<?=$ticket->id?> - <?=$ticket->subject?>
<div class="flex gap-2 items-center">
<?php if($ticket->status_id != 4) { ?>
<button 
id="mark_resolved"
hx-get="resolve.php?ticket_id=<?=$ticket->id?>" 
hx-target="#message_form"
hx-swap="delete"

                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                    Marquer comme résolue
                </button>
                <?php }else{?>
                  <span
id="mark_resolved"
hx-swap-oob="true"

                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold text-teal-500  ">
                    Résolue
                </span>
               <?php } ?>
          <div class="hs-tooltip">
            <button data-hs-overlay="#hs-slide-up-animation-modal">
              <svg class="flex-shrink-0 size-6 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 16v-4"></path>
                <path d="M12 8h.01"></path>
              </svg>
            </button>
            <span
              class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-600 text-xs font-medium text-white rounded shadow-sm"
              role="tooltip">
              Information sur le client
            </span>
          </div>
          </div>
        </div>

        <!-- END TICKET TITLE -->
        <!-- CHAT CONTENT -->
        <div class="flex-grow  overflow-y-scroll p-4 bg-white" id="chat">
          <?php require( 'components/message_list.php' ); ?>
        </div>
        <!-- END CHAT CONTENT -->

      </div>
      <!-- MESSAGE INPUT -->
      <?php if($ticket->status_id != 4) { ?>
      <form id="message_form" method="post" hx-post="htmx_message?ticket_id=<?=$ticket->id?>" hx-target="#chat" hx-swap="innerHTML" hx-trigger="submit, every 3s" hx-on::after-request="this.reset()">
        <div class="flex items-end p-4 gap-6 bg-white">
          <textarea 
          id="hs-textarea-ex-1" name="message"
            class="resize-none px-4 block w-full border-gray-200 rounded-lg text-l focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed "
            placeholder="Aa..." rows="1"></textarea>
          <button type="submit"
            class="inline-flex flex-shrink-0 justify-center items-center size-8 rounded-lg text-white bg-blue-600 hover:bg-blue-500 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
            <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z">
              </path>
            </svg>
          </button>
        </div>
      </form>
      <!-- END MESSAGE INPUT -->
      <?php } ?>
    </div>
  </div>
</div>
<!-- SCRIPT FOR GROWING THE TEXT AREA OF THE MESSAGE  -->
<script>
  (function () {
    function textareaAutoHeight(el, offsetTop = 0) {
      el.style.height = 'auto';
      el.style.height = `${el.scrollHeight + offsetTop}px`;
    }

    (function () {
      const textareas = [
        '#hs-textarea-ex-1'
      ];

      textareas.forEach((el) => {
        const textarea = document.querySelector(el);
        const overlay = textarea.closest('.hs-overlay');

        if (overlay) {
          const { element } = HSOverlay.getInstance(overlay, true);

          element.on('open', () => textareaAutoHeight(textarea, 3));
        } else textareaAutoHeight(textarea, 3);

        textarea.addEventListener('input', () => {
          textareaAutoHeight(textarea, 3);
        });
      });
    })();
  })()
</script>
<script src="./node_modules/clipboard/dist/clipboard.min.js"></script>
<script>
    // INITIALIZATION OF CLIPBOARD
    // =======================================================
    (function () {
      window.addEventListener('load', () => {
        const $clipboards = document.querySelectorAll('.js-clipboard-example');
        $clipboards.forEach((el) => {
          const isToggleTooltip = HSStaticMethods.getClassProperty(el, '--is-toggle-tooltip') === 'false' ? false : true;
          const clipboard = new ClipboardJS(el, {
            text: (trigger) => {
              const clipboardText = trigger.dataset.clipboardText;

              if (clipboardText) return clipboardText;

              const clipboardTarget = trigger.dataset.clipboardTarget;
              const $element = document.querySelector(clipboardTarget);

              if (
                $element.tagName === 'SELECT'
                || $element.tagName === 'INPUT'
                || $element.tagName === 'TEXTAREA'
              ) return $element.value
              else return $element.textContent;
            }
          });
          clipboard.on('success', () => {
            const $default = el.querySelector('.js-clipboard-default');
            const $success = el.querySelector('.js-clipboard-success');
            const $successText = el.querySelector('.js-clipboard-success-text');
            const successText = el.dataset.clipboardSuccessText || '';
            const tooltip = el.closest('.hs-tooltip');
            const $tooltip = HSTooltip.getInstance(tooltip, true);
            let oldSuccessText;

            if ($successText) {
              oldSuccessText = $successText.textContent
              $successText.textContent = successText
            }
            if ($default && $success) {
              $default.style.display = 'none'
              $success.style.display = 'block'
            }
            if (tooltip && isToggleTooltip) HSTooltip.show(tooltip);
            if (tooltip && !isToggleTooltip) $tooltip.element.popperInstance.update();

            setTimeout(function () {
              if ($successText && oldSuccessText) $successText.textContent = oldSuccessText;
              if (tooltip && isToggleTooltip) HSTooltip.hide(tooltip);
              if (tooltip && !isToggleTooltip) $tooltip.element.popperInstance.update();
              if ($default && $success) {
                $success.style.display = '';
                $default.style.display = '';
              }
            }, 800);
          });
        });
      })
    })()
</script>