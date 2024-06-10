<div class="h-screen flex flex-col">
<?php
require 'components/navbar.php';?>

<div class="flex justify-center min-w-fit flex-grow h-full overflow-hidden">
    <div class="col-span-8 flex flex-col h-full py-8 gap-6 overflow-hidden">
        <!-- STATS -->
        <div class="grid grid-cols-2 gap-6">
           
          <!-- CARD -->
          <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <span class="text-xs uppercase tracking-wide text-gray-500 ">
              Tickets Resolus
            </span>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
              <?=$stats["resolved_tickets"]?>
            </h3>
          </div>
        </div>
      </div>
      <!-- END CARD -->
          <!-- CARD -->
          <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <span class="text-xs uppercase tracking-wide text-gray-500 ">
              AHT
              
</span>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
            <?=$stats["AHT"]?>
            </h3>
          </div>
        </div>
      </div>
      <!-- END CARD -->
      
     
        </div>
        <!-- END STATS -->
        <!-- TABLE -->
        <div class="flex flex-col overflow-hidden">
                    <!-- SEARCH BOX -->
                    <div class="py-3 px-4">
                                <div class="relative max-w-xs">
                                  <label class="sr-only">Search</label>
                                  <input hx-post="htmx_search.php" hx-target="#ticket_table" hx-trigger="input changed delay:500ms, search" type="search" name="search_term" id="hs-table-with-pagination-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Rechercher des tickets">
                                  <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                    <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <circle cx="11" cy="11" r="8"></circle>
                                      <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                  </div>
                                </div>
                              </div>
          <!-- end SEARCH BOX -->
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle ">
      <div class="border rounded-lg shadow relative">
        <?php include("components/ticket_table.php"); ?>

      </div>
    </div>
  </div>
</div>
        <!-- END TABLE -->
    </div>
</div>
</div>