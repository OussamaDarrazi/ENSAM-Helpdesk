<div class="min-w-screen h-screen overflow-hidden bg-gray-100  flex flex-col">
  <?php require 'components/navbar.php'; ?>
  <div class="w-full h-full overflow-hidden flex-grow flex flex-col justify-center items-center">
  <div class="w-3/5 h-fit min-h-96 max-h-full  my-4  overflow-hidden bg-white border border-gray-200  rounded-xl shadow-sm flex flex-col justify-center items-center">
    <div class="w-full h-full p-4 sm:p-7 overflow-y-scroll">
    <!-- ARTICLE INFO MODAL -->
    <div id="hs-slide-up-animation-modal"
          class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
          <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto ">
              <div class="flex justify-between items-center py-3 px-4 border-b ">
                <h3 class="font-bold text-gray-800 ">
                #<?=$article["article_id"]?> - <?=$article["article_title"]?>
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
              <p class="font-medium text-xs text-gray-500">Categorie</p>
              <p><?=$article["category"]?></p>
              <p class="font-medium text-xs text-gray-500">Crée le</p>
              <p><?=$article["created_at"] ?></p>
              <p class="font-medium text-xs text-gray-500">Derniere modification le</p>
              <p><?=$article["modified_at"]?></p>
              <p class="font-medium text-xs text-gray-500">Derniere modification par</p>
              <p><?=$article["editor_first_name"] ." " .  $article["editor_last_name"]?></p>
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
        <!-- END ARTICLE INFO MODAL -->

      <!-- Errors -->
      <?php
      if (!empty($errors)) {
        ?>
        <div class="bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 my-2" role="alert">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="m15 9-6 6"></path>
                <path d="m9 9 6 6"></path>
              </svg>
            </div>
            <div class="ms-4">
              <h3 class="text-sm font-semibold">
                Un problème est survenu lors de la soumission de vos données.
              </h3>
              <div class="mt-2 text-sm text-red-700">
                <ul class="list-disc space-y-1 ps-5">
                  <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <?php
      }
      ?>
      <!-- End Errors -->
        <div class="w-full h-full flex flex-col items-center gap-4 ">
          <div class="w-full flex justify-between ">
            <h1 class="text-xl font-bold text-gray-600 self-start">#<?=$article["article_id"]?> - <?=$article["article_title"]?></h1>  
            <div class="flex gap-4">
              <div class="hs-tooltip">
            <a href="create_article.php?article_id=<?=$article["article_id"]?>">
              <svg class="flex-shrink-0 size-6 mt-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21 21H12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
              </a>
              <span
              class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-600 text-xs font-medium text-white rounded shadow-sm"
              role="tooltip">
              Modifier
            </span>
              </div>
            <div class="hs-tooltip">
              
            <button data-hs-overlay="#hs-slide-up-animation-modal">
              <svg class="flex-shrink-0 size-6 mt-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
              Information sur l'article
            </span>
          </div>
            </div>
          </div>
        <div class="flex-grow">
        <?=$article["content"]?>
        </div>  


    </div>
  </div>
  </div>

</div>
</div>

